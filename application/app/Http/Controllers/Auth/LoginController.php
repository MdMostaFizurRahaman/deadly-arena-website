<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Player;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Validator;

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

    public function username()
    {
        return 'player_displayname';
    }

    public function customLogin (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'player_displayname' => ['required', 'max:255'],
            'password' => ['required', 'min:4', 'max:20'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $player = Player::where('player_displayname', $request->player_displayname)
            ->where('player_password', $request->password)
            ->first();

            if($player) {
                Auth::loginUsingId($player->id);
                // -- OR -- //
                Auth::login($player);
                
                $request->session()->put('url.intended', url('/home'));
                return redirect()->route('home');
            } else {
            
            }
        }
     
    }


    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        
        $socialUser = Socialite::driver('facebook')->user();
       

        $player = Player::where('player_fb', $socialUser->getId())->first();
        if(!$player){

            $player = new Player;
            $player->player_fb = $socialUser->getId();
            $player->player_name = $socialUser->getName();
            $player->player_displayname = $socialUser->getId();
            $player->email = $socialUser->getEmail();
            // if($socialUser->getEmail()){
            //     $player->player_email = $socialUser->getEmail();
            // }else{
            //     return redirect('register')->with('error', 'You do not have an email to your social account. Email is required.');
            // }

            $player->save();
        }


        if(Auth::loginUsingId($player->id_player)){
            return redirect()->route('home');
        }
        

    

       
        // $user->token;
    }
}
