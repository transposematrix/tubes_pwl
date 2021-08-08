@extends('layout.main')
@section('tampilan')
<section class="hero-wrap hero-wrap-2" style="background-image: url('../template/images/cat-header.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Hasil Pencarian</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row d-flex">
            @foreach($hasil as $a)
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="{{route('post.show', $a->id)}}" class="block-20 rounded" style="background-image: url('../images/{{$a->gambar}}');">
              </a>
              <div class="text p-4">
              	<div class="meta mb-2">
                  <div><a href="#">{{$a->created_at}}</a></div>
                  <div><a href="#">{{$a->users->name}}</a></div>
                  <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                </div>
               <a href="{{route('post.show', $a->id)}}"><h5 class="card-title light-300 text-dark">{{$a->judul}}</h5></a>
                  <p class="card-text light-300 text-dark">
                      {{$a->excerpt}}
                  </p>
              </div>
            </div>
          </div>
          @endforeach
  
        </div>
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
            {{ $hasil->links() }}

            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection
