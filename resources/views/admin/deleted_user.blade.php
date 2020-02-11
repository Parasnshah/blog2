 @extends('layouts.admin_layout')


@section('content')
    <section class="content-header">
      <h1>
        Deleted User
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li  class="active"><a>Deleted User</a></li>
        
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

            <button class="btn deleteall btn-danger"><span class="glyphicon glyphicon-trash"></span>Restore</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><input type="checkbox" id="select_all" class="remove"></th>
                  <th>id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Register At</th>
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

<script src="{{ asset('public/js/jquery.min.js')}}"></script>

      
<script type="text/javascript">

$(document).ready(function(){
$('#example1').dataTable({
    "processing": true,
    "ajax": {
      "url": "manage_deleted_user",
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


function reload_table(){  
  $('#example1').dataTable().api().ajax.reload();
}
 </script>
@endsection