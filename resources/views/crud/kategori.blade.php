@extends('layouts.backend.main')
@section('content')
  <!-- Left side column. contains the logo and sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Posts
        <small>All Blog Posts</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> <a href="{{route('home')}}">Dashboard</a></li>
        <li class="active">Posts</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="pull-left">
                        <a id="add-button" title="Add New" class="btn btn-success" href="{{route('new')}}"><i class="fa fa-plus-circle"></i> Add New</a>
                    </div>
                    <div class="pull-right">
                    <form accept-charset="utf-8" action="/cari" method="GET" class="form-inline" id="form-filter" >
                        @method('PUT')    
                        <div class="input-group">
                                <input type="text" name="cari" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search...">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default search-btn" type="submit"><i class="fa fa-search"></i></button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive">
                <table class="table table-bordered table-condesed">
                  <thead>
                      <tr>
                        <th>Action</th>
                        <th>Title</th>
                        <th>Thumbnail</th>
                        <th>Kategori</th>
                        <th>Date</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach($posts as $post)
                      <tr>
                        <td width="100">
                        @if(($post->kategori_id) == 2)
                        <a title="Read" class="btn btn-xs btn-default edit-row" href="/cat/{{$post->id}}">
                                <i class="fa fa-eye"></i>
                            </a>
                            @else
                            <a title="Read" class="btn btn-xs btn-default edit-row" href="{{route('post.show', $post->id)}}">
                                <i class="fa fa-eye"></i>
                            </a>
                            @endif
                            <a title="Update" class="btn btn-xs btn-default edit-row" href="{{route('post.edit', $post->id)}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a title="Delete" class="btn btn-xs btn-danger delete-confirm"  href="/post/hapus/{{$post->id}}" >
 
                                <i class="fa fa-times"></i>
                            </a>
                        </td>
                        <td>{{$post->judul}}</td>
                        <td><img src="{{asset('images/'. $post->gambar)}}" height="75" width="75"></td>
                        <td>{{$post->kategoris->nama}}</td>
                        <td><abbr title="{{$post->created_at}}">{{$post->created_at}}</abbr></td>
                      </tr>
                      @endforeach
       
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-left">
                  {{ $posts->links() }}
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