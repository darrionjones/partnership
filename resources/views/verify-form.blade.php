<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>ShaQ Express</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="facebook-domain-verification" content="3pq1qmoz6rhlrv03r0ngvrdcddd8tx" />
  <link rel="manifest" href="site.webmanifest">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="apple-touch-icon" href="{{ asset('icon.png') }}">
  <meta name="theme-color" content="#fb6340">
  <meta name="twitter:card" value="Webpack basic starter project">
  <meta name="Description" content="A simple webpack starter project for your basic web development needs." />
  <meta property="og:title" content="Webpack basic starter project" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="https://lifenautjoe.github.io/webpack-starter-basic/" />
  <meta property="og:image" content="https://i.snag.gy/i3eMBc.jpg" />
  <meta property="og:description" content="A simple webpack starter project for your basic web development needs." />
  <meta name="theme-color" content="#FEC53D">
  <meta name="msapplication-navbutton-color" content="#FEC53D">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap');
  </style>
  <link href="{{ asset('partner/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="icon" href="partner/images/logo.png">
  <link href="{{ asset('verify-form/css/register2.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <style>
    .navbar {
    padding-top: 1.75rem;
    background-color: #fcfafb00;
    box-shadow: none;
    transition: all 0.2s;
}
  </style>
  <script>

    !function(f,b,e,v,n,t,s)
    
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    
    n.queue=[];t=b.createElement(e);t.async=!0;
    
    t.src=v;s=b.getElementsByTagName(e)[0];
    
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    
    'https://connect.facebook.net/en_US/fbevents.js');
    
    fbq('init', '1168539653774610');
    
    fbq('track', 'PageView');
    
    </script>
    
</head>

<body>
    <nav id="navbarExample" class="navbar navbar-expand-lg fixed-top navbar-light" aria-label="Main navigation">
        <div class="container">
          <!-- Image Logo -->
          <a class="navbar-brand logo-image" href="https://www.shaqexpress.com"><img src="{{ asset('partner/images/logo.png') }}" alt="alternative" style="height: 70px; width: 110px;"></a>
          <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ms-auto navbar-nav-scroll">
              <li class="nav-item">
                <a class="nav-link active" style="text-decoration: none; color: black;" aria-current="page"
                  href="https://www.shaqexpress.com">Visit our Site</a>
              </li>
          </div>
        </div>
      </nav>
  <div id="background" style="background-image: url(duty-free.jpg) !important;">
  @if(session('success-verified'))
          <div class="alert success">
            <span class="closebtn">&times;</span>
            <strong>Success!</strong> {{ session('success-verified') }}
            You'll be redirected to our site.
          </div>
  @else
    <form action="{{ route('verify-vendor') }}" method="post" id="msform">
      @csrf
      <input type="hidden" value="{{ $vendorDetails->id }}" name="id">
      <h1 style="margin-top: 22%;">Verify your account</h1>
      <p style="font-size: 20px; font-family: 'maven pro'; margin-left: 10px;">
        We need more information about your restaurant to <br>onboard you
      </p>

      <fieldset>
        <h2 class="fs-title">Contact details</h2>
        <h3 class="fs-subtitle">Fill in your contact details below</h3>
        @if (session('success'))
          <div class="alert success">
            <span class="closebtn">&times;</span>
            <strong>Success!</strong> {{ session('success') }}
          </div>
        @endif
        @if ($errors->any())
          @foreach ($errors->all() as $error)
            <div class="alert">
              <span class="closebtn">&times;</span>
              <strong>Danger!</strong> {{ $error }}
            </div>
          @endforeach
        @endif
        <input type="text" name="restaurant_name" value="{{ $vendorDetails->business_name }}" class="form-control-input" readonly placeholder="Restaurant Name" required>
        <input type="email" name="email_address" value="{{ $vendorDetails->email }}" class="form-control-input"  readonly placeholder="Email" required>
        <input type="number" name="phone_number" value="{{ $vendorDetails->phone_number }}" class="form-control-input" readonly placeholder="Phone Number" required>
        <input type="address" name="location" value="{{ $vendorDetails->location }}" class="form-control-input" placeholder="Location" required>
        <h2 class="fs-title">Business Information</h2>
        <input type="text" name="tin_num" value="{{ $vendorDetails->tin }}" placeholder="Tin Number" />
        <input type="text" name="biz_reg_num" value="{{ $vendorDetails->business_registration_number }}" placeholder="Business Registration number">
        <h2 class="fs-title">Billing Setup</h2>
        <input type="text" name="bank_name" value="{{ $vendorDetails->bank_name }}" placeholder="Bank name" />
        <input type="text" name="bank_branch" value="{{ $vendorDetails->bank_branch }}" placeholder="Bank Branch" />
        <input type="text" name="bank_number" value="{{ $vendorDetails->bank_account_number }}" placeholder="Bank number" />
        <input type="address" name="billing_address" value="{{ $vendorDetails->billing_address }}" placeholder="Billing Address" />
        <input type="text" name="bank_account_name" value="{{ $vendorDetails->bank_account_name }}" placeholder="Account Name" />
        <button type="submit" class="submit action-button" value="Submit">Submit</button>
      </fieldset>
    </form>
  </div>


  @endif
  
  <footer style="bottom: 100px;">
    <div class="footer bg-gray">
      <div class="container">
        <div class="col-lg-12">
          <h2 style="color: white; font-size: 39px; padding: 25px;">Connect with Us</h2>
          <div class="social-container">
            <span class="fa-stack">
              <a href="https://www.facebook.com/ShaQexpress/">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-facebook-f fa-stack-1x"></i>
              </a>
            </span>
            <span class="fa-stack">
              <a href="https://twitter.com/ShaQexpress">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-twitter fa-stack-1x"></i>
              </a>
            </span>
            <span class="fa-stack">
              <a href="https://gh.linkedin.com/company/shaq-express">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-linkedin fa-stack-1x"></i>
              </a>
            </span>
            <span class="fa-stack">
              <a href="https://www.instagram.com/shaq_express/?hl=en">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-instagram fa-stack-1x"></i>
              </a>
            </span>
            <span class="fa-stack">
              <a href="https://www.youtube.com/channel/UCVO8xU2znmOOf-eH84USiaw">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-youtube fa-stack-1x"></i>
              </a>
            </span>
          </div>

        </div>
      </div>
    </div>
  </footer>
  <script>
    var close = document.getElementsByClassName("closebtn");
    var i;

    for (i = 0; i < close.length; i++) {
      close[i].onclick = function() {
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function() {
          div.style.display = "none";
        }, 600);
      }
    }
  </script>
  @if(session('success-verified'))
  <script>
    setInterval(() => {
      location.href = "https://shaqexpress.com";
    }, 4000);
  </script>
  @endif
</body>

</html>
