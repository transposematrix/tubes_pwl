@extends('layouts.backend.main')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Post
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Post</a></li>
        <li class="active">Add New Post</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-9">
              <div class="box">
                  <!-- form start -->
                  <form  action="/post/update/{{$posts->id}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                    <div class="box-body">
                      <div class="form-group">
                        <label for="judul">Title</label>
                        <input type="text" placeholder="Enter Title here" name="judul" id="judul" value="{{$posts->judul}}" class="form-control">
                        @error('judul')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="excerpt">Excerpt</label>
                        <textarea name="excerpt" id="excerpt" rows="5" class="form-control">{{$posts->excerpt}}</textarea>
                        @error('excerpt')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" rows="10" class="form-control">{{$posts->content}}</textarea>
                        @error('content')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
          </div>
          <div class="col-md-3">
              <div class="box">
                  <div class="box-header with-border">
                      <h3 class="box-title">Update</h3>
                  </div>
                  <div class="box-body">
                      <div class="form-group">
                        <label for="updated_at">Update date</label>
                        <input for="updated_at" type="text" class="form-control"  value="{{date('Y-m-d H:i:s')}}" disabled>
                      </div>
                  </div>

              </div>
              <div class="box">
                  <div class="box-header with-border">
                      <h3 class="box-title">Kategori</h3>
                  </div>
                  <div class="box-body">
                  <select class="form-control" id="kategori" name="kategori">
                      @foreach($kategoris as $kat)
                      <option value="{{$kat['id']}}"  {{ $posts['kategori_id'] == $kat['id'] ? 'selected="selected"' : '' }}>{{$kat['nama']}}</option>
                            @endforeach 
                                </select>
                         @error('kategori')
                        <small class="text-danger">{{$message}}</small>
                        @enderror

                  </div>
              </div>
              <div class="box">
                  <div class="box-header with-border">
                      <h3 class="box-title">Thumbnail</h3>
                  </div>
                  <div class="box-body text-center">
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                      <img  width ="100%" height="100%" id="pratinjauGambar" src="{{ url('images/'.$posts->gambar)}}">
                        </div>
                        </div>
                        <div class="text-center">
                            <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                            <input type="file" name="gambar" id="gambar" onchange="return validasiFile()">
                            </span>
                            </div>
                            @error('gambar')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                        </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>
        </form>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('layout_crud.ckeditor')
 @endsection
 @section('aksi')
 <script>
    function validasiFile(){
    var inputFile = document.getElementById('gambar');
    var pathFile = inputFile.value;
    var ekstensiOk = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!ekstensiOk.exec(pathFile)){
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Hanya menerima gambar berekstensi jpg/jpeg/png/gif!',
        })

        inputFile.value = '';
        return false;
    }else{
        //Pratinjau gambar
        if (inputFile.files && inputFile.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('pratinjauGambar').src = e.target.result;
            };
            reader.readAsDataURL(inputFile.files[0]);
        }
    }
}
</script>
 @endsection