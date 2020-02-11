<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function index(){
    	
    	return view('contact');
    }
    
    public function get_contact(Request $request){

    	$this->validate($request,
    	[
    		'firstname' => 'required|max:30',
            'lastname' => 'required|max:30',
            'email' => 'required|email',
            'mobile' => 'required',
            'message'=> 'required'
    	],
    	[
    		'firstname.required' => 'Firstname is required',
            'lastname.required' => 'Lastname is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email address is not valid',
            'message.required' => 'Message is required'
    	]);

    	$add_conatct = new Contact;
    	$add_conatct->firstname = $request->input('firstname');
    	$add_conatct->lastname = $request->input('lastname');
    	$add_conatct->email = $request->input('email');
    	$add_conatct->mobile = $request->input('mobile');
    	$add_conatct->message = $request->input('message');
    	$add_conatct->save();

    	return redirect('contact')->with('success','Thank you for contacting us – we will get back to you soon!');

    }
}
