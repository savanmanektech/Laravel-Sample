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
  <header class="header fixed-sticky">
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

  <!-- contact form -->
  <section id="contact" class="content-section banner">

    <div class="container">

      <div class="row">

        <div class="col-sm-offset-3 col-sm-6">


          <div class="section-title">
            <h6>Try any plan free for 30 days</h6>
            <h4>Choose the right plan for your business</h4>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="pricing-table">
            <div class="pricing-body">
              <h5>PRACTICE</h5>
              <div class="plan-price">
                <span class="heading-font">$5</span>
                <small><em>per month</em></small>
              </div>
              <ul class="plan-features">
                <li>2 accounts</li>
                <li>Limited access</li>
                <li>4GB of storage</li>
                <li>-</li>
                <li><i class="ti-check text-success"></i>
                </li>
              </ul>
              <a href="/auth/register/practice" class="btn btn-color">Get started</a>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="pricing-table">
            <div class="pricing-body">
              <h5>PHARMACY</h5>
              <div class="plan-price">
                <span class="heading-font">$20</span>
                <small><em>per month</em></small>
              </div>
              <ul class="plan-features">
                <li>10 accounts</li>
                <li>Unlimited access</li>
                <li>3TB of storage</li>
                <li>-</li>
                <li><i class="ti-close text-danger"></i>
                </li>
              </ul>
              <a href="/auth/register/pharmacy" class="btn btn-color">Get started</a>
              <small class="mt10 show">
                                Try it free for 30 days.
                            </small>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="pricing-table">
            <div class="pricing-body">
              <h5>MEDICAL LAB</h5>
              <div class="plan-price">
                <span class="heading-font">$60</span>
                <small><em>per month</em></small>
              </div>
              <ul class="plan-features">
                <li>Unlimited accounts</li>
                <li>Unlimited access</li>
                <li>20TB of storage</li>
                <li>E-mail support</li>
                <li><i class="ti-check text-success"></i>
                </li>
              </ul>
              <a href="/auth/register/medical-lab" class="btn btn-color">Get started</a>
              <small class="mt10 show">
                                Try it free for 30 days.
                            </small>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="pricing-table">
            <div class="pricing-body">
              <h5>RADIOLOGICAL LAB</h5>
              <div class="plan-price">
                <span class="heading-font">$120</span>
                <small><em>per month</em></small>
              </div>
              <ul class="plan-features">
                <li>∞ accounts</li>
                <li>∞ access</li>
                <li>20TB of storage</li>
                <li>E-mail support</li>
                <li><i class="ti-check text-success"></i>
                </li>
              </ul>
              <a href="/auth/register/radiological-lab" class="btn btn-color">Get started</a>
              <small class="mt10 show">
                                Try it free for 30 days.
                            </small>
            </div>
          </div>
        </div>
      </div>

      <small><em>*All prices quoted in USD. Terms and conditions may apply</em></small>

    </div>

  </section>
  <!-- /contact form -->

  <section class="content-section banner dark lighten">

    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="text-center">
            <p>Looking for a custom plan? Get in touch with our sales team</p>
            <div class="color-inherit text-white">
              <a href="#" class="btn btn-color btn-lg btn-rounded">Customized Solution</a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="content-section banner">
    <div class="container">


      <div class="section-title">
        <h4>FREQUENTLY ASKED QUESTIONS</h4>
      </div>

      <div class="row">
        <div class="col-sm-6 p25">
          <h6 class="color">DO YOU ACCEPT VISA</h6>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
        </div>
        <div class="col-sm-6 p25">
          <h6 class="color">DO YOU ACCEPT VISA</h6>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
        </div>
        <div class="col-sm-6 p25">
          <h6 class="color">WHY DID THE CHICKEN CROSS THE ROAD</h6>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
        </div>
        <div class="col-sm-6 p25">
          <h6 class="color">HOW LONG UNTIL MY TRIAL EXPIRES</h6>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- footer -->
  <footer class="content-section">

    <div class="container">

      <div class="row text-center">

        <div class="col-sm-12 mb25">

          <a class="btn btn-primary btn-social-icon btn-rounded btn-outline btn-sm smooth-scroll mb25" href="#top">
            <i class="ti-angle-up"></i>
          </a>

          <br>

          <a class="btn btn-social-icon btn-facebook btn-rounded btn-sm ml5 mr5" href="javascript:;">
            <i class="fa fa-facebook"></i>
          </a>

          <a class="btn btn-social-icon btn-twitter btn-rounded btn-sm ml5 mr5" href="javascript:;">
            <i class="fa fa-twitter"></i>
          </a>

          <a class="btn btn-social-icon btn-google-plus btn-rounded btn-sm ml5 mr5" href="javascript:;">
            <i class="fa fa-google-plus"></i>
          </a>

        </div>

        <div class="col-sm-12 mb25">
          <p>Made with&nbsp;<i class="ti-heart text-danger"></i>&nbsp;in Paris France</p>
          <small class="show">&copy;&nbsp;Copyright Sub<span class="color">Lime</span>&nbsp;LLC&nbsp;<span class="year"></span>. All rights reserved</small>
        </div>
      </div>
    </div>
  </footer>
  <!-- /footer -->
    <script src="/js/frontend.js"></script>
    </body>
</html>
