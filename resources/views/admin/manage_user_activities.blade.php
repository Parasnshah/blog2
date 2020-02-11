 @extends('layouts.admin_layout')


@section('content')
    <section class="content-header">
      <h1>
       Manage Users Activities
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Users Activities</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
             
                        </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><input type="checkbox" id="select_all" class="remove"></th>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Activity</th>
                  <th>Date</th>
                  <th>Action</th>
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
@endsection
<script src="{{ asset('public/js/jquery.min.js')}}"></script>
<script type="text/javascript">

$(document).ready(function(){
$('#example1').dataTable({
    "processing": true,
    "ajax": {
      "url": "manage_user_activity",
      "type": "GET",        
    },
  });
});

$(document).on('click', '.delete', function(){ 
    var id = $(this).attr("id");  
    var remove = $(this).parent().parent();
    bootbox.confirm({ 
    message: "Are you sure want to restore this user ?",
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
          url: "restore_user",
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

$(document).on('click', '.deleteall', function(){ 
  var id = $('input[name="id[]"]:checked.id').map(function () {
    return this.value;
  }).get(); 
  if(id!=""){
    bootbox.confirm({ 
    message: "Are you sure want to restore this users ?",
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
          url: "restore_all_user",
          data:{id:id},
          success: function(result){
           $.notify({message:result},{type:'success',placement:{from:"bottom",align:"right"},delay: 500,timer: 500});
             reload_table();
          },
        });
      }
    }
  })
  }
  else
  {
   $.notify({message:'Please select the users which you want to restore.'},{type:'error',placement:{from:"bottom",align:"right"},delay: 700,timer: 700});
  }       
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
