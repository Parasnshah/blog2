<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Contact;
class Admincontroller extends Controller
{
   public function __construct()
    { 

        if (!Auth::check()) {
            return redirect('/sdf');
        }
    }

    public function view_users()
    {
      return view('admin/manage_user');
    }


    public function view_user(Request $request)
    {
      $id = $request->get('id');
      $data = User::where('id',$id)->get();
      return response()->json($data);


    }

    public function index()
    {
         
       
      $total_users = User::count();
      $users = User::orderBy('id', 'desc')->where('role','user')->take(5)->get();
      $users_activity = User::select('users.id','users.name','activity_log.causer_id','activity_log.description','activity_log.created_at')
      ->join('activity_log','activity_log.causer_id','users.id')
      ->take(5)->orderBy('activity_log.id','DESC')->get();

      

    	return view('admin/dashboard')->with('total_users',$total_users)->with('users',$users)->with('users_activity',$users_activity);	
    }

    public function logout()
    {

      Auth::logout();
       
    return redirect('/');
    }

    public function profile()
    {
      return view('admin/profile');
    }

    public function save_profile(Request $request)
    {
        $id= Auth::user()->id;

        $profile = [
            'name' => $request->name,
            'email' => $request->email
        ];

        User::where('id',$id)->update($profile);

        return "Profile Successfully Updated";
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

    public function cpassword()
    {
        return view('admin/change_password');
    }

    public function deleted_user()
    {
      return view("admin.deleted_user");
    }

     public function manage_deleted_user(Request $request){

      $user  = User::onlyTrashed()->get();
      $data = array();
      $count = 1;
      foreach ($user as $result) {

        $row = array();
        $row[] = '<input type="checkbox" class="id cb-element remove" name="id[]" value="'.$result['id'].'">';
        $row[] = $count++;
        $row[] = $result['name']; 
        $row[] = $result['email'];
        $row[] = $result['role'];
        $row[] = date('D/m/y' ,strtotime($result['created_at']));
        $action_column = '<a href="javascript:void(0);"'.$result['id'].' class="delete" id="'.$result['id'].'"><span class="glyphicon glyphicon-trash" style="padding: 0 10px 0 0;"></span></a> ';

        
        $row[] = $action_column;
        $data[] = $row;
      }

      $results = ["sEcho" => 1,
          "iTotalRecords" => count($data),
          "iTotalDisplayRecords" => count($data),
          "data" => $data
      ];
      return response()->json($results); 
    }

    public function delete_user(Request $request)
    {
      $id = $request->get("id");
      User::where('id',$id)->delete();
      return "Successfully record deleted";
    }

    public function delete_all_user(Request $request)
    {
      $id = $request->get('id');
      User::Wherein('id',$id)->delete();
      return "Successfully record deleted";
    }

    public function restore_user(Request $request)
    {   
      $id = $request->get('id');
      User::where('id',$id)->restore();

      return 'Successfully user restored';
    }

    public function restore_all_user(Request $request)
    {   
      $id = $request->get('id');
      User::Wherein('id',$id)->restore();

      return 'Successfully users restored';
    }

    public function change_password(Request $request){

        $data = array(
            'id' => Auth::user()->id,
            'password' => $request->old_password
        );

        if(Auth::attempt($data)){
            $update = array(
                'password' => bcrypt($request->password),
            );

            User::where('id',Auth::user()->id)->update($update);
            return "Successfully password changed";
        }
        else
        {
            echo "old_password_worng";
        }
    }

    public function edit_user(Request $request,$id){

      if(request()->ajax())
        {
            $data = User::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    public function update_user(Request $request){

       $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $rules = array(
                'name'    =>  'required',
                'email'     =>  'required',
                'mobile'    => 'required', 
                'image'         =>  'image|max:2048'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $rules = array(
                'name'    =>  'required',
                'email'     =>  'required',
                'mobile'    => 'required'
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
        }

        $form_data = array(
            'name'       =>   $request->name,
            'email'        =>   $request->email,
            'mobile'    =>  $request->mobile,
            'image'            =>   $image_name
        );
        User::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
    

    }

    public function manage_user()
    {
      $user = User::latest()->where('role','user')->get();
      $data = array();
      foreach ($user as $result) {

        $row = array();
        $row[] = '<input type="checkbox" class="id cb-element remove" name="id[]" value="'.$result['id'].'">';
        $row[] = $result['id'];
        if($result['image']!=""){
            $image = '<img src=../public/profile/'.$result['image'].' height="40px">';
          }else{
            $image = '<img src="../public/profile/no_image.png" height="40px">';
          }
        $row[] = $image;

        $row[] = $result['name']; 
        $row[] = $result['email'];
        $row[] = date('D/m/y' ,strtotime($result['created_at']));

        $action_column = '<a href="javascript:void(0);"'.$result['id'].' class="delete" id="'.$result['id'].'"><span class="glyphicon glyphicon-trash" style="padding: 0 10px 0 0;"></span></a> ';
        $action_column .= '<a href="javascript:void(0);"'.$result['id'].' class="view" id="'.$result['id'].'"><span class="glyphicon glyphicon-eye-open" style="padding: 0 10px 0 0;"></span></a> ';
         $action_column .= '<a href="javascript:void(0);"'.$result['id'].' class="edit" id="'.$result['id'].'"><span class="glyphicon glyphicon-edit" style="padding: 0 10px 0 0;"></span></a> ';
         if($result['status']=='active'){              
      $action_column .= '<a class="text-danger user_status" href="javascript:void(0);" id="'.$result['id'].'" data-id="'.$result['status'].'" title="status">In-Active</a> ';
    }else{              
      $action_column .= '<a class="text-success user_status" href="javascript:void(0);" id="'.$result['id'].'"  data-id="'.$result['status'].'" title="status">Active</a> ';
    } 
        $row[] = $action_column;
        $data[] = $row;
      }

      $results = ["sEcho" => 1,
          "iTotalRecords" => count($data),
          "iTotalDisplayRecords" => count($data),
          "data" => $data
      ];     

      return response()->json($results);
    }

    public function user_activity(){

      return view('admin.manage_user_activities');

    }

    public function manage_user_activity()
    {

      $users_activity = User::select('users.id','users.name','users.email','activity_log.causer_id','activity_log.description','activity_log.created_at')
      ->join('activity_log','activity_log.causer_id','users.id')
      ->orderBy('activity_log.id','DESC')->get();

      $data = array();
      foreach ($users_activity as $result) {

        $row = array();
        $row[] = '<input type="checkbox" class="id cb-element remove" name="id[]" value="'.$result['id'].'">';
        $row[] = $result['id'];
        $row[] = $result['name']; 
        $row[] = $result['description'];
        $row[] = date('D/m/y' ,strtotime($result['created_at']));

        $action_column = '<a href="javascript:void(0);"'.$result['id'].' class="delete" id="'.$result['id'].'"><span class="glyphicon glyphicon-trash" style="padding: 0 10px 0 0;"></span></a> ';
        $action_column .= '<a href="javascript:void(0);"'.$result['id'].' class="view" id="'.$result['id'].'"><span class="glyphicon glyphicon-eye-open" style="padding: 0 10px 0 0;"></span></a> ';
        
        $row[] = $action_column;
        $data[] = $row;
      }

      $results = ["sEcho" => 1,
          "iTotalRecords" => count($data),
          "iTotalDisplayRecords" => count($data),
          "data" => $data
      ];     

      return response()->json($results);
    }

    public function admin(){

       return view('admin.manage_admin');
    }

    public function manage_admin(){

      $admin_info = User::latest()->where('role','admin')->get();

      $data = array();
      foreach ($admin_info as $result) {

        $row = array();
        $row[] = $result['id'];
        if($result['image']!=""){
            $image = '<img src=../public/profile/'.$result['image'].' height="40px">';
          }else{
            $image = '<img src="../public/profile/no_image.png" height="40px">';
          }
        $row[] = $image;

        $row[] = $result['name']; 
        $row[] = $result['email'];
        $row[] = date('D/m/y' ,strtotime($result['created_at']));

         $a = $result['id'];; 
         $b = Auth::user()->id; 


      if($a == $b){ 
         $action_column = '<a href="javascript:void(0);"'.$result['id'].' class="view" id="'.$result['id'].'"><span class="glyphicon glyphicon-eye-open" style="padding: 0 10px 0 0;"></span></a> ';
          $action_column .= '<a href="javascript:void(0);"'.$result['id'].' class="edit" id="'.$result['id'].'"><span class="glyphicon glyphicon-edit" style="padding: 0 10px 0 0;"></span></a> ';
      }
      else{


        $action_column = '<a href="javascript:void(0);"'.$result['id'].' class="view" id="'.$result['id'].'"><span class="glyphicon glyphicon-eye-open" style="padding: 0 10px 0 0;"></span></a> ';
      
        $action_column .= '<a href="javascript:void(0);"'.$result['id'].' class="delete" id="'.$result['id'].'"><span class="glyphicon glyphicon-trash" style="padding: 0 10px 0 0;"></span></a> ';

         $action_column .= '<a href="javascript:void(0);"'.$result['id'].' class="edit" id="'.$result['id'].'"><span class="glyphicon glyphicon-edit" style="padding: 0 10px 0 0;"></span></a> ';
      }
       
      
       $row[] = $action_column;
        
        $data[] = $row;
      
      
      }

      $results = ["sEcho" => 1,
          "iTotalRecords" => count($data),
          "iTotalDisplayRecords" => count($data),
          "data" => $data
      ];     

      return response()->json($results);

    }

    public function inquery_listing(){
    $inquery =  Contact::all();
    return view('admin.inquery',compact('inquery'));
    }

    public function add_edit_user(Request $request){

      $id = $request->get("id");
      $password = $request->get('password');
      $image = request()->file('image');
      
      if($id!=""){
            if($password == "" && $image == "")
            {
                $data = User::find($id);
                $data->name = $request->input('username');
                $data->email = $request->input('email');
                $data->mobile = $request->input('mobile');
                $data->save();
            }
            elseif($password !== "" && $image == ""){
            
                $data = User::find($id);
                $data->name = $request->input('username');
                $data->email = $request->input('email');
                $data->mobile = $request->input('mobile');
                $data->password = Hash::make($request->input('password'));
            }
            elseif($password == "" && $image !== ""){
              
                $data = User::find($id);
                $data->name = $request->input('username');
                $data->email = $request->input('email');
                $data->mobile = $request->input('mobile'); 
                $image = request()->file('image');
                $path = public_path().'/profile/';
                $image_name = $image->getClientOriginalName(); 
                $image->move($path,$image_name); 
                $data->image = $image_name;
                $data->save();
            }
            else
            {
                $data = User::find($id);
                $data->name = $request->input('username');
                $data->email = $request->input('email');
                $data->mobile = $request->input('mobile'); 
                $data->password = Hash::make($request->input('password'));
                $image = request()->file('image');
                $path = public_path().'/profile/';
                $image_name = $image->getClientOriginalName(); 
                $image->move($path,$image_name); 
                $data->image = $image_name;
                $data->save();
            }
      }
      else
      {
        $data = new User;
        $data->name = $request->input('username');
        $data->email = $request->input('email');
        $data->mobile = $request->input('mobile');
        $data->role = "user";
        $data->password = Hash::make($request->input('password'));
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('profile'), $imageName);
        $data->save();
      }
      return "success";

    }

    public function change_user_status(Request $request)
    {
      $id = $request->get('id');
      $status = $request->get('status');

      if($status == 'active')
      {
        $data = User::find($id);
        $data->status = 'in-active';
        $data->save();
      }
      else
      {
        $data = User::find($id);
        $data->status = 'active';
        $data->save();
      }
      return "successfully status change";

    }
}
