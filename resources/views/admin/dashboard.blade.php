@extends('layouts.admin_layout')
@section('content')
 <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3 class="counter">150</h3>
              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>
              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3 class="counter_user">{{$total_users}}</h3>
              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{url('admin/manage_user')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3 class="">65</h3>
              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="row">
        <section class="col-lg-6 connectedSortable">
           <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title">Recent User Activities</h3>
            </div>
            <div class="box-body">
              <ul class="todo-list">
                @foreach($users_activity as $users_activitys)
                <li>
                  <span class="text">{{ucfirst($users_activitys->name)}}</span><br>
                  <span class="text">{{ucfirst($users_activitys->description)}}</a></span>
                  <!-- Emphasis label -->
                  <small class="label label-danger"></i>{{$users_activitys->created_at->diffForHumans()}}</small>
                </li>
                @endforeach
              </ul>
            </div>
            <div class="box-footer text-center">
                  <a href="{{url('/admin/user_activity')}}" class="uppercase">View All Users activity</a>
                </div>
          </div>
        </section>
        <section class="col-lg-6 connectedSortable">
         <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Register Users</h3>
                  <div class="box-tools pull-right">
                    <span class="label label-danger"></span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>

                <div class="box-body">
                   <ul class="todo-list">
                   @foreach($users as $user)
                 
                    <li>
                      
                      <span>{{ucfirst($user->name)}} &nbsp; <a href="mailto:{{$user->email}}"> {{$user->email}}</a>
                      <span class="users-list-date">{{date('dS M, Y',strtotime($user->created_at))}}</span></span>
                    </li>
                     @endforeach
                  </ul>
                </div>
                <div class="box-footer text-center">
                  <a href="{{url('admin/user')}}" class="uppercase">View All Users</a>
                </div>
              </div>
        </section>
        </div>
    </section>
<script src="{{ asset('public/js/jquery.min.js')}}"></script>    
<script type="text/javascript">
$({ Counter: 0 }).animate({
  Counter: $('.counter').text()
  
}, {
  duration: 1000,
  easing: 'swing',
  step: function() {
    $('.counter').text(Math.ceil(this.Counter)); 
  }
});

$({ Counter: 0 }).animate({
 
  Counter: $('.counter_user').text()
}, {
  duration: 1000,
  easing: 'swing',
  step: function() {
   
    $('.counter_user').text(Math.ceil(this.Counter));
    
  }
});

    </script>
@endsection
