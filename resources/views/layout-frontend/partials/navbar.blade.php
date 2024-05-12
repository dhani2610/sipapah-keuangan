<style>
#header{
  background-image: linear-gradient(310deg,#17ad37,#17ad37);
}
.white-text{
  color: black!important;
}
</style>
  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{ route('/') }}" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
         <img src="{{asset('assets/logo-sipapah.png')}}" alt="">
        {{-- <h1>Sipapah KosaBangsa</h1> --}}
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="white-text" href="{{ route('/') }}">Beranda</a></li>
          <li><a class="white-text" href="{{ route('sampah') }}">Data Sampah</a></li>
          <li><a class="white-text" href="{{ route('kegiatan') }}">Kegiatan</a></li>
          <li><a class="white-text" href="{{ route('berita') }}">Berita</a></li>
          <li><a class="white-text" href="contact.html">Produk</a></li>
          <li><a class="white-text" href="{{ route('dokumentasi') }}">Dokumentasi</a></li>
          @if (Auth::check())
          <li><a class="white-text" href="{{ route('dashboard') }}">Dashboard</a></li>
          <li><a class="white-text" href="{{ url('logout') }}">Logout</a></li>
          @else
          <li><a class="white-text" href="{{ url('login') }}">|Login</a></li>
          @endif
        </ul>
      </nav><!-- .navbar -->

      <div class="position-relative">
       

        <a href="#" class="mx-2 js-search-open"></a>
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
          <form action="search-result.html" class="search-form">
            <span class="icon bi-search"></span>
            <input type="text" placeholder="Search" class="form-control">
            <button class="btn js-search-close"><span class="bi-x"></span></button>
          </form>
        </div><!-- End Search Form -->

      </div>

    </div>

  </header><!-- End Header -->
