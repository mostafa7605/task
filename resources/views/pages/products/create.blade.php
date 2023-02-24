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
            <h3 class="card-title">Create New product</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form id="quickForm" method="post" action="{{route('create.product')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Name">
              </div>

              <div class="form-group row" style="margin-right:0px; margin-left: 0px;">
                <div style="width:25%;margin-right:1rem;  ">
                  <label for="exampleInputEmail1">description</label>
                  <input type="text" name="description" class="form-control" placeholder="Enter Address Name">
                </div>
                
              </div>

              <div class="form-group">
                <label for="exampleInputFile">image</label>
                <div class="input-group" style="width: 70%;">
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="exampleInputFile" oninput="product_img.src=window.URL.createObjectURL(this.files[0])">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append" style="margin-right: 1rem;">
                    <span class="input-group-text">Upload</span>
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