@extends('layout.main')
@section('tampilan')
<section class="hero-wrap hero-wrap-2" style="background-image: url('../template/images/cat-header.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog <i class="ion-ios-arrow-forward"></i></span></p>
            @if(($posts->kategori_id) == 1)
            <h1 class="mb-0 bread">Article</h1>
            @elseif(($posts->kategori_id) == 2)
            <h1 class="mb-0 bread">Adoption</h1>
            @else
            <h1 class="mb-0 bread">Education</h1>
            @endif
          </div>
        </div>
      </div>
    </section>


<section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate">
          	<p>
              <img src="../images/{{$posts->gambar}}" alt="" class="img-fluid">
            </p>
            <b><h2 class="mb-3">{{$posts->judul}}</h2></b>
            <hr>
            {!! $posts->content !!}
            
   <!--        <div class="about-author d-flex p-4 bg-light">
              <div class="bio mr-5">
                <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
              </div>
              <div class="desc">
                <h3>George Washington</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
              </div>
            </div> -->


            <div class="pt-5 mt-5">
              <h3 class="mb-5">Comments</h3>
              <ul class="comment-list">
                @foreach($posts->comment()->get() as $comment)
                <li class="comment">
                  <div class="vcard bio">
                    <img src="../template/images/icon.png" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>{{$comment->name}}</h3>
                    <div class="meta">{{$comment->created_at}}</div>
                    <p>{{$comment->comment}}</p>
                  </div>
                </li>
                @endforeach
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="{{route('post.comment.store', $posts)}}" method="POST" class="p-5 bg-light">
                {{ csrf_field() }} 
                <input type="hidden" name="post_id" id="post_id" value="{{ $posts->id }}" />
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                  </div>

                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input name="email" type="email" class="form-control" id="email" required>
                  </div>
                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div>
            </div>

          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
            <div class="sidebar-box">
              <form action="/singlepost/cari" method="GET" class="search-form">
                <div class="form-group">
                <div class="input-group mb-3">
              <input type="text" name="cari" class="form-control" placeholder="Search">
              <div class="input-group-append">
                <button class="btn btn-success" type="submit">Go</button>  
              </div>
            </div>
              </form>
            </div>
            <div class="sidebar-box ftco-animate">
              <h3>Article</h3>
              @foreach($article as $art)
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url({{ URL::asset('images/'. $art->gambar) }})"></a>
                <div class="text">
                  <h3 class="heading"><a href="{{route('post.show', $art->id)}}">{{$art->judul}}</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> {{$art->created_at}}</a></div>
                    <div><a href="#"><span class="icon-person"></span>{{$art->users->name}}</a></div>
                  </div>
                </div>
              </div>
              @endforeach

            </div>
            <div class="sidebar-box ftco-animate">
              <h3>Education</h3>
              @foreach($education as $ed)
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url({{ URL::asset('images/'. $ed->gambar) }})"></a>
                <div class="text">
                  <h3 class="heading"><a href="{{route('post.show', $ed->id)}}">{{$ed->judul}}</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> {{$ed->created_at}}</a></div>
                    <div><a href="#"><span class="icon-person"></span>{{$ed->users->name}}</a></div>
                  </div>
                </div>
              </div>
              @endforeach

            </div>
            <div class="sidebar-box ftco-animate">
              <h3>Adoption</h3>
              @foreach($adopt as $ad)
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url({{ URL::asset('images/'. $ad->gambar) }})"></a>
                <div class="text">
                  <h3 class="heading"><a href="/cat/{{$ad->id}}">{{$ad->judul}}</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> {{$ad->created_at}}</a></div>
                    <div><a href="#"><span class="icon-person"></span>{{$ad->users->name}}</a></div>
                  </div>
                </div>
              </div>
              @endforeach

            </div>


          </div>

        </div>
      </div>
    </section> <!-- .section -->
    @include('sweetalert::alert')

@endsection
