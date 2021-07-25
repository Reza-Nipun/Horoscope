@extends('layouts.app')

@section('content')
<div class="wrapper">

@include('menu')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Today's Update</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <h5 class="mb-2">Today's Update</h5>
        <div class="row">
        
        @foreach ($today_zodiacs as $today_zodiac)
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-default">
                <!-- <i class="far fa-envelope"></i> -->
                <img src="{{ asset('storage/uploads/'.$today_zodiac->zodiac_sign->image) }}" width="60" height="60" />
              </span>

              <div class="info-box-content" style="background-color: {{ $today_zodiac->zodiac_score->color_code }}">
                <span class="info-box-text">{{ $today_zodiac->zodiac_sign->name }}</span>
                <span class="info-box-number">
                  <h4>{{ $today_zodiac->day_score }}</h4>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        @endforeach

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection
