@extends('layouts.backend.main')
@section('content')
  <!-- Left side column. contains the logo and sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Adopter Candidates
        <small>Candidate List</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> <a href="{{route('home')}}">Dashboard</a></li>
        <li class="active">Adoption Management</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <!-- /.box-header -->
              <div class="box-body table-responsive">
                <table class="table table-bordered table-condesed">
                  <thead>
                      <tr>
                        <th>Nama Pengaju</th>
                        <th>Nama Kucing</th>
                        <th>Thumbnail</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Lihat Form </th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach($adopt as $post)
                      <tr>

                        <td>{{$post->namalengkap}}</td>
                        <td>{{$post->posts->judul}}</td>
                        <td><img src="../images/{{$post->posts->gambar}}" height="75" width="75"></td>
                        @if($post->status_adopt == '1')
                        <td>Dikonfirmasi</td>
                        @else
                        <td>Menunggu Konfirmasi</td>
                        @endif
                        <td><abbr title="{{$post->created_at}}">{{$post->created_at}}</abbr></td>
                        <td width="100">
                        <a href="/adopt/{{$post->id}}"  class="btn btn-warning">Form </a>
                        <td>
                        {{ method_field('PATCH') }}
                        <a href="/adopt/edit/{{$post->id}}" class="btn btn-success">Terima</a>
                        <a href="/adopt/tolak/{{$post->id}}" class="btn btn-danger">Tolak</a>
                        </td>
                      </tr>
                      @endforeach
       
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-left">
                  {{ $adopt->links() }}
                  </ul>
                </div>
            </div>
            <!-- /.box -->
          </div>
        </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  @include('sweetalert::alert')

 @endsection
