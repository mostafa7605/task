@extends('layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">categories</h3>
          <a href="{{route('add.category')}}" style="background-color: #007bff;float: right;width:7rem; color: #fff; border-radius: 5px; text-align: center; ">Add category</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="jsGrid1" class="jsgrid" style="position: relative; height: 100%; width: 100%;">
              <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                <table class="jsgrid-table">
                  <tr class="jsgrid-header-row">
                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">Name</th>
                    <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 50px;">Action</th>
                  </tr>

                </table>
              </div>

              <div class="jsgrid-grid-body" style="height: 816.8px;">
                <table class="jsgrid-table">
                  <tbody>
                    @foreach($categories as $category)
                    <tr class="jsgrid-row">
                      <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">{{$category->name}}</td>
                      
                      <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;">
                        <a href="{{url('/category/edit/'.$category->id)}}" style="margin-right: 1rem;">
                          <span  class="bi bi-pen" style="font-size: 1rem; color: rgb(0,255, 0);"></span>
                        </a>
                        <a href="{{url('/category/delete/'.$category->id)}}">
                          <span class="bi bi-trash" style="font-size: 1rem; color: rgb(255, 0, 0);"></span>
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