<!DOCTYPE html>
<html lang="en">

<head>
  @include('layout-frontend.partials.head')

</head>

<body>
    @include('layout-frontend.partials.navbar')

  <main id="main">

    @yield('content-fe')
    
  </main><!-- End #main -->

  @include('layout-frontend.partials.footer')

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  @include('layout-frontend.partials.foot')

</body>

</html>