@extends('layouts.backend.main')
@section('content')
  <!-- Left side column. contains the logo and sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Adoption
        <small>Adoption List</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> <a href="{{route('home')}}">Dashboard</a></li>
        <li class="active">My Adoption</li>
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
                        <th>Adopsi</th>
                        <th>Thumbnail</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach($adopt as $post)
                      <tr>

                        <td>{{$post->posts->judul}}</td>
                        <td><img src="../images/{{$post->posts->gambar}}" height="75" width="75"></td>
                        @if($post->status_adopt == '1')
                        <td>Dikonfirmasi</td>
                        @elseif($post->status_adopt == '2')
                        <td>Ditolak</td>
                        @else
                        <td>Menunggu Konfirmasi</td>
                        @endif
                        <td><abbr title="{{$post->created_at}}">{{$post->created_at}}</abbr></td>
                        <td width="100">
                        @if(($post->status_adopt) == 1)
                        <a href="/post/25" class="btn btn-success">Klik untuk Melanjutkan</a>
                            @elseif(($post->status_adopt) == 2)
                            <a disabled href="#" class="btn btn-danger">Ditolak</a>
                            @else
                            <a disabled href="#" class="btn btn-primary">Menunggu Konfirmasi</a>
                            @endif
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
 @section('aksi')
 <script>
    $('.delete-confirm').on('click',function(e){
        e.preventDefault();
        const href=$(this).attr('href')

        Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: "Perubahan tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus!'
        }).then((result) => {
        if (result.value) {
             document.location.href = href;
        }
        })

    })
    </script>
</script>
@endsection