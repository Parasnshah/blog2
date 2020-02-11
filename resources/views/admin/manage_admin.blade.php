 @extends('layouts.admin_layout')


@section('content')
    <section class="content-header">
      <h1>
      Admin
        <small>Registred Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <button class="btn btn-default" ><span class="glyphicon glyphicon-dashboard"></span> Dashboard</button>
             <button class="btn btn-primary" onclick="reload_table();" id="some"><span class="glyphicon glyphicon-refresh"></span> Reload</button>
             <button class="btn btn-success add_new_user"><span class="glyphicon glyphicon-user"></span> Add Admin</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Profile Picture</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Registered At</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

<script src="{{ asset('public/js/jquery.min.js')}}"></script>
<script  src="{{ asset('public/js/jquery.validate.js')}}"></script>
<script type="text/javascript">

$(document).ready(function(){
$('#example1').dataTable({
    "processing": true,
    "ajax": {
      "url": "manage_admin",
      "type": "GET",        
    },
  });
});
$(document).on('click', '.delete', function(){ 
    var id = $(this).attr("id");  
    var remove = $(this).parent().parent();
    bootbox.confirm({ 
    message: "Are you sure want to delete this record ?",
    buttons: {
      'cancel': {
      label: 'Cancel',
      className: 'btn-danger'
      },
      'confirm': {
      label: 'Confirm',
      className: 'btn-success'
      } 
     }, 
    callback: function(result){
      if(result){
        $.ajax({
          type: "GET",
          url: "delete_user",
          data:{id:id},
          success: function(result){
           $.notify({message:result},{type:'success',placement:{from:"bottom",align:"right"},delay: 500,timer: 500});
            remove.fadeOut().remove();
            reload_table();
          },
        });
      }
    }
})       
});

$(document).on('click','.add_new_user',function(){
  $('#add_edit_modal').modal('show'); 
   $('#user_info')[0].reset();
   $("#pop_title").html("Add");
   $('#uid').val('');
});

$(document).on('click','.view',function(){
  $('#user-modal').modal('show');
  var id = $(this).attr('id');
  $.ajax({
          type: "GET",
          url: "view_user",
          data:{id:id},
          dataType: "json",
          success: function(result){
           $('#user_id').html(result[0].id);
           $('#user_name').html(result[0].name);
           $('#user_emails').html(result[0].email);
           $('#user_mobile').html(result[0].mobile);
           $('#user_status').html(result[0].status);
           $('#user_role').html(result[0].role);
           $('#user_created_at').html(result[0].created_at);
           if(result[0].image){
             $('#user_image').css('display','block');
           $('#user_image').html("<img src=../public/profile/" + result[0].image + " width='20%'>");
           }else{
             
              $('#user_image').css('display','none');
           
           } 
          },
        });
});

function reload_table(){  
  $('#example1').dataTable().api().ajax.reload();
}
 </script>
 <div id="user-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog"> 
      <div class="modal-content">                  
         <div class="modal-header"> 
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">*</button> 
             <h4 class="modal-title">
             <i class="glyphicon glyphicon-user"></i> User Details
             </h4> 
         </div>          
         <div class="modal-body">                       
             <div id="user_image">
                 
             </div>                       
             <div id="employee-detail">                                        
                 <div class="row"> 
                     <div class="col-md-12">                         
                     <div class="table-responsive">                             
                     <table class="table table-striped table-bordered">
                     <tr>
                     <th>EmpID</th>
                     <td id="user_id"></td>
                     </tr>                                     
                     <tr>
                     <th>Name</th>
                     <td id="user_name"></td>
                     </tr>                                         
                     <tr>
                     <th>Email</th>
                     <td id="user_emails"></td>
                     </tr>
                     <tr>
                     <th>Mobile</th>
                     <td id="user_mobile"></td>
                     </tr>
                     <tr>
                     <th>Status</th>
                     <td id="user_status"></td>
                     </tr>
                     <tr>
                     <th>Role</th>
                     <td id="user_role"></td>
                     </tr>
                     <tr>
                     <th>Register At</th>
                     <td id="user_created_at"></td>
                     </tr>                                                                           
                     </table>                                
                     </div>                                       
                   </div> 
              </div>                       
             </div>                              
         </div>           
       <div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
       </div>              
      </div> 
   </div>
