@extends('layouts.backend.main')
@section('content')
  <!-- Left side column. contains the logo and sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> <a href="{{route('home')}}">Dashboard</a></li>
      </ol>
    </section>
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <!-- /.box-header -->
              <div class="box-body ">
                    <h3>Paw Rescue's Admin Dashboard</h3>
                    <p class="lead text-muted">Hallo {{Auth::user()->name}}, Welcome to Paw Rescue</p>

                    <p><a href="{{route('allpost')}}" class="btn btn-success">See All Posts on Paw Rescue</a> </p>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div>
      <!-- ./row -->
    </section>
            <!-- /.box -->
          </div>
        </div>
      <!-- ./row -->
    <!-- /.content -->
  </div>

 @endsection
