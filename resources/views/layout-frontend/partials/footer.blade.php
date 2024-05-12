  <style>
    #footer{
        background-image: linear-gradient(310deg,#17ad37,#17ad37)
    }
  </style>
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content">
      <div class="container">

        <div class="row g-5">
          <div class="col-lg-4">
            <h3 class="footer-heading">Tentang Sipapah KosaBangsa</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ab, perspiciatis beatae autem deleniti voluptate nulla a dolores, exercitationem eveniet libero laudantium recusandae officiis qui aliquid blanditiis omnis quae. Explicabo?</p>
          </div>
          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">Navigation</h3>
            <ul class="footer-links list-unstyled">
              <li><a href="{{ route('/') }}"><i class="bi bi-chevron-right"></i> Beranda</a></li>
              <li><a href="{{ route('sampah') }}"><i class="bi bi-chevron-right"></i> Data Sampah</a></li>
              <li><a href="{{ route('kegiatan') }}"><i class="bi bi-chevron-right"></i> Kegiatan</a></li>
              <li><a href="{{ route('kegiatan') }}"><i class="bi bi-chevron-right"></i> Berita</a></li>
              <li><a href=""><i class="bi bi-chevron-right"></i> Produk</a></li>
              <li><a href="{{ route('dokumentasi') }}"><i class="bi bi-chevron-right"></i> Dokumentasi</a></li>
            </ul>
          </div>
         
          <div class="col-lg-4">

             <img src="{{asset('assets/logo-sipapah.png')}}" alt="" style="max-width: 100px">

          </div>
        </div>
      </div>
    </div>

    <div class="footer-legal">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
            <div class="copyright">
              © Copyright <strong><span>Sipapah KosaBangsa</span></strong>. All Rights Reserved
            </div>

            <div class="credits">
              Development by <a href="https://bootstrapmade.com/">JDEVA Production</a>
            </div>

          </div>

          <div class="col-md-6">
            <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

        </div>

      </div>
    </div>

  </footer>