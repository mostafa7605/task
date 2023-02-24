@extends('layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">products</h3>
          <a href="{{route('add.product')}}" style="background-color: #007bff;float: right;width:7rem; color: #fff; border-radius: 5px; text-align: center; ">Add product</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="jsGrid1" class="jsgrid" style="position: relative; height: 100%; width: 100%;">
              <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                <table class="jsgrid-table">
                  <tr class="jsgrid-header-row">
                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">Name</th>
                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 70px;">Description</th>
                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">image</th>
                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 50px;">Action</th>
                  </tr>
                </table>
              </div>

              <div class="jsgrid-grid-body" style="height: 816.8px;">
                <table class="jsgrid-table">
                  <tbody>
                    @foreach($products as $product)
                    <tr class="jsgrid-row">
                      <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">{{$product->name}}</td>
                      <td class="jsgrid-cell jsgrid-align-center" style="width: 150px;">{{$product->description}}</td>
                      <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">
                        <img src="{{asset($product->image)}}" style="width:100px;height: 60px;border-radius: 8px; ">
                      </td>
                      <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;">
                        <a href="{{url('/products/edit/'.$product->id)}}" style="margin-right: 1rem;">
                        <span id="boot-icon" class="bi bi-pen" style="font-size: 1rem; color: rgb(0,255, 0);"></span>
                      </a>
                        <a href="{{url('/product/delete/'.$product->id)}}">
                        <span id="boot-icon" class="bi bi-trash" style="font-size: 1rem; color: rgb(255, 0, 0);"></span>
                      </a>
                      
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>

         
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
@endsection