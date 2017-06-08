<!DOCTYPE html>
<html lang="en" class="home no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    
        <!-- Styles -->
        <link href="/css/frontend.css" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
    </head>
    <body>

  <!-- menu navigation -->
  <header class="header">
    <div class="container">
      <nav class="heading-font">

        <!-- branding -->
        <div class="branding">
          <!-- toggle menu -->
          <button type="button" class="mobile-toggle">
            <span class="ti-menu"></span>
          </button>
          <!-- /toggle menu -->

          <a href="/" class="logo">
                        Digiscripts
                    </a>
        </div>
        <!-- /branding -->

        <!-- links -->
        <div class="navigation spy">
          <ul class="nav">
            <li class="hide">
              <a href="#top"></a>
            </li>
            <li>
              <a href="#how">How it works</a>
            </li>
            <li>
              <a href="#features">Features</a>
            </li>
            <li>
              <a href="#reviews">Reviews</a>
            </li>
            @if (Route::has('login'))
                    @if (Auth::check())
            <li>
                        <a href="{{ url('/admin') }}">Dashboard</a>
            </li>
                    @else
            <li>
                        <a href="{{ url('/auth/login') }}">Login</a>
            </li>
            <li>
                <a href="{{ url('/auth/register') }}" class="nav-btn btn btn-success btn-rounded">Register</a>
            </li>
                    @endif
            @endif
          </ul>
        </div>
        <!-- /links -->
      </nav>
    </div>

  </header>
  <!-- /menu navigation -->

  <!-- hero -->
  <section id="top" class="content-section hero vertical-center">

    <div class="hero-parallax parallax" style="background-image: url(/static/frontend/cover1.jpg);"></div>

    <div class="overlay overlay-colored-9"></div>

    <div class="container">
      <div class="hero-container">
        <h1 class="hero-title"><b>Beautiful and fresh Application Dashboard</b></h1>
        <div class="hero-sub-title">
          <em>The most intuitive and flexible web app on the market</em>
        </div>
        <div class="call-to-action heading-font">
          <a href="#how" class="btn btn-white btn-lg btn-outline smooth-scroll">Learn More</a>
          <a href="http://vimeo.com/61741062" class="btn btn-white btn-lg popup-video">
            <i class="fa fa-play mr10"></i>
            <span>Watch the video</span>
          </a>
        </div>
      </div>
    </div>

  </section>
  <!-- /hero -->

  <!-- how it works section -->
  <section id="how" class="content-section">
    <div class="container">

      <div class="col-md-8 col-md-offset-2">
        <div class="section-title">
          <h5 class="heading"><em>how it works</em></h5>
          <h4 class="sub-heading">What you need to know about <span class="color">Sublime App</span></h4>
        </div>
      </div>

      <div class="row text-center">

        <div class="col-sm-4">

          <!-- feature -->
          <div>
            <div class="feature-icon bordered">
              <i class="ti-pencil-alt color"></i>
            </div>
            <div class="feature-description">
              <h5>
                                <span>REGISTER</span>
                                <small class="show text-muted">REBUM ACCUSAMUS MEA</small>
                            </h5>

              <p>Nam an oblique equidem. An mazim tibique hendrerit est, albucius voluptua ex has. Ei cum eius dicant facilisis, ne diam rebum accusamus mea.</p>
            </div>
          </div>
          <!-- /feature -->

        </div>

        <div class="col-sm-4">

          <!-- feature -->
          <div>
            <div class="feature-icon bordered">
              <i class="ti-bookmark-alt color"></i>
            </div>
            <div class="feature-description">
              <h5>
                                <span>UPLOAD</span>
                                <small class="show text-muted">REBUM ACCUSAMUS MEA</small>
                            </h5>
              <p>Nam an oblique equidem. An mazim tibique hendrerit est, albucius voluptua ex has. Ei cum eius dicant facilisis, ne diam rebum accusamus mea.</p>
            </div>
          </div>
          <!-- /feature -->

        </div>

        <div class="col-sm-4">

          <!-- feature -->
          <div>
            <div class="feature-icon bordered">
              <i class="ti-brush-alt color"></i>
            </div>
            <div class="feature-description">
              <h5>
                                <span>REVIEW</span>
                                <small class="show text-muted">REBUM ACCUSAMUS MEA</small>
                            </h5>
              <p>Nam an oblique equidem. An mazim tibique hendrerit est, albucius voluptua ex has. Ei cum eius dicant facilisis, ne diam rebum accusamus mea.</p>
            </div>
          </div>
          <!-- /feature -->

        </div>
      </div>
    </div>
  </section>
  <!-- /how it works section -->

  <!-- statistics -->
  <section id="statistics" class="content-section banner parallax color-inherit text-white text-center" style="background-image: url(/static/frontend/cover2.jpg);">

    <div class="overlay-colored-9"></div>

    <div class="container">
      <div class="row">

        <div class="col-sm-3 col-xs-6 p15">
          <i class="count-icon ti-time"></i>
          <b class="count" data-from="0" data-to="1000" data-appear-top-offset="-200">0</b>
          <span class="heading-font">Free API requests</span>
        </div>

        <div class="col-sm-3 col-xs-6 p15">
          <i class="count-icon ti-face-smile"></i>
          <b class="count" data-from="0" data-to="2300" data-appear-top-offset="-200">0</b>
          <span class="heading-font">Happy Customers</span>
        </div>

        <div class="col-sm-3 col-xs-6 p15">
          <i class="count-icon ti-info-alt"></i>
          <b class="count" data-from="0" data-to="6850" data-appear-top-offset="-200">0</b>
          <span class="heading-font">Servers Created</span>
        </div>

        <div class="col-sm-3 col-xs-6 p15">
          <i class="count-icon ti-na"></i>
          <b class="count" data-from="0" data-to="8650" data-appear-top-offset="-200">0</b>
          <span class="heading-font">Tickets Answered</span>
        </div>

      </div>
    </div>

  </section>
  <!-- /statistics -->

  <!-- features section -->
  <section id="features" class="content-section features feature light">
    <div class="container">

      <div class="col-md-8 col-md-offset-2">
        <div class="section-title">
          <h5 class="heading"><em>admin dashboard features</em></h5>
          <h4 class="sub-heading">All the App <b class="color">FANCINESS</b></h4>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="row">

            <div class="col-md-12 mb15" >
              <div class="feature-icon left">
                <i class="ti-layers-alt color"></i>
              </div>
              <div class="feature-description">
                <h5>RESPONSIVE</h5>
                <p>Lorem ipsum dolor sit amet, modus impedit pertinax vix ne, quem intellegat duo ex.</p>
              </div>
            </div>

            <div class="col-md-12 mb15" >
              <div class="feature-icon left">
                <i class="ti-bag color"></i>
              </div>
              <div class="feature-description">
                <h5>MODERN DESIGN</h5>
                <p>Lorem ipsum dolor sit amet, modus impedit pertinax vix ne, quem intellegat duo ex.</p>
              </div>
            </div>

            <div class="col-md-12 mb15">
              <div class="feature-icon left">
                <i class="ti-mouse color"></i>
              </div>
              <div class="feature-description">
                <h5>DIFFERENT LAYOUTS</h5>
                <p>Lorem ipsum dolor sit amet, modus impedit pertinax vix ne, quem intellegat duo ex.</p>
              </div>
            </div>

          </div>
        </div>
        <div class="col-sm-6 text-center ">
          <div class="mt25">
            <div>
              <img src="/static/frontend/feature-shot.png" class="mt25" alt="">
            </div>
          </div>
        </div>
  </section>
  <!-- /features section -->

  <!-- ext features section -->
  <section class="content-section">

    <div class="container">

      <div class="row">

        <div class="col-sm-4 p25" >
          <div class="feature-icon left">
            <i class="ti-layout color"></i>
          </div>
          <div class="feature-description">
            <h5>RESPONSIVE</h5>
            <p>Lorem ipsum dolor sit amet, modus impedit pertinax vix ne, quem intellegat duo ex.</p>
          </div>
        </div>

        <div class="col-sm-4 p25" >
          <div class="feature-icon left">
            <i class="ti-world color"></i>
          </div>
          <div class="feature-description">
            <h5>MODERN DESIGN</h5>
            <p>Lorem ipsum dolor sit amet, modus impedit pertinax vix ne, quem intellegat duo ex.</p>
          </div>
        </div>

        <div class="col-sm-4 p25" >
          <div class="feature-icon left">
            <i class="ti-layout-grid4 color"></i>
          </div>
          <div class="feature-description">
            <h5>DIFFERENT LAYOUTS</h5>
            <p>Lorem ipsum dolor sit amet, modus impedit pertinax vix ne, quem intellegat duo ex.</p>
          </div>
        </div>

        <div class="col-sm-4 p25" >
          <div class="feature-icon left">
            <i class="ti-bookmark-alt color"></i>
          </div>
          <div class="feature-description">
            <h5>WELL DOCUMENTED</h5>
            <p>Lorem ipsum dolor sit amet, modus impedit pertinax vix ne, quem intellegat duo ex.</p>
          </div>
        </div>

        <div class="col-sm-4 p25" >
          <div class="feature-icon left">
            <i class="ti-truck color"></i>
          </div>
          <div class="feature-description">
            <h5>FREE LIFETIME UPDATES</h5>
            <p>Lorem ipsum dolor sit amet, modus impedit pertinax vix ne, quem intellegat duo ex.</p>
          </div>
        </div>

        <div class="col-sm-4 p25" >
          <div class="feature-icon left">
            <i class="ti-palette color"></i>
          </div>
          <div class="feature-description">
            <h5>COLOR OPTIONS</h5>
            <p>Lorem ipsum dolor sit amet, modus impedit pertinax vix ne, quem intellegat duo ex.</p>
          </div>
        </div>

        <div class="col-sm-4 p25" >
          <div class="feature-icon left">
            <i class="ti-settings color"></i>
          </div>
          <div class="feature-description">
            <h5>EASY TO CUSTOMIZE</h5>
            <p>Lorem ipsum dolor sit amet, modus impedit pertinax vix ne, quem intellegat duo ex.</p>
          </div>
        </div>

        <div class="col-sm-4 p25" >
          <div class="feature-icon left">
            <i class="ti-user color"></i>
          </div>
          <div class="feature-description">
            <h5>QUICK SUPPORT TEAM</h5>
            <p>Lorem ipsum dolor sit amet, modus impedit pertinax vix ne, quem intellegat duo ex.</p>
          </div>
        </div>

        <div class="col-sm-4 p25" >
          <div class="feature-icon left">
            <i class="ti-brush-alt color"></i>
          </div>
          <div class="feature-description">
            <h5>GUARANTEED SATISFACTION</h5>
            <p>Lorem ipsum dolor sit amet, modus impedit pertinax vix ne, quem intellegat duo ex.</p>
          </div>
        </div>

      </div>

    </div>

  </section>
  <!-- /ext features section -->

  <!-- quote banner -->
  <section class="content-section banner">

    <div class="parallax-cover parallax-0" style="background-image: url(/static/frontend/cover3.jpg);"></div>

    <div class="overlay-darken-4"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="text-center">
            <blockquote class="text-white">
              <p>Outside of the chair, the teapot is the most ubiquitous and important design element in the domestic environment and almost everyone who has tackled the world of design has ended up designing one.</p>
              <small class="color">David McFadden</small>
            </blockquote>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /quote banner -->

  <!-- reviews -->
  <section id="reviews" class="content-section light">

    <div class="container">
      <!-- reviews loaded via ajax -->
      <div class="reviews-carousel" ></div>
      <!-- /reviews loaded via ajax -->
    </div>

  </section>
  <!-- /reviews -->

  <!-- subscribe section -->
  <section class="content-section banner bg-color text-white color-inherit text-center">
    <div class="container">
      <div class="section-title mb0">
        <h4 data-appear-top-offset="-190">Subscribe to our newsletter</h4>

      </div><small>Lorem ipsum dolor sit amet, modus impedit pertinax vix ne, quem intellegat duo ex.</small>

      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form method="post" role="form" action="inc/subscribe.php" name="subscribeform" id="subscribeform">

            <div style="display:none;visibility:hidden">
              <input type="text" id="check" name="check">
            </div>

            <div class="input-group mb15 mt25">
              <input type="email" class="form-control input-lg no-b" id="email" name="email" placeholder="Your email address" required>
              <span class="input-group-btn">
                                <button type="submit" class="btn btn-success btn-lg subscribe" data-loading-text="Adding to our list ...">
                                    <span>Subscribe</span>
              <i class="ti-arrow-circle-right ml15"></i>
              </button>
              </span>
            </div>

            <!-- subscribe form alert box container -->
            <div class="subscribe-message">
              <div class="response" id="response"></div>
            </div>
            <!-- /subscribe form alert box container -->

          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- subscribe section -->

  <!-- footer -->
  <footer class="content-section">

    <div class="container">

      <div class="row text-center">

        <div class="col-sm-12 mb25">

          <a class="btn btn-primary btn-social-icon btn-rounded btn-outline btn-sm smooth-scroll mb25" href="#top">
            <i class="ti-angle-up"></i>
          </a>

          <br>

          <!--a class="btn btn-social-icon btn-facebook btn-rounded btn-sm ml5 mr5" href="javascript:;">
            <i class="fa fa-facebook"></i>
          </a-->

          <!--a class="btn btn-social-icon btn-twitter btn-rounded btn-sm ml5 mr5" href="javascript:;">
            <i class="fa fa-twitter"></i>
          </a-->

          <!--a class="btn btn-social-icon btn-google-plus btn-rounded btn-sm ml5 mr5" href="javascript:;">
            <i class="fa fa-google-plus"></i>
          </a-->

        </div>

        <div class="col-sm-12 mb25">
          <small class="show">&copy; Copyright Digiscripts. All rights reserved</small>
        </div>
      </div>
    </div>
  </footer>
  <!-- /footer -->
    <script src="/js/frontend.js"></script>
    </body>
</html>
