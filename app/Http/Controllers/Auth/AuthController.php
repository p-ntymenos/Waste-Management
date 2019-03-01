<?php
namespace App\Http\Controllers\Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use \Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
	/*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
	protected $redirectPath = '/dashboard';
	protected $redirectTo = '/dashboard';
    protected $username = 'username';
    
	use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	/**
	 * Create a new authentication controller instance.
	 *
	 */
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'getLogout']);
	}
    
    
    
    public function postLogin(Request $request)
{
    $this->validate($request, [
        //'email' => 'required|email', 'password' => 'required',
        'username' => 'required', 'password' => 'required',
    ]);

    $credentials = $this->getCredentials($request);
    
    // This section is the only change
    if (Auth::validate($credentials)) {
        $user = Auth::getLastAttempted();
        if ($user->status) {
            Auth::login($user, $request->has('remember'));
            return redirect()->intended($this->redirectPath());
        } else {
            return redirect($this->loginPath()) // Change this to redirect elsewhere
                //->withInput($request->only('email', 'remember'))
                ->withInput($request->only('username', 'remember'))
                ->withErrors([
                    'active' => 'You must be active to login.'
                ]);
        }
    }

    return redirect($this->loginPath())
        ->withInput($request->only('email', 'remember'))
        ->withErrors([
            'email' => $this->getFailedLoginMessage(),
        ]);

}
    
    
	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}
	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	protected function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'username' => $data['username'],
			'password' => bcrypt($data['password']),
		]);
	}
}