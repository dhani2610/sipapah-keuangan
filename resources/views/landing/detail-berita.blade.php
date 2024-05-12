@extends('layout-frontend.app')

@section('style')

@endsection

@section('content-fe')
<section class="single-post-content">
    <div class="container">
      <div class="row">
        <div class="col-md-9 post-content" data-aos="fade-up">

          <!-- ======= Single Post Content ======= -->
          <div class="single-post">
            <div class="post-meta"><span class="date">Berita</span> <span class="mx-1">&bullet;</span> <span>{{ $berita->tanggal_berita }}</span></div>
            <h1 class="mb-5">{{ $berita->judul_berita }}</h1>
            <img src="{{ asset('assets/img/cover/'.$berita->cover) }}" alt="" class="img-fluid">

            {!!  $berita->content !!}


            
          </div><!-- End Single Post Content -->

        </div>
        <div class="col-md-3">
          <!-- ======= Sidebar ======= -->
          <div class="aside-block">

            <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="true">LATEST BERITA</button>
              </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">

              <!-- Popular -->
              <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                @foreach ($latest as $itemLat)
                <div class="post-entry-1 border-bottom shadow-sm" style="padding:10px;border-radius:10px">
                  <div class="post-meta"><span class="date">Berita</span> <span class="mx-1">&bullet;</span> <span>{{ $itemLat->tanggal_berita }}</span></div>
                  <h2 class="mb-2"><a href="{{ route('show-berita',$itemLat->id) }}">{{$itemLat->judul_berita}}</a></h2>
                  @php
                        $author = \App\Models\User::where('id',$itemLat->created_by)->first();
                    @endphp
                  <span class="author mb-3 d-block">{{$author->name ?? '-'}}</span>
                </div>
                @endforeach
              </div> <!-- End Popular -->

            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
@endsection

@section('script')

@endsection
