<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

use Auth;
use Hash;
use Socialite;
use App\user;

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

    public function github()
        {
            //send user request to the github
            return Socialite::driver('github')->redirect();
            
        }
            public function githubRedirect()
            {
                $user = Socialite::driver('github')->user();
                $user = User::firstOrCreate([
                    'email'=> $user->email,
                    ],[
                    'name'=>$user->name,
                    'password'=>Hash::make(Str::random(24))
                
                ]);
                
                Auth::login($user,true);
                return redirect::to('/');

            }
}
