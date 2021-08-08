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
                  <form  action="{{route('tambah-post')}}" method="POST" enctype="multipart/form-data">
                  @csrf

                    <div class="box-body">
                      <div class="form-group">
                        <label for="judul">Title</label>
                        <input type="text" placeholder="Enter Title here" name="judul" id="judul" class="form-control">
                        @error('judul')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="excerpt">Excerpt</label>
                        <textarea name="excerpt" id="excerpt" rows="5" class="form-control"></textarea>
                        @error('excerpt')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" rows="10" class="form-control"></textarea>
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
                      <h3 class="box-title">Publish</h3>
                  </div>
                  <div class="box-body">
                      <div class="form-group">
                        <label for="created_at">Publish date</label>
                        <input for="created_at" type="text" class="form-control"  value="{{date('Y-m-d H:i:s')}}" disabled>
                      </div>
                  </div>

              </div>
              <div class="box">
                  <div class="box-header with-border">
                      <h3 class="box-title">Kategori</h3>
                  </div>
                  <div class="box-body">
                  <select class="form-control" id="kategori" name="kategori">
                      <option selected disabled>Pilih Kategori</option> 
                      @foreach($kategoris as $kat)
                             <option value="{{$kat->id}}">{{$kat->nama}}</option>
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
                            <div id="pratinjauGambar">
                        </div>
                        </div>
                            <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                            <input type="file" name="gambar" id="gambar" onchange="return validasiFile()">
                            </span>
                            <button type="button" class="btn btn-default fileinput-exists" data-dismiss="fileinput" onclick="hapusGambar()">Remove</button>
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
 @include('layout_crud.validasigambar')
 @endsection