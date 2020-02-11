<header class="main-header">
    <!-- Logo -->
    <a href="{{url('/admin/dashboard')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Laravel</b> Admin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <a class="btn btn-danger btn-flat" href="{{url('/')}}" target="_blank" style="margin-top:8px;"><span class="glyphicon glyphicon-log-in"></span> Go to Front-End</a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

         
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{url('/')}}/public/profile/{{Auth::user()->image}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{{ ucfirst(Auth::user()->name) }}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{url('/')}}/public/profile/{{Auth::user()->image}}" class="img-circle" alt="User Image">

                <p>
                  @php $ten_days_later = time() + 10*60*60*24; @endphp
                  {{ucfirst(Auth::user()->name)}}- Administrator<br>
                  Last login at <span style="color: black">{{(date('d F Y, h:i:s',strtotime(Auth::user()->last_login_at)))}}</span>
                 
                </p>
              </li>
              <!-- Menu Body -->
            
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="{{url('admin/logout')}}" class="btn btn-danger btn-flat"><span class="glyphicon glyphicon-log-out"></span> Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
</header>

