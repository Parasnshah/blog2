 @extends('layouts.admin_layout')


@section('content')
    <section class="content-header">
      <h1>
       Manage Users Inquery
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users Inquery</h3>
                        </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Date</th>
                </tr>
                </thead>
                <tbody>
                  @php $count = 1; @endphp
                  @if(count($inquery))
                  @foreach($inquery as $value)
                <tr>
                  <td>{{$count++}}</td>
                  <td>{{ ucfirst($value->firstname)}}</td>
                  <td>{{ ucfirst($value->lastname)}}</td>
                  <td><a href="mailto:{{ $value->email}}">{{ ucfirst($value->email)}}</a></td>
                  <td>{{ $value->mobile}}</td>
                  <td>{{ $value->created_at->diffForHumans()}}</td>
                </tr>
                @endforeach
                @endif
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@endsection