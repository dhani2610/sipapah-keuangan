@extends('layout-frontend.app')

@section('style')
<style>

.content-wrapper {
  margin: 0 auto;
  max-width: 1200px;
  display: flex;
  flex-flow: row wrap;
  justify-content: center;
  padding: 0.5rem;
}

.news-card {
  border: 0px solid aqua;
  margin: 0.5rem;
  position: relative;
  height: 12rem;
  overflow: hidden;
  border-radius: 0.5rem;
  flex: 1;
  min-width: 290px;
  box-shadow: 0 0 1rem rgba(0, 0, 0, 0.5);
  -webkit-backface-visibility: hidden;
  -moz-backface-visibility: hidden;
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
}

@media (min-width: 900px) {

.news-card {
    height: 20rem
}
  }

.news-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0) linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.7) 80%);;
      z-index: 0;
    }

.news-card__card-link {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
/*     background: rgba(255,0,0,.5); */
  }

.news-card__image {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: cover;
    transition: transform 3s ease;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    position: relative;
    z-index: -1;
  }

.news-card__text-wrapper {
    position: absolute;
    bottom: 0rem;
    padding: 1rem;
    color: white;
    width: 100%;
/*     background-color: rgba(0, 0, 0, 0.4); */
    transition: background-color 1.5s ease;
  }

.news-card__title {
    transition: color 1s ease;
    margin-bottom: .5rem;
  }

.news-card__post-date {
    font-size: .7rem;
    margin-bottom: .5rem;
    color: #CCC;
  }

.news-card__details-wrapper {
    max-height: 0;
    opacity: 0;
    transition: max-height 1.5s ease, opacity 1s ease;
  }

@media (min-width: 900px) {
    .news-card:hover .news-card__details-wrapper {
      max-height: 20rem;
      opacity: 1;
    }
    .news-card:hover .news-card__text-wrapper {
      background-color: linear-gradient(310deg,#17ad37,#17ad37);
    }
    .news-card:hover .news-card__title {
      color: linear-gradient(310deg,#17ad37,#17ad37);
    }
    .news-card:hover .news-card__image {
      transform: scale(1.2);
      z-index: -1;
    }
  }

.news-card__excerpt {
    font-weight: 300;
  }

.news-card__read-more {
    background: black;
    color: #bbb;
    display: block;
    padding: 0.4rem 0.6rem;
    border-radius: 0.3rem;
    margin-top: 1rem;
    border: 1px solid #444;
    font-size: 0.8rem;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    text-decoration: none;
    width: 7rem;
    margin-left: auto;
    position: relative;
    z-index: 5;
    font-weight: 900
  }
.news-card__read-more:hover a {
  color: white
}
.news-card__read-more:hover {
  background: linear-gradient(310deg,#17ad37,#17ad37) !important
}

.news-card__read-more i {
      position: relative;
      left: 0.2rem;
      color: #888;
      transition: left 0.5s ease, color 0.6s ease;
      -webkit-backface-visibility: hidden;
      backface-visibility: hidden;
    }

.news-card__read-more:hover i {
      left: 0.5rem;
      color: white;
    }

</style>
@endsection

@section('content-fe')
<div class="container">
    <br>

    <div class="row">
        <div class="section-header text-center">
          <h2 class="fw-bold fs-1" style="color: black">
            Berita 
            {{-- <span class="b-class-secondary">Advertiser </span>Services --}}
          </h2>
          <p class="sec-icon"><i class="fa-solid fa-gear"></i></p>
        </div>
      </div>
      <br>
      <div class="content-wrapper">
  
        @foreach ($berita as $item)     
        <div class="news-card">
          <a href="{{ route('show-berita',$item->id) }}" class="news-card__card-link"></a>
          <img src="{{ asset('assets/img/cover/'.$item->cover) }}" alt="" class="news-card__image">
          {{-- <img src="https://images.pexels.com/photos/127513/pexels-photo-127513.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" alt="" class="news-card__image"> --}}
          <div class="news-card__text-wrapper">
            <h2 class="news-card__title">{{ $item->judul_berita }}</h2>
            <div class="news-card__post-date">{{ $item->tanggal_berita }}</div>
            <div class="news-card__details-wrapper">
              <a href="{{ route('show-berita',$item->id) }}" class="news-card__read-more">Read more <i class="fas fa-long-arrow-alt-right"></i></a>
            </div>
          </div>
        </div>
        @endforeach
      
      </div>
    <br>

</div>

@endsection

@section('script')
<script>
/* Demo purposes only */
$(".hover").mouseleave(
  function () {
    $(this).removeClass("hover");
  }
);

</script>
@endsection
