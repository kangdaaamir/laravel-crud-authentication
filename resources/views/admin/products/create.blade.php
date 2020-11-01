@extends('admin.main')
@section('title', 'Product Create')
@section('content')

<div class="content-wrapper">


       
 
    <!-- Main content -->
    <section class="content">
      @include('admin.partials.validate')


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Product Create</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
        <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('POST')}}
              <div class="box-body">
              <div class="form-group">
                  <label for="exampleInputProductTitle">Product Title</label>
                  <input type="text" name="product_title" class="form-control" id="product_title" placeholder="Enter Product Title">
                </div>

             <div class="form-group">
               <label for="exampleInputCategoryTitle">Category</label>
                <select name="categories" id="categories" class="form-control">
                           @foreach ($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->category_title }}</option>
                           @endforeach
                     </select>
              </div>

                <div class="form-group">
                  <label for="exampleInputProductDescription">Product Description</label>
                  <input type="text" name="product_description" class="form-control" id="product_description" placeholder="Enter Product Description">
                </div>

                <div class="form-group">
                  <input type="radio"  id="status" name="status" value="0">In-Active</label>

                  <input type="radio" id="status" name="status" value="1">Active</label>
                </div> 

                <div class="form-group">
                <input type="file" name="image" class="form-control" placeholder="">
                <span class="text-danger">{{ $errors->first('image') }}</span>  
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Create</button>
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