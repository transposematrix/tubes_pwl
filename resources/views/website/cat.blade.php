@extends('layout.main')
@section('tampilan')
<br><br>
<div class="container">
  <div class="row">
    <div class="col ftco-animate">
    <img src="{{asset('images/'. $posts->gambar)}}">
    </div>
    <div class="col ftco-animate">
    <article class="card-body p-4">
	<h3 class="title mb-3">{{$posts->judul}}</h3>
<dl class="item-property">
  <dt>Deskripsi</dt>
  <dd><p>{{$posts->excerpt}}</p></dd>
</dl>
<dl class="param param-feature">
  <dd>{!! $posts->content !!}</dd>
</dl>  <!-- item-property-hor .// -->
<dl class="param param-feature">
@if (Auth::check())
  <dt><a href="#" data-toggle="modal" data-target="#exampleModal"> >>Adopsi {{$posts->judul}}</a></dt>
@else
<dt><a href="{{ route('login') }}"> >>Login Untuk Adopsi {{$posts->judul}}</a></dt>
@endif
</dl>  <!-- item-property-hor .// -->
    </div>
  </div>
  <br>
  <br>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulir Adopsi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('cat.adopt.store', $posts)}}" method="POST" class="p-5 bg-light">
        {{ csrf_field() }} 
        <input type="hidden" name="post_id" id="post_id" value="{{ $posts->id }}" />
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Lengkap:</label>
            <input type="text" name="nama" class="form-control" id="recipient-name">
            @error('nama')
            <small class="text-danger">{{$message}}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Usia</label>
            <input type="text" name="usia" class="form-control" id="recipient-name">
            @error('usia')
            <small class="text-danger">{{$message}}</small>
            @enderror          
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Alamat:</label>
            <textarea class="form-control" name="alamat" id="message-text"></textarea>
            @error('alamat')
            <small class="text-danger">{{$message}}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Mengapa Anda ingin Mengadopsi?</label>
            <textarea class="form-control" name="alasan" id="message-text"></textarea>
            @error('alasan')
            <small class="text-danger">{{$message}}</small>
            @enderror
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send message</button>
      </div>
      </form>
    </div>
  </div>
</div>
@include('sweetalert::alert')

@endsection