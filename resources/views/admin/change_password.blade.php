@extends('layouts.admin_layout')


@section('content')

 <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>
            </div>
           
                         <div class="alert alert-success alert-dismissible" style="display:none;">
                        </div>
                   

            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="password_info" method="post">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Old Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="old_password" id="old_password" placeholder="User Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">New Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="password"  placeholder="User Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Confirm Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Email">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" id="password_submit">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
 <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

 <script type="text/javascript">
$(document).ready(function(){
$('#password_submit').click(function(e){
              e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
              $.ajax({
                  url: "{{ url('admin/change_password') }}",
                  method: 'post',
                  data: $('#password_info').serialize(),
                  success: function(result){
                    alert(result);
                      $('.alert-success').show();
                     $('.alert-success').html(result);
                       $(".alert-success").fadeTo(700, 400).slideUp(1000, function(){
                    $(".alert-success").slideUp(1000);
                });               
          }});
}); 
}); 
</script>          
@endsection