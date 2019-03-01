<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequestForm;
use App\Role;
use App\User;
use App\AjaxMitrwo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Password;
use Illuminate\Routing\UrlGenerator;
// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;


class UsersController extends Controller
{
    public $mitrwo;

    public function __construct(AjaxMitrwo $mitrwo)
    {
        parent::__construct();
        
        $this->middleware('editable', ['only' => ['editprofile', 'updateprofile']]);
        $this->middleware('admin', ['only' => ['index','edit','create','store','update']]);
        $this->middleware('deleteMyself', ['only' => ['delete']]);
                

        $this->mitrwo = $mitrwo;


    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($year = 2014,$limit = 5)
    {

        $usersAll = count(User::with('roles')->get());
        $searchFor = Input::get('searchUser','');
        $limit = Input::get('limit',5);
        $countPages = ceil($usersAll/$limit);
        
        $page = Input::get('page',1);
        $prevPage = ($page>1) ? $page-1 : 1;
        $nextPage = ($page+1<=$countPages) ? $page+1 : $countPages;
        

        $offset = (($page-1)*$limit);
        
        
        $availPages = [];
        
        for($p=0; $p<$countPages;$p++){
            array_push($availPages,$p);
            
        }
        
        $users = User::with('roles')->where('Users.username','like','%'.$searchFor.'%')->orWhere('Users.name','like','%'.$searchFor.'%')->offset($offset)->take($limit)->get();
        return view('users.list')
            ->with('allRows',$usersAll)
            ->with('startOffset',($offset+1))
            ->with('endOffset',(($offset)+$limit))
            //->with('chosenYear',$year)
            ->with('availPages',$availPages)
            ->with('nextPage',$nextPage)
            ->with('prevPage',$prevPage)
            ->with('users',$users)
            ->with('breadCrumbText','Χρήστες')
            ->with('breadCrumbIcon','gicon-menu-producers');

    }


    public function delete($user_id){

        $user = User::find($user_id);
        User::find($user_id)->delete();
        return redirect('/users');
    }

    /**
     * User create form
     *
     * @return A form to fill data for this user
     */
    public function create()
    {
        
        //$user = User::with('roles')->find();
        //return $user;
        $roles = Role::all();
        $clientsList = $this->mitrwo->getAllClients();
        
        $regionsList = $this->mitrwo->getAllRegions();
        $subregionsList = $this->mitrwo->getAllSubRegions();
        $municipalitiesList = $this->mitrwo->getAllMunicipalities();
        
        $networkList = $this->mitrwo->getAllNetworks(0);
        $storagesPlantsList = $this->mitrwo->getAllStoragesPlants();
        $processingPlantsList = $this->mitrwo->getAllProcessingPlants();
        $userRoles = array();
        
        $availRoles = $this->mitrwo->getRoles();

        
        return view('users.new')
            ->with('clientsList',$clientsList)
            ->with('regionsList',$regionsList)
            ->with('subregionsList',$subregionsList)
            ->with('municipalitiesList',$municipalitiesList)
            ->with('networkList',$networkList)
            ->with('roles',$roles)
            ->with('availRoles',$availRoles)
            ->with('storagesPlantsList',$storagesPlantsList)
            ->with('processingPlantsList',$processingPlantsList)
            ->with('breadCrumbText','Διαχείριση Χρηστών / Δημιουργία Χρήστη: ')
            ->with('breadCrumbIcon','gicon-user-management-89');
        
        
//        $roles = Role::all();
//        $clientsList = $this->mitrwo->getAllClients();
//        $clientsList = $this->mitrwo->getAllClients();
//        $regionsList = $this->mitrwo->getAllRegions();
//        $networkList = $this->mitrwo->getAllNetworks(0);
//        
//        $userRoles = array();
//
//        return 
//            view('users.new')
//            ->with('roles',$roles)
//            ->with('clientsList',$clientsList)
//            ->with('regionsList',$regionsList)
//            
//            ->with('networkList',$networkList)
//            ->with('roles',$roles)
//            ->with('breadCrumbText','Δημιουργία Χρήστη: ')
//            ->with('breadCrumbIcon','gicon-menu-producers');

    }


    
    /**
     * Save user
     *
     * @param UserRequestForm $requestForm
     * @return Redirect to users list
     */
    public function store(UserRequestForm $requestForm)
    {

        //dd(Input::get('status'));
        
        $searchUser = User::where('username', Input::get('username'))->orWhere('email', Input::get('email'))->get();
        if($searchUser->count() > 0){
            
            return redirect('/users/create')->withErrors(['This User Already Exists. Check Username or Email'])->withInput(Input::except('password'));
        }
        
        
        $user = new User();
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        $user->status = (bool)Input::get('status');
        $user->username = Input::get('username');
        $user->password = bcrypt(Input::get('password'));
        $user->userphoto = 'no-image.gif';
        
        $user->save();

        if (Auth::user()->hasRole('admin') && !empty(Input::get('roles',[])) ) {
            $user->roles()->sync(Input::get('roles'));
        }

//        $response = Password::sendResetLink(['email'=>$user->email], function (Message $message) {
//            $message->subject('Reset password');
//        });

        return redirect('/users');

    }

    /**
     * @param $user_id
     *
     * @return A form to fill roles for this user
     */
    public function edit($user_id)
    {
        $user = User::with('roles')->find($user_id);
        //return $user;
        $roles = Role::all();
        $clientsList = $this->mitrwo->getAllClients();
        $regionsList = $this->mitrwo->getAllRegions();
        
        if($user->region_id>0){
            $subregionsList = $this->mitrwo->getAllSubRegions($user->region_id);
        }else{
            $subregionsList = $this->mitrwo->getAllSubRegions();
        }
        
        if($user->subregion_id>0){
            $municipalitiesList = $this->mitrwo->getAllMunicipalities($user->subregion_id);
        }else{
            $municipalitiesList = $this->mitrwo->getAllMunicipalities();
        }
        
        
        $networkList = $this->mitrwo->getAllNetworks(0);
        $storagesPlantsList = $this->mitrwo->getAllStoragesPlants();
        $processingPlantsList = $this->mitrwo->getAllProcessingPlants();
        $userRoles = array();
        foreach($user->roles as $_role){
            array_push($userRoles,$_role->id);
        }
        $availRoles = $this->mitrwo->getRoles();

        
        return view('users.edit')
            ->with('user',$user)
            ->with('clientsList',$clientsList)
            ->with('regionsList',$regionsList)
            ->with('subregionsList',$subregionsList)
            ->with('municipalitiesList',$municipalitiesList)
            ->with('networkList',$networkList)
            ->with('roles',$roles)
            ->with('availRoles',$availRoles)
            ->with('userRoles',$userRoles)
            ->with('storagesPlantsList',$storagesPlantsList)
            ->with('processingPlantsList',$processingPlantsList)
            ->with('breadCrumbText','Διαχείριση Χρηστών / Επεξεργασία Χρήστη: '.$user->name)
            ->with('breadCrumbIcon','gicon-user-management-89');

    }


    /**
     * Update a user
     *
     * @param $user_id
     *
     * @return Redirect to users list
     */
    public function update($user_id, UserRequestForm $requestForm)
    {

        $user = User::find($user_id);
        
        $user->email = Input::get('email');
        
        User::find($user_id)->update(Input::except(['userphoto','username','password']));



        if(Input::get('password')){

            User::find($user_id)->update(array('password' => bcrypt(Input::get('password'))));
        }


        if (Auth::user()->hasRole('admin') && !empty(Input::get('roles',[])) ){
            $user->roles()->sync(Input::get('roles'));
        }

        /*$response = Password::sendResetLink(['email'=>$user->email], function (Message $message) {
            $message->subject('Reset password');
        });*/


        return redirect('/users');
    }

    public function editprofile($user_id){
        $user = User::with('roles')->find($user_id);
        $roles = Role::all();
        $client = $this->mitrwo->getClient($user->customer_id);



        if(empty($client[0]->customer)){
            $client = ' - ';
        }else{
            $client = $client[0]->customer;
        }

        $availRoles = $this->mitrwo->getRoles();


        return view('users.editprofile')
            ->with('user',$user)
            ->with('client',$client)
            ->with('roles',$roles)
            ->with('availRoles',$availRoles)
            ->with('breadCrumbText','Επεξεργασία Χρήστη: '.$user->name)
            ->with('breadCrumbIcon','gicon-menu-producers');

    }

    public function updateprofile($user_id, UserRequestForm $requestForm){


        $user = User::find($user_id);

        if(Input::file('userphoto')){
            $userPhoto = Input::file('userphoto');

            $path =  storage_path().'/user/avatars/';
            $photoName = uniqid().'.'.$userPhoto->guessClientExtension();
            $userPhoto->move($path, $photoName);
            User::find($user_id)->update(array('userphoto' => $photoName));    

        }
        $user->email = Input::get('email');

        User::find($user_id)->update(Input::except(['userphoto','username','password']));

        if(Input::get('password')){

            User::find($user_id)->update(array('password' => bcrypt(Input::get('password'))));
        }

        if (Auth::user()->hasRole('admin') && !empty(Input::get('roles',[])) ){
            //$user->roles()->sync(Input::get('roles'));
        }

        $response = Password::sendResetLink(['email'=>$user->email], function (Message $message) {
            //$message->subject('Reset password');
        });


        return redirect('/');
    }

}
