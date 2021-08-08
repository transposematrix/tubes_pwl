@extends('layout/main')
@section('tampilan')

<div class="hero-wrap js-fullheight" style="background-image: url('../template/images/catss.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-11 ftco-animate text-center">
          	<h1 class="mb-4">Kucing Jalanan Butuh Bantuanmu </h1>
            <h3 style="color: white;" class="mb-4">Ayo Beraksi Nyata Untuk Mereka!</h3>
          </div>
        </div>
      </div>
    </div>
<section class="ftco-section bg-light ftco-no-pt ftco-intro">
    
    	<div class="container">
    		<div class="row">
          <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
            <div class="d-block services active text-center">
              <div class="media-body">
                <h3 class="heading">ADOPSI</h3>
                <p>Anda dapat menolong dengan mengadopsi setidaknya satu kucing jalanan. 
					Kami membutuhkan keluarga yang mampu menjadi pemelihara yang amanah dan bertanggung jawab,
					 khususnya untuk kucing yang berkebutuhan khusus, anak kucing, kucing sakit dan kucing senior.</p>
                <a href="/adopsi" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
              </div>
            </div>      
          </div>
          <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
            <div class="d-block services text-center">
              <div class="media-body">
                <h3 class="heading">EDUKASI</h3>
                <p>Anda dapat mempelajari informasi bermanfaat agar  lebih memahami cara menolong kucing jalanan
					 dan menjadi pemelihara yang bertanggung jawab.
					  Kami menyediakan beragam artikal edukasi untuk Anda</p>
                <a href="/ed/3" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
              </div>
            </div>    
          </div>
          <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
            <div class="d-block services text-center">
              <div class="media-body">
                <h3 class="heading">ARTIKEL</h3>
                <p>Anda dapat membaca kisah kami dan juga kisah kucing-kucing jalanan yang perlu banyak bantuan.
					Sekiranya kisah tersebut dapat membantu Anda untuk lebih mengenali kucing-kucing yang ada di Paw Rescue.
				</p>
                <a href="/article/1" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
              </div>
            </div>      
          </div>
        </div>
    	</div>
    </section>


		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Adopsi</h2>
          </div>
        </div>
				<div class="row">
			@foreach($adopt as $ad)
          <div class="col-md-4 ftco-animate">
            <div class="work mb-4 img d-flex align-items-end" style="background-image: url(../images/{{$ad->gambar}});">
            	<a href="/cat/{{$ad->id}}" class="icon d-flex justify-content-center align-items-center">
	    					<span class="fa fa-expand"></span>
	    				</a>
            	<div class="desc w-100 px-4">
	              <div class="text w-100 mb-3">
	              	<span>Cat</span>
	              	<h2><a href="work-single.html">{{$ad->judul}}</a></h2>
	              </div>
              </div>
            </div>
          </div>
		  @endforeach

        </div>
			</div>
		</section>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Latest Article from our blog</h2>
          </div>
        </div>
        <div class="row d-flex">
		@foreach($article as $art)
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="{{route('post.show', $art->id)}}" class="block-20 rounded" style="background-image: url('../images/{{$art->gambar}}');">
              </a>
              <div class="text p-4">
              	<div class="meta mb-2">
                  <div><a href="#">{{$art->created_at}}</a></div>
                  <div><a href="#">{{$art->users->name}}</a></div>
                </div>
                <h3 class="heading"><a href="#">{{$art->judul}}</a></h3>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Latest Education from our blog</h2>
          </div>
        </div>
        <div class="row d-flex">
		@foreach($education as $ed)
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="{{route('post.show', $ed->id)}}" class="block-20 rounded" style="background-image: url('../images/{{$ed->gambar}}');">
              </a>
              <div class="text p-4">
              	<div class="meta mb-2">
                  <div><a href="#">{{$ed->created_at}}</a></div>
                  <div><a href="#">{{$ed->users->name}}</a></div>
                </div>
                <h3 class="heading"><a href="#">{{$ed->judul}}</a></h3>
              </div>
            </div>
          </div>
		@endforeach

        </div>
      </div>
    </section>

@endsection


 