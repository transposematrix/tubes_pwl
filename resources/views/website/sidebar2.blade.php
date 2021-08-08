<div class="sidebar-box ftco-animate">
              <h3>Artikel Lainnya</h3>
              @foreach($article as $art)
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url({{ URL::asset('images/'. $art->gambar) }})"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">{{$art->judul}}</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> {{$art->created_at}}</a></div>
                    <div><a href="#"><span class="icon-person"></span>{{$art->users->name}}</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              @endforeach

            </div>
