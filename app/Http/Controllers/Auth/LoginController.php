<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

include(app_path().'/Helpers/Helper.php');

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        return 'username';
    }

    public function cutomlogin(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required',
        ]);
        if($request['domaine'] == 'lab-brk')
        {
		if(authenticate($request['username'] , $request['password']))
			{
		
			$Split_name=explode('.',$request['username'] ,2);
			$nom=$Split_name[0];
			$prenom=$Split_name[1];

			$user = User::where('username','=',				$request['username'])->first();
			if($user == null)
					{
					$user = User::create([
					'username' => $request['username'],
					'Admin' => 0,
					'password' => Hash::make($request['password']),
					'nom' => $nom,
					'prenom' => $prenom,
					'struct_id' => 1,
					]);	
					}
				else
				{
					if(strcmp($user->password,$request['password'])!= 0)
					{
					$user->password = Hash::make($request['password']);
					$user-> save();
					
					}
				}
				Auth::login($user);
				return redirect()->intended('/');
			}		
		else
		{
			return back()->withErrors(['username' => ['Veuillez verifier vos informations']]);
		}
        }
        else
        {
           $this->login($request);
            return redirect()->intended('/');
        }
    }

    public function showLoginForm()//Utilitaire de premiere connexion
    {
        if(User::all()->count() == 0)
        {
            return view('Firstlogin');
        }
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
}
