@extends('layouts.admin_layout')


@section('content')
 <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Profile</h3>
            </div>
           
                         <div class="alert alert-success alert-dismissible" style="display:none;">
                        </div>
                   

            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="profile" method="post">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">User Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="inputEmail3" value="{{Auth::user()->name}}" placeholder="User Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" id="email" placeholder="Email">
                    <div id="error_user"></div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" id="ajaxSubmit">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
 <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

 <script type="text/javascript">
    $(document).ready(function(){
       $('#ajaxSubmit').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });

               $.ajax({
                  url: "{{ url('admin/profile') }}",
                  method: 'post',
                  data: $('#profile').serialize(),
                  success: function(result){
                      $('.alert-success').show();
                     $('.alert-success').html(result);
                       $(".alert-success").fadeTo(700, 400).slideUp(1000, function(){
                    $(".alert-success").slideUp(1000);
     });               
                   
                  }});
       });        





 $('#email').blur(function(){
  var email = $('#email').val();
  var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{url('admin/check_email')}}",
    method:"POST",
    data:{email:email, _token:_token},
    success:function(result)
    {
     if(result == 'not_unique')
     {
      $('#error_user').html('<label class="text-danger">Email is already exist</label>');
      $('.user').removeClass('has-error');
      $('#ajaxSubmit').attr('disabled', 'disabled');
     }
     else
     {
      $('#error_user').html('');
       $('#ajaxSubmit').attr('disabled', false);
     }
    }
   })
 });
});   
 </script>          
@endsection