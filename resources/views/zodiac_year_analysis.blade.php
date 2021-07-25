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
            <h1>ZODIAC YEARLY ANALYSIS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">YEARLY ANALYSIS</li>
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
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                <form action="{{ route('yearly-zodiac-analysis') }}" method="get">

                  @csrf

                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="zodiac_year">Year-Month</label>
                        <div class="input-group date" id="year" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" id="zodiac_year" name="zodiac_year" data-target="#year" placeholder="YYYY"/>
                            <div class="input-group-append" data-target="#year" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-2 d-flex align-items-end">
                      <div class="form-group">
                        <button class="btn btn-success" onclick="getZodiacMonthYearScore();">
                          <i class="fas fa-search"></i> SEARCH
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="card card-success">
                      <div class="card-header">
                        <h3 class="card-title">Best Yearly Zodiac Chart</h3>

                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="chart">
                          <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                      </div>
                      <!-- /.card-body -->
                  </div>
                    <!-- /.card -->
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

@if(isset($zodiac_year))

@php
  $zodiac_signs = "";
  $zodiac_avg_scores = "";

  $default_color = '#65b4db';
  $best_color = '#00ff00';

  foreach ($zodiac_scores as $zodiac_score){
      
    $zodiac_signs .= "'".$zodiac_score->zodiac_sign->name."',";

    $zodiac_avg_scores .= ($zodiac_score->avg_score * 1).",";
      
  }
@endphp
<script>

function argMax(array) {
  return Math.max(...array);
}

$(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    // other data color
    var default_color_code = '#ffd500';
    var max_color_code = '#00ff00';

    // change max color
    var data_list = [<?php echo $zodiac_avg_scores?>];
    var max_value = argMax(data_list);

    var color = [];
    for(var i=0; i<=data_list.length; i++){
        if(data_list[i] == max_value){
          color.push(max_color_code);
        }else{
          color.push(default_color_code);
        }
    }

    console.log(data_list.length);

    var areaChartData = {
      // labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      labels  : [<?php echo $zodiac_signs;?>],
      datasets: [
        {
          label               : 'Avg. Score',
          backgroundColor     : color,
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php echo $zodiac_avg_scores?>],
        },
      ]
    }

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false,
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
            display: true,
            ticks: {
                suggestedMin: 0,    // minimum will be 0, unless there is a lower value.
                // OR //
                beginAtZero: true   // minimum value will be 0.
            }
        }]
    }
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

  })

</script>

@endif

@endsection
