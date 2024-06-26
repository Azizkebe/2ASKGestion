
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Portail: Gestion-RH</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">

        <link href="{{asset('hello/css/bootstrap.min.css')}}" rel="stylesheet">

        <link href="{{asset('hello/css/bootstrap-icons.css')}}" rel="stylesheet">

        <link href="{{asset('hello/css/owl.carousel.min.css')}}" rel="stylesheet">

        <link href="{{asset('hello/css/owl.theme.default.min.css')}}" rel="stylesheet">

        <link href="{{asset('hello/css/tooplate-gotto-job.css')}}" rel="stylesheet">

<!--

Tooplate 2134 Gotto Job

https://www.tooplate.com/view/2134-gotto-job

Bootstrap 5 HTML CSS Template

-->
    </head>

    <body id="top">

       @include('layouts.accueil.navbar')

        <main>

            <section class="hero-section d-flex justify-content-center align-items-center">
                <div class="section-overlay"></div>

                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                          @include('layouts.accueil.hero')
                        </div>

                        {{-- <div class="col-lg-6 col-12">
                           @include('layouts.accueil.search')
                        </div> --}}

                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer">
            <div class="site-footer-bottom">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-4 col-12 d-flex align-items-center">
                            <p class="copyright-text">Copyright © Aziz KEBE</p>

                            <ul class="footer-menu d-flex">
                                <li class="footer-menu-item"><a href="#" class="footer-menu-link">Tous droits reservés</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-5 col-12 mt-2 mt-lg-0">
                            <ul class="social-icon">
                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-twitter"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-facebook"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-linkedin"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-instagram"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-youtube"></a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-12 mt-2 d-flex align-items-center mt-lg-0">
                            <p>Design: <a class="sponsored-link" rel="sponsored" href="" target="_blank">ANPEJ</a></p>
                        </div>

                        <a class="back-top-icon bi-arrow-up smoothscroll d-flex justify-content-center align-items-center" href="#top"></a>

                    </div>
                </div>
            </div>
        </footer>

        <!-- JAVASCRIPT FILES -->
        <script src="{{asset('hello/js/jquery.min.js')}}"></script>
        <script src="{{asset('hello/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('hello/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('hello/js/counter.js')}}"></script>
        <script src="{{asset('hello/js/custom.js')}}"></script>

    </body>
</html>
