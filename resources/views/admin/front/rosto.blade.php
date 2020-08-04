<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sistem</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900|Oswald:400,700" rel="stylesheet">

    
    
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mediaelementplayer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-reboot.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-grid.css') }}" rel="stylesheet">

    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/mediaelement-and-player.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('js/typed.js') }}"></script>


    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/fancybox.min.css">

    <link rel="stylesheet" href="css/style.css">

  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="200">
  

  <div class="site-wrap">

  <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>

  <header class="header-bar d-flex d-lg-block align-items-center site-navbar-target" data-aos="fade-right">
    <div class="site-logo">
      <a href="index.html">Menu</a>
    </div>
    
    <div class="d-inline-block d-lg-none ml-md-0 ml-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

    <div class="main-menu">
      <ul class="js-clone-nav">
        <li><a href="#section-home" class="nav-link">Home</a></li>
        <li><a href="#section-photos" class="nav-link">Fotos</a></li>
        <li><a href="#section-bio" class="nav-link">Sobre</a></li>
        <li><a href="#section-blog" class="nav-link">Promoções</a></li>
      </ul>
      <ul class="social js-clone-nav">
        <li><a href="#"><span class="icon-facebook"></span></a></li>
        <li><a href="#"><span class="icon-twitter"></span></a></li>
        <li><a href="#"><span class="icon-instagram"></span></a></li>
      </ul>
    </div>
  </header> 

  <main class="main-content">
    <section class="site-section-hero bg-image"  data-stellar-background-ratio="0.5" id="section-home">
        <div class="row justify-content-center align-items-center">
          <div class="col-md-7 text-center">
          <h1 class="text-white heading text-uppercase" data-aos="fade-up">{{!!$welcome->text_welcome_title!!}}</h1>
          <p class="lead text-white mb-5" data-aos="fade-up" data-aos-delay="100">{{$welcome->text_welcome}}</p>
            <p data-aos="fade-up" data-aos-delay="100"><a href="#section-contact" class="btn btn-primary btn-md smoothscroll">Contato</a></p>
          </div>
        </div>
      </section>

    <div class="container-fluid">
        
      <section class="row align-items-stretch photos" id="section-photos">
        <div class="col-12">
        <div class="row align-items-stretch">
          @foreach($photos as $photo)
        <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up">
          <a href="/storage/{{ $photo->photos_page }}" class="d-block photo-item" data-fancybox="gallery">
            <img src="/storage/{{ $photo->photos_page }}" alt="Image" class="img-fluid">
            <div class="photo-text-more">
              <span class="icon icon-search"></span>
            </div>
          </a>
        </div>
        @endforeach
      </div>
        
    </div>
      
      <section class="site-section" style="10" id="section-bio">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <h2 class="heading text-uppercase text-white">Bibliografia</h2>
              <figure class="mb-5" data-aos="fade-up"><img src="/storage/{{ $bibliography->img_profile }}" alt="Image" class="img-fluid w-50 rounded"></figure>
              <div data-aos="fade-up"  data-aos-delay="100">
              <h2 class="text-white">{{$bibliography->name_perfil}}</h2>
              <p style="word-wrap: break-word;">{{$bibliography->text_perfil}} </p>
              </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="site-section" id="section-blog">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="row">
                <h2 class="heading text-uppercase text-white"  data-aos="fade-up">Promoções</h2>
                @foreach($posts as $post)
                <div class="col-md-12 mb-4" data-aos="fade-up">
                  <div class="d-md-flex d-block blog-entry align-items-start">
                    <div class="mr-0 mr-md-5 mb-3 img-wrap"><a href="single.html"><img src="/storage/{{ $post->arquivo }}" alt="Image" class="img-fluid"></a></div>
                    <div>
                      <h2 class="mt-0 mb-2"><a href="single.html">{{ $post->desciption_promotion }}</a></h2>
                    </div>
                  </div>
                </div>
                @endforeach
          </div>
        </div>
      </section>

      <div class="row justify-content-center">
        <div class="col-md-12 text-center py-5">
          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
      </div>
    </div>
  </main>

</div> <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>