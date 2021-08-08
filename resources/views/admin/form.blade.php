@extends('layouts.backend.main')
@section('content')
  <!-- Left side column. contains the logo and sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Form Adopsi
        <small>Pengajuan Adopsi</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> <a href="{{route('home')}}">Dashboard</a></li>
        <li><i class="fa fa-dashboard"></i> <a href="{{route('home')}}">Adoption Mangement</a></li>
        <li class="active">Form</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <!-- /.box-header -->
              <div class="box-body table-responsive">
                <table class="table table-condesed">
                  <tbody>
                  @foreach($posts as $post)
                      <tr>
                      
                        <td><b>Nama Lengkap</b></td>
                        <td>{{$post->namalengkap}}</td>
                        </tr>
                        <tr>
                        <td><b>Kucing yang Hendak Diadopsi</b></td>
                        <td>{{$post->posts->judul}}</td>
                        </tr>
                        <tr>
                        <td><b>Usia</b></td>
                        <td>{{$post->usia}}</td>
                        </tr>
                        <tr>
                        <td><b>Alamat</b></td>
                        <td>{{$post->alamat}}</td>
                        </tr>
                        <tr>
                        <td><b>Alasan</b></td>
                        <td>{{$post->alasan}}</td>
                        </tr>
                        <tr>
                        <td><b>Email</b></td>
                        <td>{{$post->users->email}}</td>
                        </tr>

                      @endforeach
       
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
 @endsection
