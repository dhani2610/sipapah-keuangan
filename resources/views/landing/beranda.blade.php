@extends('layout-frontend.app')

@section('style')
<style>


</style>
@endsection

@section('content-fe')
   <!-- ======= Hero Slider Section ======= -->
   <section id="hero-slider" class="hero-slider">
    <div class="container-md" data-aos="fade-in">
      <div class="row">
        <div class="col-12">
          <div class="swiper sliderFeaturedPosts">
            <div class="swiper-wrapper">

                @foreach ($banner as $item)
                <div class="swiper-slide">
                  <a href="single-post.html" class="img-bg d-flex align-items-end" style="background-image: url('assets/img/foto_banner/{{$item->foto_banner}}');">
                    <div class="img-bg-inner">
                      <h2>Selamat Datang</h2>
                      <p>Sipapah
                        Kosa Bangsa.</p>
                    </div>
                  </a>
                </div>
                @endforeach

            </div>
            <div class="custom-swiper-button-next">
              <span class="bi-chevron-right"></span>
            </div>
            <div class="custom-swiper-button-prev">
              <span class="bi-chevron-left"></span>
            </div>

            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Hero Slider Section -->

  <section>
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-12 text-center mb-5">
          <h1 class="page-title">Tentang Kami</h1>
        </div>
      </div>

      <div class="row mb-5">

        <div class="d-md-flex post-entry-2 half">
          <a href="#" class="me-4 thumbnail">
            <img src="assets-fe/img/post-landscape-2.jpg" alt="" class="img-fluid">
          </a>
          <div class="ps-md-5 mt-4 mt-md-0">
            <div class="post-meta mt-4">Tentang Kami</div>
            <h2 class="mb-4 display-4">Sipapah Kota Bangsa</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, perspiciatis repellat maxime, adipisci non ipsam at itaque rerum vitae, necessitatibus nulla animi expedita cumque provident inventore? Voluptatum in tempora earum deleniti, culpa odit veniam, ea reiciendis sunt ullam temporibus aut!</p>
            <p>Fugit eaque illum blanditiis, quo exercitationem maiores autem laudantium unde excepturi dolores quasi eos vero harum ipsa quam laborum illo aut facere voluptates aliquam adipisci sapiente beatae ullam. Tempora culpa iusto illum accusantium cum hic quisquam dolor placeat officiis eligendi.</p>
          </div>
        </div>

        <div class="d-md-flex post-entry-2 half mt-5">
          <a href="#" class="me-4 thumbnail order-2">
            <img src="assets/img/post-landscape-1.jpg" alt="" class="img-fluid">
          </a>
          <div class="pe-md-5 mt-4 mt-md-0">
            <div class="post-meta mt-4">Mission &amp; Vision</div>
            <h2 class="mb-4 display-4">Mission &amp; Vision</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, perspiciatis repellat maxime, adipisci non ipsam at itaque rerum vitae, necessitatibus nulla animi expedita cumque provident inventore? Voluptatum in tempora earum deleniti, culpa odit veniam, ea reiciendis sunt ullam temporibus aut!</p>
            <p>Fugit eaque illum blanditiis, quo exercitationem maiores autem laudantium unde excepturi dolores quasi eos vero harum ipsa quam laborum illo aut facere voluptates aliquam adipisci sapiente beatae ullam. Tempora culpa iusto illum accusantium cum hic quisquam dolor placeat officiis eligendi.</p>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- ======= Post Grid Section ======= -->
  <section id="posts" class="posts">
    <div class="container" data-aos="fade-up">
      <div class="row g-5">
        <div class="col-lg-4">
          <div class="post-entry-1 lg">
            <a href="#"><img src="{{ asset('assets/img/foto_kegiatan/'.$kegiatan->foto_kegiatan) }}" alt="" class="img-fluid"></a>
            <div class="post-meta"><span class="date">Kegiatan</span> <span class="mx-1">&bullet;</span> <span>{{ $kegiatan->tanggal_kegiatan }}</span></div>
            <h2><a href="#">{{ $kegiatan->nama_kegiatan }}</a></h2>
            <p class="mb-4 d-block">{{ Illuminate\Support\Str::limit($kegiatan->deskripsi_kegiatan, 400) }}</p>

            <div class="d-flex align-items-center author">
                @php
                    $kegiatanuser = \App\Models\User::where('id',$kegiatan->created_by)->first();
                @endphp
                @if ($kegiatanuser->foto != null)
                <div class="photo"><img src="{{ asset('assets/img/foto_user/'. $kegiatanuser->foto) }}" alt="" class="img-fluid"></div>
                @else
                <div class="photo"><img src="{{asset('assets/img/blank-logo.png')}}" alt="" class="img-fluid"></div>
                @endif
              <div class="name">
              
                <h3 class="m-0 p-0">{{ $kegiatanuser->name ?? '-' }}</h3>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-8">
          <div class="row g-5">
            <div class="col-lg-4 border-start custom-border">
                @foreach($column1 as $item1)
                <div class="post-entry-1">
                  <a href="{{ route('show-berita',$item1['id']) }}"><img src="{{ asset('assets/img/cover/'.$item1['cover']) }}" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date">Berita</span> <span class="mx-1">&bullet;</span> <span>{{ $item1['tanggal_berita'] }}</span></div>
                  <h2><a href="{{ route('show-berita',$item1['id']) }}">{{ $item1['judul_berita'] }}</a></h2>
                </div>
                @endforeach
            </div>
            <div class="col-lg-4 border-start custom-border">
                @foreach($column2 as $item2)
                <div class="post-entry-1">
                  <a href="{{ route('show-berita',$item2['id']) }}"><img src="{{ asset('assets/img/cover/'.$item2['cover']) }}" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date">Berita</span> <span class="mx-1">&bullet;</span> <span>{{ $item2['tanggal_berita'] }}</span></div>
                  <h2><a href="{{ route('show-berita',$item2['id']) }}">{{ $item2['judul_berita'] }}</a></h2>
                </div>
                @endforeach
            
            </div>

            <!-- Trending Section -->
            <div class="col-lg-4">

              <div class="trending">
                <h3>Pengurus</h3>
 
              </div>

            </div> <!-- End Trending Section -->
          </div>
        </div>

      </div> <!-- End .row -->
    </div>
  </section> <!-- End Post Grid Section -->

@endsection

@section('script')

@endsection
