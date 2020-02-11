@extends('layouts.frontend_layout')

@section('content')
<div class="all-title-box">
        <div class="container text-center">
            <h1>Contact<span class="m_1">Lorem Ipsum dolroin gravida nibh vel velit.</span></h1>
        </div>
    </div>
    
    <div id="support" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Need Help? Sure we are Online!</h3>
                <p class="lead">Let us give you more details about the special offer website you want us. Please fill out the form below. <br>We have million of website owners who happy to work with us!</p>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-12">
                    <div class="contact_form">
                        
                         @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                        <div id="message"></div>
                        <form  action="{{url('contact')}}" id="contact_info" method="post" autocomplete="off">
                            {{ csrf_field() }}
                            <fieldset class="row-fluid">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name">
                                </div>
                                <span class="text-denger">{{$errors->first("first_name")}}</span>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Your Email">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Your Phone">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <textarea class="form-control" name="message" id="message" rows="6" placeholder="Give us more details.."></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <input type="submit" value="SEND" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <div class="map-main-box">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="map-btn"><i class="fa fa-map-pin" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="map-box">
        <div id="custom-places" class="small-map"></div>
    </div>
<script type="text/javascript">
    $('#contact_info').validate({
        rules:{
            firstname:{
                required:true,
            },
        }
    });
</script>

@endsection


