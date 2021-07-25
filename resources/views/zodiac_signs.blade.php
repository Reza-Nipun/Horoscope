@extends('layouts.app')

@section('content')
<div class="wrapper">

@include('menu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ZODIAC SIGNS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">ZODIAC SIGNS</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">ZODIAC SIGNS</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Code</th>
                      <th>Description</th>
                      <th style="width: 40px">Image</th>
                      <!-- <th style="width: 40px">Action</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($zodiac_signs as $k => $zodiac_sign)
                        <tr>
                            <td>{{ $k+1 }}</td>
                            <td>{{ $zodiac_sign->name }}</td>
                            <td>{{ $zodiac_sign->code }}</td>
                            <td>
                                {{ $zodiac_sign->description }}
                            </td>
                            <td>
                                <img src="{{ asset('storage/uploads/'.$zodiac_sign->image) }}" width="60" height="60" />
                            </td>
                            <!-- <td></td> -->
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->
@endsection
