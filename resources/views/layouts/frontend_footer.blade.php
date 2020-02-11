<div class="parallax section db parallax-off" style="background-image:url('uploads/parallax_02.jpg');">
    <div class="container">
        <div class="row logos">
             <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                <a href="#"><img src="{{ asset('public/frontend/uploads/logo_01.png')}}" alt="" class="img-repsonsive"></a>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                <a href="#"><img src="{{ asset('public/frontend/uploads/logo_02.png')}}" alt="" class="img-repsonsive"></a>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                <a href="#"><img src="{{ asset('public/frontend/uploads/logo_03.png')}}" alt="" class="img-repsonsive"></a>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                <a href="#"><img src="{{ asset('public/frontend/uploads/logo_04.png')}}" alt="" class="img-repsonsive"></a>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                <a href="#"><img src="{{ asset('public/frontend/uploads/logo_05.png')}}" alt="" class="img-repsonsive"></a>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                <a href="#"><img src="{{ asset('public/frontend/uploads/logo_06.png')}}" alt="" class="img-repsonsive"></a>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div>
<section class="section nopad cac text-center">
    <a href="#"><h3>Interesting our awesome web design services? Just drop an email to us and get quote for free!</h3></a>
</section>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <img src="{{ asset('public/frontend/images/logos/logo-hosting-light.png')}}" alt="">
                        <small>Web Hosting Template</small>
                    </div>
                    <p> Integer rutrum ligula eu dignissim laoreet. Pellentesque venenatis nibh sed tellus faucibus bibendum. Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et magnis dis montes.</p>
                    <p>Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et magnis dis montes.</p>
                </div><!-- end clearfix -->
            </div><!-- end col -->

            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Information Link</h3>
                    </div>

                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul><!-- end links -->
                </div><!-- end clearfix -->
            </div><!-- end col -->
            
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Contact Details</h3>
                    </div>

                    <ul class="footer-links">
                        <li><a href="mailto:#">info@yoursite.com</a></li>
                        <li><a href="#">www.yoursite.com</a></li>
                        <li>PO Box 16122 Collins Street West Victoria 8007 Australia</li>
                        <li>+61 3 8376 6284</li>
                    </ul><!-- end links -->
                </div><!-- end clearfix -->
            </div><!-- end col -->
            
            <div class="col-md-2 col-sm-2 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Social</h3>
                    </div>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fa fa-facebook"></i> 22.543 Likes</a></li>
                        <li><a href="#"><i class="fa fa-github"></i> 128 Projects</a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i> 12.860 Followers</a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i> 3312 Shots</a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i>3331 Pins</a></li>
                    </ul><!-- end links -->
                </div><!-- end clearfix -->
            </div><!-- end col -->              
        </div><!-- end row -->
    </div><!-- end container -->
</footer>
<div class="copyrights">
    <div class="container">
        <div class="footer-distributed">
            <div class="footer-left">
                <p class="footer-company-name">All Rights Reserved. &copy; 2018 <a href="#">HostCloud</a> Design By : <a href="https://html.design/">html design</a></p>
            </div>

            <div class="footer-right">
                <form method="get" action="#">
                    <input placeholder="Subscribe our newsletter.." name="search">
                    <i class="fa fa-envelope-o"></i>
                </form>
            </div>
        </div>
    </div><!-- end container -->
</div><!-- end copyrights -->

<a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
<script type="text/javascript">
$(document).ready(function () {

    $('#myform').validate({ 
        rules: {
            email: {
                required: true
            },
            password: {
                required: true
            }
        },
        errorPlacement: function(){
            return false;
        },
        submitHandler: function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          url:"{{ url('/logins') }}",
          type: 'post',
          data: $('#myform').serialize(),
          success: function(result){
            if(result == "home")
            {
                var homeurl = "{{url('/')}}/home";
                window.location = homeurl;
            }
            else if(result == "admin")
            {
                var adminurl = "{{url('/')}}/admin/dashboard";
                window.location = adminurl;
            }
            else if(result == "error"){
            showNotification({
                message : "Inavalid login details",
                type : "error",
                autoClose : true,
                duration: 5
              });
            }
          }
        });  
      } 
    })
    $('.loginbtn').click(function(){
        $('.set_title').html('Login');
    });
    $('.registerbtn').click(function(){
        $('.set_title').html('Registration');
    });
    $('.closem').click(function(){
        $("#register_info").validate().resetForm();
        $('#login').modal('hide');
    });

$('.email_info').blur(function(){
   
  var email = $('.email_info').val();
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
        minlength: 6,
      
      },
      password_confirmation: {
        required: true,
        equalTo:  ".pwd",
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
        required: "Password is required",
        minlength:"Password must be 6 charater longer"

      },
       password_confirmation: {
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
          url:"{{ url('/registers') }}",
          type: 'post',
          data: $('#register_info').serialize(),
          success: function(result){
            if(result == 'error')
            {
                $('#error_user').html('Email is already exist')
            }else
            {   
                $('#success_msg').show();
                setTimeout(function(){
                    $('#success_msg').fadeOut('slow');
                },1000); 
                $('#success_msg').html('Successfully register with us');
                $('#register_info')[0].reset();
                setTimeout(function(){$('#login').modal('hide')},3000);
            }
          }
        });  
      } 
  });
});
</script>