</div>
<div id="add_edit_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="icon-paragraph-justify2"></i><span id="pop_title">Add</span> Users information</h4>
        </div>
        <!-- Form inside modal -->
        <form method="post"  id="user_info" autocomplete="off" action="" enctype="multipart/form-data">
           @csrf
          <div class="modal-body with-padding">
            <div class="form-group">
              <div class="row">
                <div class="col-sm-12">
                  <label>User Name :</label>
                   <input type="text" name="username" id="username"  class="form-control" autocomplete="true" value="">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-12">
                  <label>Email :</label>
                   <input type="email" name="email" id="user_email"  class="form-control" autocomplete="true">
                   <div id="error_user" class="text-danger"></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-12">
                  <label>Password :</label>
                   <input type="password" name="password" id="password"  class="form-control" autocomplete="true">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-12">
                  <label>Mobile :</label>
                   <input type="text" name="mobile" id="mobile"  class="form-control" autocomplete="true">
                </div>
              </div>
            </div> 
            <div class="form-group">
              <div class="row">
                <div class="col-sm-12">
                  <label>Profile :</label>
                   <input type="file" name="image" id="image">
                   <div class="preview"></div>
                </div>
              </div>
            </div>
          </div>  
          <div class="modal-footer">
            <button type="button" class="btn btn-warning Cancel" data-dismiss="modal">Cancel</button>
            <span id="add">
              <input type="text" name="id" value="" id="uid">
              <button type="submit" name="form_data" class="btn btn-primary">Submit</button>
            </span>
          </div>
        </form>
      </div>
    </div>
</div>
  <script type="text/javascript">
  $("#user_info").validate({
  rules: {
    username:{
      required: true,
      minlength:3
    },
    email: {
      required: true,
      email:true,
    },
    mobile:{
      required: true,
    },
    address:{
      required: true,
    },
    zip_code:{
      required: true,
    },
  },
  messages: {
    username: {
      required: "First name is required",
      minlength:"Your username must be 3 characters long",
    },
    email: {
      required: "Email address is required",   
      email:"Email address is not valid"
    },
    mobile:{
      required:"Mobile is required",
    },
    address:{
      required:"Address is required",
    },
    zip_code:{
      required:"Zip code is required",
    },
  },
  errorElement : 'div',
  errorLabelContainer: '.error',
  submitHandler: function() {
    var form = $('#user_info')[0]; 
    var data = new FormData(form); 

    $.ajax({
      url: "add_edit_user",
      type: "POST",
      data: data,
      processData: false,
      contentType: false,
      success: function(result)
      {
        $('#add_edit_modal').modal('hide');
        if(result == 'not_unique')
        {
          $('#user_modal').modal('show');
          return false;
        }else{
        $('#user_modal').modal('hide'); 
        reload_table();
         $.notify({message:result},{type:'success',placement:{from:"bottom",align:"right"}});
        }
      },
      error:function(result)
      {
          alert(result);
      }, 
    });   
  }
});
  
 $(document).on('click','.edit',function(){
  $('#add_edit_modal').modal('show');
  var id = $(this).attr('id');
  $('#uid').val(id);
  if(id)
  {
    $('#pop_title').html('Edit');
  }
  else
  {
    $('#pop_title').html('Add');
  }

  $.ajax({
        url: "view_user",
        dataType: 'json',
        method:"GET",
        data:{id:id},
        success: function(result)
        {
            $('#username').val(result[0].name);
            $('#user_email').val(result[0].email);
            $('#mobile').val(result[0].mobile);
            
        }
  });      
}); 
</script>
@endsection