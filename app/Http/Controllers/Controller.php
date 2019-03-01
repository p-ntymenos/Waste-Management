<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Route;
use View;

use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Support\Facades\Input;

abstract class Controller extends BaseController {

    use DispatchesCommands, ValidatesRequests;
    public function __construct(){
        $this->middleware('auth');

        if(Auth::user()){
            $currentUserId = Auth::user()->id;
            $threads = Thread::forUser($currentUserId,0)->latest('updated_at')->get();  //messages threads
            $nthreads = Thread::forUserWithNewMessages($currentUserId,1)->latest('updated_at')->get(); //notifications threads
            View::share('mthreads', $threads);
            View::share('mnotifications', $nthreads);
            View::share('currentUserId', $currentUserId);
            $counterUnread = 0;
            foreach($threads as $thread){
                if($thread->isUnread($currentUserId))$counterUnread++;
            }
            
            $counterUnreadNot = 0;
            foreach($nthreads as $nthread){
                if($nthread->isUnread($currentUserId))$counterUnreadNot++;
            }
            
            
            
            View::share('unreadNotifications'   , $counterUnreadNot);
            View::share('unreadMessages'        , $counterUnread);
            
            
            
            //here I will handle all the pagetitles and global data like breadcrumbs etc
            //View::share('headTitle', '');


        }

    }
}
