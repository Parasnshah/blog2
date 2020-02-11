<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{   



    use AuthenticatesUsers;
    
    protected $maxAttempts = 3; // Default is 5
    protected $decayMinutes = 2; // Default is 1
 
    public function __construct()
    {   
        if (auth()->guest()) {
            return redirect('/');
        }

        $this->middleware('guest')->except('logout');
    }

  
    public function authenticated(Request $request, $user)
    {
       $user->last_login_at = Carbon::now();
        $user->last_login_ip = $request->getClientIp();
        $user->save();
    }

    protected function redirectTo()
    {
        activity()->log('LoggedIn');
        if(Auth::user()->role == 'admin')
        {
            return 'admin/dashboard';
        }
        else
        {
            return 'home';

        }
    }

    public function showRsdfegistrationForm()
    {
        return view('login');
    }

    public function dologin(Request $request)
    {
        $this->validate($request,
        [
            'email' => 'required',
            'password' => 'required'
        ],
        [ 'email.required' => 'Email is required',
           'password.required' => 'password is required', 
        ]);
      
        $user_info = array(
            'email' => $request->input('email'),
            'password' => $request->input('password')
        );

    
        if(Auth::attempt($user_info))
        {
            if(Auth::check()){
               activity()->log('LoggedIn');
                $data = User::where('email',$request->email)->first();

                if($data->role == 'admin')
                {
                  
                    return "admin";
                   
                }
                else
                {
                   
                 
                 return "home";
                   
                }
            }
            else
            {
               return redirect('login');
            }
        }
        else
        {
             return "error";
        }

    }
}
