<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;
use Carbon\Carbon;




class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/home';


    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            //'g-recaptcha-response' => 'required|captcha',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    public function store(Request $request)
    {
       
        $email = $request->input('email');
        $email_info = User::where('email',$email)->get();

        if(sizeof($email_info) > 0)
        {
            return "error";    
        }else{
    
       
        $add_data = new User();
        $add_data->name = $request->input('name');
        $add_data->email = $request->input('email');
        $add_data->password = Hash::make($request->input('password'));
        $add_data->role = 'user';    
        $add_data->save();
        }
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
}
