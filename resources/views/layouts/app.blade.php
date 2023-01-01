<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HayDey Studio</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('pages/css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('pages/css/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('pages/css/owl.carousel.min.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('pages/css/all.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('pages/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('pages/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('pages/css/swiper.min.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('pages/css/magnific-popup.css') }}">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ asset('pages/css/slick.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('pages/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
    <!--::header part start::-->
    @include('layouts.header')
    <!-- Header part end-->

    <!-- ::Content:: -->
        @yield('content')
    <!-- ::End content:: -->

    <!--::footer_part start::-->
        @include('layouts.footer')
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <script src="{{ asset('pages/js/jquery-1.12.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('pages/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('pages/js/bootstrap.min.js') }}"></script>
    <!-- easing js -->
    <script src="{{ asset('pages/js/jquery.magnific-popup.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ asset('pages/js/swiper.min.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ asset('pages/js/jquery.filterizr.min.js') }}"></script>
    <!-- particles js -->
    <script src="{{ asset('pages/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('pages/js/jquery.nice-select.min.js') }}"></script>
    <!-- slick js -->
    <script src="{{ asset('pages/js/slick.min.js') }}"></script>
    <script src="{{ asset('pages/js/swiper.min.js') }}"></script>
    <script src="{{ asset('pages/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('pages/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('pages/js/contact.js') }}"></script>
    <script src="{{ asset('pages/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('pages/js/jquery.form.js') }}"></script>
    <script src="{{ asset('pages/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('pages/js/mail-script.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('pages/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>

</html>