@extends('admin.main')
@section('title', 'User Editing')
@section('content')

<div class="content-wrapper">


       
 
    <!-- Main content -->
    <section class="content">
      @include('admin.partials.validate')


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">{{$user->first_name}} {{$user->last_name}} Editing</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
        <form action="{{route('admin.users.update', $user->id)}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
              <div class="box-body">
              <div class="form-group">
                  <label for="exampleInputfirstname1">First Name</label>
                  <input type="first_name" name="first_name" value="{{$user->first_name}}" class="form-control" id="exampleInputfirstname1" placeholder="Enter First Name">
                </div>

                <div class="form-group">
                  <label for="exampleInputlast_name1">Last Name</label>
                  <input type="last_name" name="last_name" value="{{$user->last_name}}" class="form-control" id="exampleInputlast_name1" placeholder="Enter Last Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" value="{{$user->email}}"  class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <!-- <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">RePassword</label>
                  <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div> -->
                <div class="form-group">
                  <label for="exampleInputphone1">Phone</label>
                  <input type="phone" name="phone" value="{{$user->phone}}" class="form-control" id="exampleInputphone1" placeholder="Enter Phone">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

@endsection