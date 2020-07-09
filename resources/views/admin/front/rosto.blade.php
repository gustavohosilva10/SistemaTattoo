<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sistem</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900|Oswald:400,700" rel="stylesheet">

    
    
    <link href="{{ asset('css/aos.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/magnific-popup.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mediaelementplayer.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-reboot.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-grid.min.css') }}" rel="stylesheet">

    <script src="{{ asset('js/aos.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/mediaelement-and-player.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('js/typed.js') }}"></script>

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

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
            <h1 class="text-white heading text-uppercase" data-aos="fade-up">Welcome</h1>
            <p class="lead text-white mb-5" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore animi accusantium voluptatum saepe. Natus nihil, facere corporis numquam, architecto dolorum.</p>
            <p data-aos="fade-up" data-aos-delay="100"><a href="#section-contact" class="btn btn-primary btn-md smoothscroll">Contact Me</a></p>
          </div>
        </div>
      </section>

    <div class="container-fluid">
        
      <section class="row align-items-stretch photos" id="section-photos">
        <div class="col-12">
        <div class="row align-items-stretch">
        
        <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up">
          <a href="{{$pageprincipal[0]->base64_image1}}" class="d-block photo-item" data-fancybox="gallery">
            <img src="{{$pageprincipal[0]->base64_image1}}" alt="Image" class="img-fluid">
            <div class="photo-text-more">
              <span class="icon icon-search"></span>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <a href="images/img_5.jpg" class="d-block photo-item" data-fancybox="gallery">
            <img src="images/img_5.jpg" alt="Image" class="img-fluid">
            <div class="photo-text-more">
              <span class="icon icon-search"></span>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <a href="images/img_1.jpg" class="d-block photo-item" data-fancybox="gallery">
            <img src="images/img_1.jpg" alt="Image" class="img-fluid">
            <div class="photo-text-more">
              <span class="icon icon-search"></span>
            </div>
          </a>
        </div>

        <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up">
          <a href="images/img_2.jpg" class="d-block photo-item" data-fancybox="gallery">
            <img src="images/img_2.jpg" alt="Image" class="img-fluid">
            <div class="photo-text-more">
              <span class="icon icon-search"></span>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <a href="images/img_3.jpg" class="d-block photo-item" data-fancybox="gallery">
            <img src="images/img_3.jpg" alt="Image" class="img-fluid">
            <div class="photo-text-more">
              <span class="icon icon-search"></span>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <a href="images/img_6.jpg" class="d-block photo-item" data-fancybox="gallery">
            <img src="images/img_6.jpg" alt="Image" class="img-fluid">
            <div class="photo-text-more">
              <span class="icon icon-search"></span>
            </div>
          </a>
        </div>

        <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up">
          <a href="images/img_7.jpg" class="d-block photo-item" data-fancybox="gallery">
            <img src="images/img_7.jpg" alt="Image" class="img-fluid">
            <div class="photo-text-more">
              <span class="icon icon-search"></span>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <a href="images/img_8.jpg" class="d-block photo-item" data-fancybox="gallery">
            <img src="images/img_8.jpg" alt="Image" class="img-fluid">
            <div class="photo-text-more">
              <span class="icon icon-search"></span>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <a href="images/img_9.jpg" class="d-block photo-item" data-fancybox="gallery">
            <img src="images/img_9.jpg" alt="Image" class="img-fluid">
            <div class="photo-text-more">
              <span class="icon icon-search"></span>
            </div>
          </a>
        </div>


        <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up">
          <a href="images/img_10.jpg" class="d-block photo-item" data-fancybox="gallery">
            <img src="images/img_10.jpg" alt="Image" class="img-fluid">
            <div class="photo-text-more">
              <span class="icon icon-search"></span>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <a href="images/img_1.jpg" class="d-block photo-item" data-fancybox="gallery">
            <img src="images/img_1.jpg" alt="Image" class="img-fluid">
            <div class="photo-text-more">
              <span class="icon icon-search"></span>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <a href="images/img_2.jpg" class="d-block photo-item" data-fancybox="gallery">
            <img src="images/img_2.jpg" alt="Image" class="img-fluid">
            <div class="photo-text-more">
              <span class="icon icon-search"></span>
            </div>
          </a>
        </div>

        <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up">
          <a href="images/img_3.jpg" class="d-block photo-item" data-fancybox="gallery">
            <img src="images/img_3.jpg" alt="Image" class="img-fluid">
            <div class="photo-text-more">
              <span class="icon icon-search"></span>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <a href="images/img_4.jpg" class="d-block photo-item" data-fancybox="gallery">
            <img src="images/img_4.jpg" alt="Image" class="img-fluid">
            <div class="photo-text-more">
              <span class="icon icon-search"></span>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <a href="images/img_5.jpg" class="d-block photo-item" data-fancybox="gallery">
            <img src="images/img_5.jpg" alt="Image" class="img-fluid">
            <div class="photo-text-more">
              <span class="icon icon-search"></span>
            </div>
          </a>
        </div>

        <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up">
          <a href="images/img_6.jpg" class="d-block photo-item" data-fancybox="gallery">
            <img src="images/img_6.jpg" alt="Image" class="img-fluid">
            <div class="photo-text-more">
              <span class="icon icon-search"></span>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <a href="images/img_7.jpg" class="d-block photo-item" data-fancybox="gallery">
            <img src="images/img_7.jpg" alt="Image" class="img-fluid">
            <div class="photo-text-more">
              <span class="icon icon-search"></span>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <a href="images/img_8.jpg" class="d-block photo-item" data-fancybox="gallery">
            <img src="images/img_8.jpg" alt="Image" class="img-fluid">
            <div class="photo-text-more">
              <span class="icon icon-search"></span>
            </div>
          </a>
        </div>

        <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <a href="images/img_9.jpg" class="d-block photo-item" data-fancybox="gallery">
            <img src="images/img_9.jpg" alt="Image" class="img-fluid">
            <div class="photo-text-more">
              <span class="icon icon-search"></span>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <a href="images/img_4.jpg" class="d-block photo-item" data-fancybox="gallery">
            <img src="images/img_4.jpg" alt="Image" class="img-fluid">
            <div class="photo-text-more">
              <span class="icon icon-search"></span>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <a href="images/img_5.jpg" class="d-block photo-item" data-fancybox="gallery">
            <img src="images/img_5.jpg" alt="Image" class="img-fluid">
            <div class="photo-text-more">
              <span class="icon icon-search"></span>
            </div>
          </a>
        </div>

        

      </div>
        
    </div>
      
      <section class="site-section darken-bg" id="section-bio">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <h2 class="heading text-uppercase text-white">Biography</h2>
              <figure class="mb-5" data-aos="fade-up"><img src="images/person_3.jpg" alt="Image" class="img-fluid w-50 rounded"></figure>
              <div data-aos="fade-up"  data-aos-delay="100">
              <h2 class="text-white">Hi I'm Jed</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor aperiam a velit. Harum eligendi quod reiciendis quos ullam libero est dolor, <a href="#">corporis dolores assumenda</a>, delectus, quidem voluptatibus dolorum temporibus enim!</p>
              <p>Neque facilis soluta, accusantium quaerat, adipisci porro animi, hic fugiat id vero placeat dolorem accusamus sapiente odio consequatur debitis beatae eius quos alias. In recusandae magnam quis ipsum, asperiores mollitia!</p>
              <h3 class="text-white mt-5">Photographer for 10 years</h3>
              <p>Tempore repudiandae <a href="#">rerum numquam iste</a>, quibusdam omnis voluptates quaerat veniam neque odit sit vel dolores. Optio eveniet ex laborum similique inventore sapiente tenetur. Ipsam aliquam esse voluptate qui reiciendis. Harum.</p>
              <div class="d-block d-md-flex mt-5">
                <div class="mr-md-auto mr-2">
                  <ul class="ul-check list-unstyled success">
                    <li>Optio eveniet ex laborum</li>
                    <li>Inventore sapiente tenetur</li>
                    <li>Ipsam aliquam esse</li>
                  </ul>
                </div>
                <div class="mr-md-auto">
                  <ul class="ul-check list-unstyled success">
                    <li>Optio eveniet ex laborum</li>
                    <li>Inventore sapiente tenetur</li>
                    <li>Ipsam aliquam esse</li>
                  </ul>
                </div>

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
                <h2 class="heading text-uppercase text-white"  data-aos="fade-up">Blog</h2>
                <div class="col-md-12 mb-4" data-aos="fade-up">
                  <div class="d-md-flex d-block blog-entry align-items-start">
                    <div class="mr-0 mr-md-5 mb-3 img-wrap"><a href="single.html"><img src="images/blog_1.jpg" alt="Image" class="img-fluid"></a></div>
                    <div>
                      <h2 class="mt-0 mb-2"><a href="single.html">My New Photography Has Been Featured in Forbes</a></h2>
                      <div class="meta mb-3">Posted by Ben Jones on <a href="#">Jan 18, 2019</a></div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis aliquid doloremque qui, saepe alias eum?</p>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 mb-4" data-aos="fade-up">
                  <div class="d-md-flex d-block blog-entry align-items-start">
                    <div class="mr-0 mr-md-5 mb-3 img-wrap"><a href="single.html"><img src="images/blog_2.jpg" alt="Image" class="img-fluid"></a></div>
                    <div>
                      <h2 class="mt-0 mb-2"><a href="single.html">My New Photography Has Been Featured in Forbes</a></h2>
                      <div class="meta mb-3">Posted by Ben Jones on <a href="#">Jan 18, 2019</a></div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis aliquid doloremque qui, saepe alias eum?</p>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 mb-4" data-aos="fade-up">
                  <div class="d-md-flex d-block blog-entry align-items-start">
                    <div class="mr-0 mr-md-5 mb-3 img-wrap"><a href="single.html"><img src="images/blog_3.jpg" alt="Image" class="img-fluid"></a></div>
                    <div>
                      <h2 class="mt-0 mb-2"><a href="single.html">My New Photography Has Been Featured in Forbes</a></h2>
                      <div class="meta mb-3">Posted by Ben Jones on <a href="#">Jan 18, 2019</a></div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis aliquid doloremque qui, saepe alias eum?</p>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 mb-4" data-aos="fade-up">
                  <div class="d-md-flex d-block blog-entry align-items-start">
                    <div class="mr-0 mr-md-5 mb-3 img-wrap"><a href="single.html"><img src="images/blog_4.jpg" alt="Image" class="img-fluid"></a></div>
                    <div>
                      <h2 class="mt-0 mb-2"><a href="single.html">My New Photography Has Been Featured in Forbes</a></h2>
                      <div class="meta mb-3">Posted by Ben Jones on <a href="#">Jan 18, 2019</a></div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis aliquid doloremque qui, saepe alias eum?</p>
                    </div>
                  </div>
                </div>  
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
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>
  

  <script src="js/jquery.fancybox.min.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>