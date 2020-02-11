<!DOCTYPE html>
<html>
<head>
      @include('layouts.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!--sidebar header -->
  @include('layouts.header')
  <!--sidebar end header -->

  <!--sidebar start -->
  @include('layouts.sidebar')
  <!--sidebar end -->

  <!-- main contect -->
  <div class="content-wrapper">
     @yield('content')
  </div>
<div class="control-sidebar-bg"></div>
</div>

</body>
</html>
@include('layouts.footer')