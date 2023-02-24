
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
            <h3 class="card-title">Create New category</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form id="quickForm" method="post" action="{{route('create.category')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control"  placeholder="Enter Name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">descreption</label>
                <textarea class="form-control" placeholder="Leave a comment here" name="descreption"></textarea>
              </div>
              <div class="form-group row" style="margin-right:0px; margin-left: 0px;">
                <div style="width:25%;margin-right:1rem;  ">
                  <label for="exampleInputEmail1">order</label>
                  <input type="number" name="order" class="form-control"  placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">image</label>
                <div class="input-group" style="width: 70%;">
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="exampleInputFile"  oninput="category_img.src=window.URL.createObjectURL(this.files[0])">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="custom-file">
                    <img alt="Company Image" id="category_img" style="width:200px;height: 100px;border-radius: 8px; " src="">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputFile">image</label>
                <div class="input-group" style="width: 70%;">
                  <select class="form-select" name="parent" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
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