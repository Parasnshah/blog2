 <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <div class="modal-header tit-up">
                <button type="button" class="close" id="remove_error" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title set_title">Login</h4>
            </div>

            <div class="modal-body customer-box row">
                <div class="col-md-12">
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                           {{$errors->first()}}
                        </div>
                    @endif 
                    <ul class="nav nav-tabs">
                        <li class="active loginbtn"><a href="#Login" data-toggle="tab">Login</a></li>
                        <li class="registerbtn"><a href="#Registration" data-toggle="tab">Registration</a></li>
                    </ul>
                    
                 

                    <div class="alert alert-success" id="success_msg"  style="display: none;" ></div>

                    <div id="error_msg" class="text-danger" style="display: none;"></div>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="Login">
                        <form method="POST"  id="myform" autocomplete="off">
                        @csrf
                            <div class="form-group">
                                <div class="col-sm-12">
                                      <input id="email" type="text" class="form-control" name="email" autocomplete="off">
                                      <span>{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input id="password" type="password" class="form-control" name="password"  autocomplete="off">
                                    <span>{{ $errors->first('password') }}</span>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                    <input type="submit" name="submit" id="submit" value="Login" class="btn btn-light btn-radius btn-brd grd1">
                                    <a class="for-pwd" href="javascript:;">Forgot your password?</a>
                                </div>
                                @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                           {{$errors->first()}}
                        </div>
                    @endif 
                            </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="Registration">
                            <form method="post" id="register_info">
                             @csrf
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror email_info" name="email" value="{{ old('email') }}" placeholder="Email"  autocomplete="email">
                                     <span class="text-danger" id="error_user"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                     <input id="password" type="password" class="form-control @error('password') is-invalid @enderror pwd" name="password"  autocomplete="new-password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                     <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="row">                           
                                <div class="col-sm-10">
                                   <input type="submit" name="submit" id="submit" class="btn btn-light btn-radius btn-brd grd1" value="Submit">
                                    <button type="button" class="btn btn-light btn-radius btn-brd grd1 closem">
                                        Cancel</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>

    <!-- LOADER -->
    <div id="preloader">
        <div class="loading">
            <div class="finger finger-1">
                <div class="finger-item">
                <span></span><i></i>
                </div>
            </div>
            <div class="finger finger-2">
                <div class="finger-item">
                <span></span><i></i>
                </div>
            </div>
            <div class="finger finger-3">
                <div class="finger-item">
                <span></span><i></i>
                </div>
            </div>
            <div class="finger finger-4">
                <div class="finger-item">
                <span></span><i></i>
                </div>
            </div>
            <div class="last-finger">
                <div class="last-finger-item"><i></i></div>
            </div>
        </div>
    </div>
    <!-- END LOADER -->

    <header class="header header_style_01">
        <nav class="megamenu navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{url('/')}}"><img src="{{ asset('public/frontend/images/logos/logo-hosting.png')}}" alt="image"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="features.html">Features </a></li>
                        <li><a href="domain.html">Domain</a></li>
                        <li><a href="hosting.html">Hosting</a></li>
                        <li><a href="pricing.html">Pricing</a></li>
                        <li><a href="testimonials.html">Testimonials</a></li>
                        <li><a class="active" href="{{url('contact')}}">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#contact" class="btn-light btn-radius btn-brd log" data-toggle="modal" data-target="#login"><i class="flaticon-padlock"></i> Customer Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <script type="text/javascript">
    $("#remove_error").click(function(){
       var validator = $("#register_info").validate();
        validator.resetForm();
      
    });
    $('button').click(function(){

      $('#login').modal('hide');
    })
</script>