<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Jogja Travel - Regna emplate</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{asset('user/images/favicon.png')}}" rel="icon">
  <link href="{{asset('user/images/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{asset('user/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{asset('user/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('user/lib/animate/animate.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{asset('user/css/style.css')}}" rel="stylesheet">

  @yield('header')


</head>

<body>

  @php
        $url = request()->segment(1);
  @endphp

  <!--========================== Header ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="#hero">
          <img src="{{asset('user/images/icon.png')}}" style="margin-right:5px"/></img>
          <h2 class="d-inline text-light">Jogja-Travel</h2>
        </a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="{{$url=='home'?'menu-active':''}}"><a href="{{url('home')}}">Home</a></li>
          <li class="{{$url=='blog'?'menu-active':''}}"><a href="{{url('blog')}}">Blog</a></li>
          <li class="{{$url=='destination'?'menu-active':''}}"><a href="{{url('destination')}}">Destination</a></li>
          <li class="{{$url=='contact'?'menu-active':''}}"><a href="{{url('contact')}}">Contact </a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--========================== Hero Section ============================-->
  <section id="hero">
    <div class="hero-container">
      @yield('hero')
    </div>
  </section>

  <main id="main">

    @yield('content')

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Regna</strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{asset('user/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('user/lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('user/lib/wow/wow.min.js')}}"></script>

  <script src="{{asset('user/lib/superfish/superfish.min.js')}}"></script>

  <!-- Contact Form JavaScript File -->
  {{-- <script src="{{asset('user/contactform/contactform.js')}}"></script> --}}

  <!-- Template Main Javascript File -->
  <script src="{{asset('user/js/main.js')}}"></script>

</body>
</html>
