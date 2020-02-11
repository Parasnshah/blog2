<aside class="main-sidebar">
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('/')}}/public/profile/{{Auth::user()->image}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{{ ucfirst(Auth::user()->name) }}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
         <li class="{{ (request()->is('admin/dashboard')) ? 'active' : '' }}" ><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Manage User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/user')}}"><i class="fa fa-user"></i>Users</a></li>
            <li><a href="{{url('admin/deleted_user')}}"><i class="fa fa-user"></i>Deleted User</a></li>
             <li><a href="{{url('admin/user_activity')}}"><i class="fa fa-user"></i>User Activity</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-gear"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ (request()->is('admin/admin')) ? 'active' : '' }}"><a href="{{url('admin/admin')}}" ><i class="fa fa-user"></i>Admins</a></li>
          </ul>
        </li>
     
        <li class="{{ (request()->is('admin/inquery')) ? 'active' : '' }}">
          <a href="{{url('admin/inquery')}}">
            <i class="fa fa-phone"></i>
            <span>Manage Inquery</span>
          </a>
        </li>
  </section>
</aside>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    var url = window.location; 
    var element = $('ul.sidebar-menu a').filter(function() {
    return this.href == url || url.href.indexOf(this.href) == 0; }).parent().addClass('active');
    if (element.is('li')) { 
         element.addClass('active').parent().parent('li').addClass('active')
     }
});
</script>