
@extends('layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="post" action="{{route('update.product',['id'=>$product->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" value="{{$product->name}}" class="form-control"  placeholder="Enter Name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">description</label>
                    <input type="text" name="description" value="{{$product->description}}" class="form-control"  placeholder="Enter Name">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">image</label>
                    <div class="input-group" style="width: 70%;">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile"  oninput="product_img.src=window.URL.createObjectURL(this.files[0])">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append" style="margin-right: 1rem;">
                        <span class="input-group-text">Upload</span>
                      </div>
                      <div class="custom-file">
                        <img alt="product Image" id="product_img" style="width:200px;height: 100px;border-radius: 8px; " src="{{asset($product->image)}}">
                      </div>
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection