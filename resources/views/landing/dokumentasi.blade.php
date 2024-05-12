@extends('layout-frontend.app')

@section('style')
<style>
h2 {
  font-size: 2.2em;
}
p {
        font-size: 1.4rem;
        line-height: 160%;
        color: #fff;
      }
/* The flip box container - set the width and height to whatever you want. We have added the border property to demonstrate that the flip itself goes out of the box on hover (remove perspective if you don't want the 3D effect */
.flip-box {
	position: relative;
  display: inline-block;
	margin-right: 1em;
  margin-bottom: 1em;
  background-color: transparent;
  width: 400px;
  height: 300px;
  border: 1px solid #f1f1f1;
  perspective: 1000px; /* Remove this if you don't want the 3D effect */
}

/* This container is needed to position the front and back side */
.flip-box-inner {
  position: relative;
	width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
}

/* Do an horizontal flip when you move the mouse over the flip box container */
.flip-box:hover .flip-box-inner {
  transform: rotateY(180deg);
}

/* Position the front and back side */
.flip-box-front, .flip-box-back {
  position: absolute;
	background-size: cover!important;
  background-position: center!important;
  width: 100%;
  height: 100%;
	border-radius: 10px;
	backface-visibility: hidden;
}

/* Style the front side (fallback if image is missing) */
.flip-box-front {
  background-color: #444;
  color: white;
}

/* Style the back side */
.flip-box-back {
  background-image: linear-gradient(310deg,#17ad37,#17ad37);
  color: white;
  transform: rotateY(180deg);
}
</style>
@endsection

@section('content-fe')
<div class="container">
    <br>
    <div class="row">
        <div class="section-header text-center">
          <h2 class="fw-bold fs-1" style="color: black">
            Dokumentasi 
            {{-- <span class="b-class-secondary">Advertiser </span>Services --}}
          </h2>
          <p class="sec-icon"><i class="fa-solid fa-gear"></i></p>
        </div>
      </div>
      <br>
    @foreach ($dokumentasi as $item)
        <div class="flip-box">
            <div class="flip-box-inner">
            <div class="flip-box-front" style="background-image: url({{ asset('assets/img/foto_dokumentasi/'.$item->foto_dokumentasi) }})">     
            </div>
            <div class="flip-box-back mx-auto">
                <h2>{{ $item->title }}</h2>
                <p>{{ $item->tanggal }}</p>
            </div>
            </div>
        </div>
    @endforeach
</div>

@endsection

@section('script')

@endsection
