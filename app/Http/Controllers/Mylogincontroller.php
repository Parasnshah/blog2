<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;

class Mylogincontroller extends Controller
{   

     public function __construct()
  {
     $this->middleware('guest');
  }  
   
    public function index()
    {
        return view('login');
    }

    public function register()
    {
       return view('register');
    }

    public function check_email(Request $request)
    {
     if($request->get('email'))
     {
      $email = $request->get('email');
      $data = User::where('email', $email)
       ->count();
      if($data > 0)
      {
       echo 'not_unique';
      }
      else
      {
       echo 'unique';
      }
     }
    }

    public function add_user(Request $request)
    {  

        $this->validate($request,[
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'mobile' => 'required|numeric',
                'password' => 'required|min:6',
                'cpassword' => 'required|same:password'
            ],[
                'name.required' => 'Name is required.',
                'email.required' => 'Email is required.',
                 'email.email' => 'Email is not valid.',
                'mobile.required' => 'Mobile is required.',
                'password.required' => 'Password field is required.',
                'password.min' => 'Password must be at least 6 characters.',
                'cpassword.required' => 'Confirm password is required'
            ]);


        $add_data = new User;
        $add_data->name = $request->input('name');
        $add_data->mobile = $request->input('mobile');
        $add_data->email = $request->input('email');
        $add_data->password = bcrypt($request->input('password'));
        $add_data->save();
        return "successfully register with us";
    }


    public function store(Request $request)
    {
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
                   return redirect('admin/dashboard');
                }
                else
                {
                    return redirect('home');
                }
            }
            else
            {
               return redirect('login');
            }
        }
        else
        {
             return redirect('login')->with('error','Invalid login details');
        }

    }

    

 




    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }


    public function logout(Request $request) {
      activity()->log('LoggedOut');

      
      Auth::logout();
      return redirect('login');
    }
}
