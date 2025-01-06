<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('user_side/img/favicon.png')}}">
    <title>Azzam Academy</title>
  
    <!-- Bootstrap CSS -->
    @extends('user_side.inc.bootstrap')

    <style>
              .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 1); /* خلفية شبه شفافة */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000; /* للتأكد من ظهوره فوق كل شيء */
        }

        /* تصميم الـ Spinner */
        .spinner {
            border: 8px solid #f3f3f3; /* لون الخلفية */
            border-top: 8px solid #3498db; /* لون الـ Spinner */
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1s linear infinite; /* دوران الـ Spinner */
        }

        /* دوران الـ Spinner */
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* إخفاء المحتوى أثناء التحميل */
        .content {
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div id="loader" class="loader">
        <div class="spinner"></div>
    </div>
    <!--::header part start::-->
    <header class="main_menu single_page_menu">
      @include('user_side.inc.header')
    </header>
    <!-- Header part end-->

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Contact us</h2>
                            <p>Home<span>/<span>Contact us</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

  <!-- ================ contact section start ================= -->
  <section class="contact-section section_padding">
    <div class="container">



      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Get in Touch</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" action="{{ route('contact.store') }}" method="post" id="contactForm" novalidate="novalidate">
            @csrf
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  
                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder = 'Enter Message'></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder = 'Enter your name'>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder = 'Enter email address'>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder = 'Enter Subject'>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button type="submit" class="button button-contactForm btn_1">Send Message</button>
            </div>
          </form>
        </div>
        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Jordan, Alzarqa.</h3>
              <p>street: Tarek bin zyad</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3><a href="tel:+962788076258" style="color:black">0788076258</a></h3>
              <p>Sunday to Thursday 9am to 6pm</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3><a href="mailto:ahmad.a.alshammas@gmail.com" style="color:black">ahmad.a.alshammas@gmail.com</a></h3>
              <p>Send us your query anytime!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

<!-- footer part start-->
@extends('user_side.inc.footer')
<!-- footer part end-->

<!-- jquery plugins here-->
@extends('user_side.inc.jquery')

 <script>
  // انتظر حتى يتم تحميل الصفحة بالكامل
  window.addEventListener("load", function () {
      // إخفاء الـ Loader بعد 3 ثوانٍ
      setTimeout(function () {
          const loader = document.getElementById("loader");
          loader.style.display = "none";

          // إظهار محتوى الصفحة
          const content = document.getElementById("content");
          content.style.display = "block";
      }, 300); // 3000 ميلي ثانية = 3 ثوانٍ
  });
</script>
</body>

</html>