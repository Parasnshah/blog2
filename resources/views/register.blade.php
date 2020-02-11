@extends('layouts.app')

@section('content')
<div class="container">
  <style type="text/css">.error{color:red;}</style>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="alert alert-success alert-dismissible" style="display:none;"></div>

                <div class="card-body">
                    <form method="post" id="register_info" >
                        @csrf
                         @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" autocomplete="true">

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="email">
                                <div id="error_user"></div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="off">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="cpassword" type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="cpassword" autocomplete="off">

                                @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit">
                                   
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('public/js/jquery.validate.js')}}"></script>
<script>
    $(document).ready(function () {
    $("#register_info").validate({
    rules: {
      name:{
       required: true,
      },

      mobile:{
       required: true,
      },

      email:{
       required: true,
       email:true,
      },

      password: {
        required: true,
        minlength: 6
      
      },
      cpassword: {
        required: true,
        equalTo:  "#password",
      },
    },
    messages: {
      name: {
        required: "User Name is required",
      },
      mobile: {
        required: "Mobile Number is required",
      },
      email: {
        required: "Email is required",
        email: "Email Address is not valid"
      },
      password: {
        required: "New password is required",
        minlength:"Password must be 6 charater longer"

      },
       cpassword: {
         required: "Confirm password is required",
        equalTo: "Password and confirm password dones not match",
      },
    }, 
     errorElement : 'div',
      errorLabelContainer: '.error',
      submitHandler: function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          url:"{{ url('/register') }}",
          type: 'post',
          data: $('#register_info').serialize(),
          success: function(result){
            $('.alert-success').show();
            $('#register_info')[0].reset();
            $('.alert-success').html(result);
          }
        });  
      } 
  });
});

$('#email').blur(function(){

  var email = $('#email').val();
  var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{url('check_email')}}",
    method:"POST",
    data:{email:email, _token:_token},
    success:function(result)
    {
     if(result == 'not_unique')
     {
      $('#error_user').html('<label class="text-danger">Email is already exist</label>');
      $('.user').removeClass('has-error');
      $('#submit').attr('disabled', 'disabled');
     }
     else
     {
      $('#error_user').html('');
       $('#submit').attr('disabled', false);
     }
    }
   })
 });
</script>
@endsection