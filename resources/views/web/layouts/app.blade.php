<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wash My Car</title>
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('web/images/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('web/images/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('web/images/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="assets/images/favicons/site.webmanifest">
    <!-- plugin scripts -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/piloz-icons.css') }}">

    <!-- theme styles -->
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/responsive.css') }}">

    <!-- custom styles -->
    <link rel="stylesheet" href="{{ asset('web/css/custom/custom-style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/custom/custom-responsive.css') }}">

    <script src="{{ asset('js/web.js') }}" defer></script>
</head>

<body>

    <div class="preloader">
        <img src="{{ asset('web/images/loader.png') }}" height="100" class="preloader__image" alt="">
    </div><!-- /.preloader -->

    <div class="page-wrapper">
        @include('web.layouts.partials.header')
        @yield('content')
        @include('web.layouts.partials.footer')
    </div><!-- /.page-wrapper -->


    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>

    <a href="#" class="chat-btn">
        <svg id="Capa_1" enable-background="new 0 0 512.012 512.012" viewBox="0 0 512.012 512.012" xmlns="http://www.w3.org/2000/svg">
            <g>
                <path d="m333.201 115.038c-28.905-59.021-89.37-98.042-157.193-98.042-97.047 0-176 78.505-176 175 0 26.224 5.63 51.359 16.742 74.794l-16.451 82.265c-2.094 10.472 7.144 19.728 17.618 17.656l83.279-16.465c11.213 5.319 22.813 9.364 34.732 12.151-26.717-126.541 69.199-245.321 197.273-247.359z" />
                <path d="m495.266 394.79c2.874-6.061 5.373-12.237 7.511-18.514h-.549c37.448-109.917-41.305-225.441-157.567-231.066-.002-.006-.003-.012-.005-.018-100.036-4.61-183.148 75.486-183.148 174.804 0 96.414 78.361 174.857 174.743 174.997 26.143-.035 51.201-5.663 74.568-16.747 91.207 18.032 84.094 16.75 86.189 16.75 9.479 0 16.56-8.686 14.709-17.941z" />
            </g>
        </svg>
    </a>


    <div class="side-menu__block">
        <div class="side-menu__block-overlay custom-cursor__overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div><!-- /.side-menu__block-overlay -->
        <div class="side-menu__block-inner ">
            <div class="side-menu__top justify-content-end">

                <a href="#" class="side-menu__toggler side-menu__close-btn"><img src="{{ asset('web/images/shapes/close-1-1.png') }}" alt=""></a>
            </div><!-- /.side-menu__top -->


            <nav class="mobile-nav__container">
                <!-- content is loading via js -->
            </nav>
            <div class="side-menu__sep"></div><!-- /.side-menu__sep -->
            <div class="side-menu__content">
                <p>Lorem Ipsum is simply dummy text the printing and setting industry. Lorm Ipsum has been the
                    industry's stanard dummy text ever. </p>
                <p><a href="mailto:needhelp@apton.com">needhelp@apton.com</a> <br> <a href="tel:888-999-0000">888 999
                        0000</a></p>
                <div class="side-menu__social">
                    <a href="#"><i class="fab fa-facebook-square"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div>
            </div><!-- /.side-menu__content -->
        </div><!-- /.side-menu__block-inner -->
    </div><!-- /.side-menu__block -->

    <script src="{{ asset('web/js/jquery-3.5.0.min.js') }}"></script>
    <script src="{{ asset('web/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('web/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('web/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('web/js/isotope.js') }}"></script>
    <script src="{{ asset('web/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('web/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('web/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('web/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('web/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('web/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('web/js/TweenMax.min.js') }}"></script>
    <script src="{{ asset('web/js/wow.js') }}"></script>
    <script src="{{ asset('admin/assets/js/customer-register.js') }}" rel="application/javascript"></script>
    <script src="{{ asset('web/js/theme.js') }}"></script>

</body>

</html>