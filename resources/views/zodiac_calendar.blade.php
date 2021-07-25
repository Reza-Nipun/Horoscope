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
            <h1>ZODIAC CALENDAR</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">ZODIAC CALENDAR</li>
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
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="selectZodiacSign">Zodiac Sign</label>
                        <select class="form-control select2bs4" style="width: 100%;" id="selectZodiacSign">
                          <option value="">Select Zodiac Sign</option>
                          @foreach ($zodiac_signs as $zodiac_sign)
                           
                            <option value="{{ $zodiac_sign->id }}">{{ $zodiac_sign->name }}</option>
                           
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="zodiac_year_month">Year-Month</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" id="zodiac_year_month" data-target="#reservationdate" placeholder="YYYY-MM"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-2 d-flex align-items-end">
                      <div class="form-group">
                        <button class="btn btn-success" onclick="getZodiacCalenderScore();">
                          <i class="fas fa-search"></i> SEARCH
                        </button>
                      </div>
                    </div>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th class="text-center">Date</th>
                      <th class="text-center">Score</th>
                    </tr>
                  </thead>
                  <tbody id="tbody_id"></tbody>
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

<script>

  function getZodiacCalenderScore(){
      var zodiac_sign_id = $("#selectZodiacSign").val();
      var zodiac_year_month = $("#zodiac_year_month").val();

      if(zodiac_sign_id != '' && zodiac_year_month != ''){
        $("#tbody_id").empty();

        $.ajax({
            url: "{{ route('get-zodiac-calender-score') }}",
            type:'POST',
            data: {_token:"{{csrf_token()}}", zodiac_sign_id: zodiac_sign_id, zodiac_year_month: zodiac_year_month},
            dataType: "html",
            success: function (data) {
                $("#tbody_id").append(data);
            }
        });
      }else{
        alert("Please Select Filter Options!");
      }
      
  }

</script>

@endsection
