@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="register_info">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
                                <span id="error_user" class="text-danger"></span>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>

                       <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Captcha</label>

                            <div class="col-md-6">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                             <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>    
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
alert('df');
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
