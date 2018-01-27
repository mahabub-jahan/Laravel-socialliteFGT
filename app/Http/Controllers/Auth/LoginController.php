<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($service)
    {



        if ( $service == 'twitter') {
             $user = Socialite::driver($service)->user();



        } else {
             $user = Socialite::driver($service)->stateless()->user();

        }

         $user = $this->userFinderOrCreate($user);

        Auth::login($user, true);   // Login the User

        return redirect($this->redirectTo); //   protected $redirectTo = '/home';

        // redirect to the homepage

    }

    public function userFinderOrCreate($sociliateUser) {
//        print_r($sociliateUser);

        $user = User::where('email', $sociliateUser->email)->first();

        if (!$user) {
            $user = new User();
            $user->name = $sociliateUser->getName();
            $user->email = $sociliateUser->getEmail();
            $user->password = bcrypt(123456);
            $user->save();
        }

        return $user;
    }



/*
        $findUser = User::where('email', $user->getEmail())->first();

        if ($findUser) {
            Auth::login($findUser);
        } else {
            $newUser = new User();
            $newUser->email = $user->getEmail();
            $newUser->name = $user->getName();
            $newUser->password = bcrypt(123456);
            $newUser->save();

            Auth::login($newUser);


        }

        return redirect('home');

        // $user->token;
    }*/
}
