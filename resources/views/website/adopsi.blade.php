@extends('layout.main')
@section('tampilan')
@include('layout.banneradopsi')

    <section class="ftco-section">
			<div class="container">
				<div class="row">
            @foreach($posts as $post)
          <div class="col-md-4 ftco-animate">
            <div class="work mb-4 img d-flex align-items-end" style="background-image: url({{ URL::asset('images/'. $post->gambar) }})">
            	<a href="/cat/{{$post->id}}"class="icon  d-flex justify-content-center align-items-center">
	    					<span class="fa fa-expand"></span>
	    				</a>
            	<div class="desc w-100 px-4">
	              <div class="text w-100 mb-3">
	              	<span>Cat</span>
	              	<h2><a href="/cat/{{$post->id}}">{{$post->judul}}</a></h2>
	              </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
            {{ $posts->links() }}
            </div>
          </div>
        </div>
			</div>
		</section>
        @endsection