@extends('admin.main')
@section('title', 'Product Editing')
@section('content')

<div class="content-wrapper">


       
 
    <!-- Main content -->
    <section class="content">
      @include('admin.partials.validate')


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">{{$product->name}} Editing</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
        <form action="{{route('admin.products.update', $product->id)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PUT')}}
              <div class="box-body">
              <div class="form-group">
                  <label for="exampleInputEmail1">Product Title</label>
                  <input type="product_title" name="product_title" value="{{$product->product_title}}" class="form-control" id="exampleInputProduct1" placeholder="Enter Product Title">
                </div>

                <div class="form-group">
                  <label for="exampleInputProduct1">Product Description</label>
                  <input type="product_description" name="product_description" value="{{$product->product_description}}" class="form-control" id="exampleInputProduct1" placeholder="Enter Product Description">
                </div>


             <div class="form-group">
               <label for="exampleInputCategoryTitle">Category</label>
                <select name="categories" id="categories" class="form-control">
                           @foreach ($categories as $category)
                                  <option value="{{ $category->id }}" {{$product->categories == $category->id ? "selected" : "" }}>{{ $category->category_title }}</option>
                           @endforeach
                     </select>
              </div>

                <div class="form-group">
                 <input type="radio"  id="status" name="status" value="0"  {{ ($product->status=="0")? "checked" : "" }} >In-Active</label>

            <input type="radio" id="status" name="status" value="1" {{ ($product->status=="1")? "checked" : "" }} >Active</label>
                </div> 
           <div class="form-group">
                          @if($product->featured_image)
          <img id="original" src="{{ asset('product/'.$product->featured_image) }}" height="70" width="70">
          @endif
          <input type="file" name="image" class="form-control" placeholder="">
          <span class="text-danger">{{ $errors->first('image') }}</span>
        </div>

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