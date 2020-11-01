@extends('admin.main')
@section('title', 'Category Editing')
@section('content')

<div class="content-wrapper">


       
 
    <!-- Main content -->
    <section class="content">
      @include('admin.partials.validate')


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">{{$category->name}} Editing</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
        <form action="{{route('admin.categories.update', $category->id)}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
              <div class="box-body">
              <div class="form-group">
                  <label for="exampleInputEmail1">Category Ttile</label>
                  <input type="category_title" name="category_title" value="{{$category->category_title}}" class="form-control" id="exampleInputCategory1" placeholder="Enter Category Title">
                </div>

                <div class="form-group">
                 <input type="radio"  id="status" name="status" value="0"  {{ ($category->status=="0")? "checked" : "" }} >In-Active</label>

            <input type="radio" id="status" name="status" value="1" {{ ($category->status=="1")? "checked" : "" }} >Active</label>
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