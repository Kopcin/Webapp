<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Podróżnik</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Favicon -->
        <link href="{{ asset('images/Hatchful/favicon.png') }}" rel="icon">
        
        <!-- Vendor CSS Files -->
        <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">

        <!-- =======================================================
        * Template Name: UpConstruction - v1.0.1
        * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>

    <body class="antialiased">
        <!-- ======= Header ======= -->
        <header id="header" class="header d-flex align-items-center">
            <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
                <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                    <img src="{{ asset('images/Hatchful/logo_transparent.png') }}" alt="logo">
                    <h1>Podróżnik<span>.</span></h1>
                </a>

                <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
                <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
                <nav id="navbar" class="navbar">
                    <ul>
                        @if (Route::has('login'))
                            @auth
                            <li><a href="{{ url('/') }}" class="active">Start</a></li>
                            <!-- <li><a href="about.html">O nas</a></li>
                            <li><a href="contact.html">Kontakt</a></li> -->
                            <li><a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ __('Dashboard') }}</a></li>
                            <li><a href="{{ url('/events') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Tablica</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Log Out') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            @else
                            <li><a href="{{ url('/') }}" class="active">Start</a></li>
                            <!-- <li><a href="about.html">O nas</a></li>
                            <li><a href="contact.html">Kontakt</a></li> -->
                            <li><a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ __('Login') }}</a></li>
                                @if (Route::has('register'))
                                <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">{{ __('Register') }}</a></li>
                                @endif
                            @endauth
                        @endif   
                    </ul>
                </nav><!-- .navbar -->
            </div>
        </header><!-- End Header -->

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="hero">

            <div class="info d-flex align-items-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2 data-aos="fade-down">Odkrywaj <span>z Podróżnikiem</span></h2>
                            <p data-aos="fade-up">Podróżuj po świecie. Poznaj miejsca, w których jeszcze nie byłeś.<br />Z Podróżnikiem zaplanuj niezapomniane wakacje.</p>
                            <a data-aos="fade-up" data-aos-delay="200" href="#get-started" class="btn-get-started">Zacznij teraz</a>
                        </div>
                    </div>
                </div>
            </div>

            <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

                <div class="carousel-item active" style="background-image: url(images/carousel/theme_1.jpg)"></div>
                <div class="carousel-item" style="background-image: url(images/carousel/theme_2.jpg)"></div>
                <div class="carousel-item" style="background-image: url(images/carousel/theme_3.jpg)"></div>
                <div class="carousel-item" style="background-image: url(images/carousel/theme_4.jpg)"></div>
                <div class="carousel-item" style="background-image: url(images/carousel/theme_5.jpg)"></div>

                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>
            </div>
        </section><!-- End Hero Section -->
        
        <main id="main">
            <!-- ======= Get Started Section ======= -->
            <section id="get-started" class="get-started section-bg">
                @if (Route::has('login'))
                    @auth
                    <!-- tu bedzą posty uzytkownikow -->
                    @else
                    <div style="width: 50%; margin: 0 auto;"> 
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Password')" />

                                <x-text-input id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                required autocomplete="current-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Remember Me -->
                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <a href="{{ route('register') }}" class="pr-4 underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                    {{ __('Register') }}
                                </a>
                            
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif

                                <x-primary-button class="ml-3">
                                    {{ __('Log in') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                    @endauth
                @endif
            </section><!-- End Get Started Section -->

            <!-- ======= Services Section ======= -->
            <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                <h2>Usługi</h2>
                </div>

                <div class="row gy-4">

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item  position-relative">
                    <div class="icon">
                        <i class="fa-solid fa-mountain-city"></i>
                    </div>
                    <h3>Zakwaterowanie</h3>
                    <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                    <div class="icon">
                        <i class="fa-solid fa-arrow-up-from-ground-water"></i>
                    </div>
                    <h3>Bilety lotnicze</h3>
                    <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                    <div class="icon">
                        <i class="fa-solid fa-compass-drafting"></i>
                    </div>
                    <h3>Planowanie podróży</h3>
                    <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative">
                    <div class="icon">
                        <i class="fa-solid fa-trowel-bricks"></i>
                    </div>
                    <h3>Szlaki turystyczne</h3>
                    <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-item position-relative">
                    <div class="icon">
                        <i class="fa-solid fa-helmet-safety"></i>
                    </div>
                    <h3>Wyżywienie</h3>
                    <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.</p>
                    </div>
                </div><!-- End Service Item -->

                </div>

            </div>
            </section><!-- End Services Section -->

            <!-- ======= Our Offers Section ======= -->
            <section id="projects" class="projects">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                <h2>Najpopularniejsze miejsca</h2>
                <p>Od tych popularnych kierunków podróży dzieli Cię zaledwie jedno kliknięcie</p>
                </div>

                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">

                <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">Wszystkie</li>
                    <li data-filter=".filter-UE">Unia Europejska</li>
                    <li data-filter=".filter-notUE">Poza Unią</li>
                    <li data-filter=".filter-warm">Latem</li>
                    <li data-filter=".filter-cold">Zimą</li>
                </ul><!-- End Filters -->

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-UE filter-warm">
                    <div class="portfolio-content h-100">
                        <img src="{{ asset('images/places/barcelona_1.jpg') }}" class="img-fluid" alt="Obrazek">
                        <div class="portfolio-info">
                        <h4>Barcelona</h4>
                        <a href="{{ asset('images/places/barcelona_1.jpg') }}" title="Barcelona" data-gallery="portfolio-gallery-city" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="formularz.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                    </div><!-- End Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item filter-notUE filter-warm">
                    <div class="portfolio-content h-100">
                        <img src="{{ asset('images/places/sydney_1.jpg') }}" class="img-fluid" alt="Obrazek">
                        <div class="portfolio-info">
                        <h4>Sydney</h4>
                        <a href="{{ asset('images/places/sydney_1.jpg') }}" title="Sydney" data-gallery="portfolio-gallery-city" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="formularz.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                    </div><!-- End Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item filter-notUE filter-warm">
                    <div class="portfolio-content h-100">
                        <img src="{{ asset('images/places/malediwy_1.jpg') }}" class="img-fluid" alt="Obrazek">
                        <div class="portfolio-info">
                        <h4>Malediwy</h4>
                        <a href="{{ asset('images/places/malediwy_1.jpg') }}" title="Malediwy" data-gallery="portfolio-gallery-place" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="formularz.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                    </div><!-- End Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item filter-notUE filter-warm">
                    <div class="portfolio-content h-100">
                        <img src="{{ asset('images/places/cusco_1.jpg') }}" class="img-fluid" alt="Obrazek">
                        <div class="portfolio-info">
                        <h4>Cusco</h4>
                        <a href="{{ asset('images/places/cusco_1.jpg') }}" title="Cusco" data-gallery="portfolio-gallery-place" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="formularz.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                    </div><!-- End Item -->
                    
                    <div class="col-lg-4 col-md-6 portfolio-item filter-UE filter-warm">
                    <div class="portfolio-content h-100">
                        <img src="{{ asset('images/places/paryz_1.jpg') }}" class="img-fluid" alt="Obrazek">
                        <div class="portfolio-info">
                        <h4>Paryż</h4>
                        <a href="{{ asset('images/places/paryz_1.jpg') }}" title="Paryż" data-gallery="portfolio-gallery-city" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="formularz.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                    </div><!-- End Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item filter-UE filter-cold">
                    <div class="portfolio-content h-100">
                        <img src="{{ asset('images/places/alpy_1.jpg') }}" class="img-fluid" alt="Obrazek">
                        <div class="portfolio-info">
                        <h4>Alpy</h4>
                        <a href="{{ asset('images/places/alpy_1.jpg') }}" title="Alpy" data-gallery="portfolio-gallery-place" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="formularz.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                    </div><!-- End Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item filter-notUE">
                    <div class="portfolio-content h-100">
                        <img src="{{ asset('images/places/NY_1.jpg') }}" class="img-fluid" alt="Obrazek">
                        <div class="portfolio-info">
                        <h4>Nowy York</h4>
                        <a href="{{ asset('images/places/NY_1.jpg') }}" title="Nowy York" data-gallery="portfolio-gallery-city" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="formularz.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                    </div><!-- End Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item filter-UE filter-cold">
                    <div class="portfolio-content h-100">
                        <img src="{{ asset('images/places/fiordy_1.jpg') }}" class="img-fluid" alt="Obrazek">
                        <div class="portfolio-info">
                        <h4>Fiordy</h4>
                        <a href="{{ asset('images/places/fiordy_1.jpg') }}" title="Fiordy" data-gallery="portfolio-gallery-place" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="formularz.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                    </div><!-- End Item -->
                    
                    <div class="col-lg-4 col-md-6 portfolio-item filter-UE filter-warm filter-cold">
                    <div class="portfolio-content h-100">
                        <img src="{{ asset('images/places/london_1.jpg') }}" class="img-fluid" alt="Obrazek">
                        <div class="portfolio-info">
                        <h4>Londyn</h4>
                        <a href="{{ asset('images/places/london_1.jpg') }}" title="Londyn" data-gallery="portfolio-gallery-city" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="formularz.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                    </div><!-- End Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item filter-UE filter-warm filter-cold">
                    <div class="portfolio-content h-100">
                        <img src="{{ asset('images/places/zakopane_1.jpg') }}" class="img-fluid" alt="Obrazek">
                        <div class="portfolio-info">
                        <h4>Zakopane</h4>
                        <a href="{{ asset('images/places/zakopane_1.jpg') }}" title="Zakopane" data-gallery="portfolio-gallery-place" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="formularz.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                    </div><!-- End Item -->
                    
                </div><!-- End Container -->

                </div>

            </div>
            </section><!-- End Our Projects Section -->

            <!-- ======= Testimonials Section ======= -->
            <section id="testimonials" class="testimonials section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                <h2>Opinie</h2>
                <p>Poznaj opinie osób, które skorzystały już z naszych usług.</p>
                </div>

                <div class="slides-2 swiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                    <div class="testimonial-wrap">
                        <div class="testimonial-item">
                        <h3>Łukasz Kowalski</h3>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                        </div>
                    </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                    <div class="testimonial-wrap">
                        <div class="testimonial-item">
                        <h3>Ola Kowalska</h3>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                        </div>
                    </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                    <div class="testimonial-wrap">
                        <div class="testimonial-item">
                        <h3>Justyna Kowalska</h3>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                        </div>
                    </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                    <div class="testimonial-wrap">
                        <div class="testimonial-item">
                        <h3>Bartosz Kowalski</h3>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                        </div>
                    </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                    <div class="testimonial-wrap">
                        <div class="testimonial-item">
                        <h3>Jan Kowalski</h3>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                        </div>
                    </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
                </div>

            </div>
            </section><!-- End Testimonials Section -->

        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer id="footer" class="footer">

        <div class="footer-content position-relative">
        <div class="container">
            <div class="row">

            <div class="col-lg-4 col-md-6">
                <div class="footer-info">
                <h3>Podróżnik</h3>
                <p>
                    ul. Nadbystrzycka 300 <br>
                    20-618 Lublin, Polska<br><br>
                    <strong>Telefon:</strong> +48 494532890<br>
                    <strong>Email:</strong> info@example.com<br>
                </p>
                </div>
            </div><!-- End footer info column-->
            </div>
        </div>
        </div>

        <div class="footer-legal text-center position-relative">
        <div class="container">
            <div class="copyright">
            &copy; Copyright <strong><span>Podróżnik</span></strong>. Wszystkie prawa zastrzeżone
            </div>
            <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
        </div>

        </footer>
        <!-- End Footer -->

        <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <div id="preloader"></div>

        <!-- Vendor JS Files -->
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/formularz.js') }}"></script>
    </body>
</html>
