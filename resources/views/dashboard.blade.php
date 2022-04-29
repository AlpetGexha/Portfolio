<x-app-layout>

    <section id="ballina" class="hero route bg-image" style="background-image: url()">
        <div class="overlay-itro"></div>
        <div class="hero-content display-table">
            <div class="table-cell">
                <div class="container">
                    {{-- <p class="display-6 color-d">Hello, world!</p> --}}
                    <h1 class="hero-title mb-4"  data-aos="zoom-in">{{ __('I am Alpet Gexha') }}</h1>
                    <p class="hero-subtitle">
                        <span class="typed" id="typed"
                            data-typed-items="Web Developer, Web Designer, Freelancer">
                        </span>
                    </p>
                    <p class="pt-3">
                        <a class="btn btn-primary btn js-scroll px-4" href="#about">{{__('Learn More')}}</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about-mf sect-pt4 route" data-aos="zoom-in-up">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-shadow-full">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-5">
                                            <div class="about-img">
                                                <img src="{{ asset('svg/agexha.svg') }}" width='200'
                                                    class="img-fluid rounded b-shadow-a" alt="Nuk ka">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-7">
                                            <div class="about-info">
                                                {{-- @dd($about) --}}
                                                @forelse ($about as $a)
                                                    <p>
                                                        <span class="title-s">{{ __('Name:') }} </span>
                                                        <span>{{ $a->name }} </span>
                                                    </p>
                                                    <p>
                                                        <span class="title-s">{{ __('Profile:') }} </span>
                                                        <span>{{ $a->profile }} </span>
                                                    </p>
                                                    <p>
                                                        <span class="title-s">{{ __('Email:') }} </span>
                                                        <span>{{ $a->email }} </span>
                                                    </p>
                                                    <p>
                                                        <span class="title-s">{{ __('Phone:') }} </span>
                                                        <span>{{ $a->phone }}</span>
                                                    </p>
                                                @empty
                                                    <span
                                                        class="text-danger text-center">{{ __('Nuk ka rezultat') }}</span>
                                                @endforelse

                                            </div>
                                        </div>
                                    </div>
                                    <div class="skill-mf">
                                        <p class="title-s">{{ __('Skills') }}</p>

                                        @foreach ($skills as $item)
                                            @foreach ($item as $s)
                                                <span class="lead"><b>{{ $s->name }} </b></span>
                                                <span class="pull-right">{{ $s->percentage }}%</span>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: {{ $s->percentage }}%;"
                                                        aria-valuenow="{{ $s->percentage }}" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="about-me pt-4 pt-md-0">
                                        <div class="title-box-2">
                                            <h5 class="title-left">
                                                {{ __('About me') }}
                                            </h5>
                                        </div>
                                        @forelse ($about as $a)
                                            <div class="lead"> {!! $a->body !!}</div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services-mf pt-5 route">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box text-center">
                            <h3 class="title-a" data-aos="zoom-in">
                                {{ __('Services') }}
                            </h3>
                            <p class="subtitle-a">
                                {{-- Lorem ipsum, dolor sit amet consectetur adipisicing elit. --}}
                            </p>
                            <div class="line-mf"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @forelse ($services as $service)
                        @foreach ($service as $item)
                            <div class="col-md-4" data-aos="flip-down">
                                <div class="service-box">
                                    <div class="service-ico">
                                        <span class="ico-circle"><i class="{{ $item->icon }}"></i></span>
                                    </div>
                                    <div class="service-content">
                                        <h2 class="s-title">{{ $item->experience }}</h2>
                                        <p class="s-description text-center">
                                            {!! $item->body !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @empty
                        <span class="text-danger text-center">Nuk ka rezultat</span>
                    @endforelse

                </div>
            </div>

            <!-- ======= Facts Section======= -->

            <div class="section-counter paralax-mf bg-image" style="background-image: url('img/server.jpg')">
                <div class="overlay-mf"></div>
                <div class="container position-relative">
                    <div class="row align-self-center mt-5" data-aos="zoom-out-down">
                        {{-- @dd(collect($facts) --}}
                        @foreach ($facts as $item)
                            @foreach ($item as $fact)
                                <div class="col-sm-3 col-lg-3">
                                    <div class="counter-box counter-box pt-4 pt-md-0">
                                        <div class="counter-ico">
                                            <span class="ico-circle"><i class="{{ $fact->icon }}"></i></span>
                                        </div>
                                        <div class="counter-num">
                                            <p class="count">
                                                {{ $fact->count }}
                                            </p>
                                            <span class="counter-text">{{ str($fact->title)->upper() }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach

                    </div>
                </div>
            </div>
        </section><!-- End Services Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portofilo" class="portfolio-mf sect-pt4 route">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box text-center">
                            <h3 class="title-a" data-aos="zoom-in">
                                {{ __('Portfolio') }}
                            </h3>
                            <p class="subtitle-a">
                                {{-- Lorem ipsum, dolor sit amet consectetur adipisicing elit. --}}
                            </p>
                            <div class="line-mf"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="work-box" data-aos="zoom-in">
                            <a href="#" data-gallery="portfolioGallery" class="portfolio-lightbox">
                                <div class="work-img">
                                    <img src="https://images.unsplash.com/photo-1650272808082-808982c3cbfc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1633&q=80"
                                        alt="" class="img-fluid">
                                </div>
                            </a>
                            <div class="work-content">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h2 class="w-title">Lorem impsum dolor</h2>
                                        <div class="w-more">
                                            <span class="w-ctegory">Web Design</span> / <span
                                                class="w-date">18 Sep. 2018</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="w-like">
                                            <a href="portfolio-details.html"> <span
                                                    class="bi bi-plus-circle"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

        </section><!-- End Portfolio Section -->

        <!-- ======= Testimonials Section ======= -->
        {{-- <div class="testimonials paralax-mf bg-image" style="background-image: url(assets/img/overlay-bg.jpg)">
            <div class="overlay-mf"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide">
                                    <div class="testimonial-box">
                                        <div class="author-test">
                                            <img src="assets/img/testimonial-2.jpg" alt=""
                                                class="rounded-circle b-shadow-a">
                                            <span class="author">Xavi Alonso</span>
                                        </div>
                                        <div class="content-test">
                                            <p class="description lead">
                                                Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Lorem
                                                ipsum dolor sit amet,
                                                consectetur adipiscing elit.
                                            </p>
                                        </div>
                                    </div>
                                </div><!-- End testimonial item -->

                                <div class="swiper-slide">
                                    <div class="testimonial-box">
                                        <div class="author-test">
                                            <img src="assets/img/testimonial-4.jpg" alt=""
                                                class="rounded-circle b-shadow-a">
                                            <span class="author">Marta Socrate</span>
                                        </div>
                                        <div class="content-test">
                                            <p class="description lead">
                                                Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Lorem
                                                ipsum dolor sit amet,
                                                consectetur adipiscing elit.
                                            </p>
                                        </div>
                                    </div>
                                </div><!-- End testimonial item -->
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>

                        <!-- <div id="testimonial-mf" class="owl-carousel owl-theme">

            </div> -->
                    </div>
                </div>
            </div>
        </div><!-- End Testimonials Section --> --}}

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog-mf sect-pt4 route">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box text-center">
                            <h3 class="title-a" data-aos="zoom-in">
                                {{ __('Blog') }}
                            </h3>
                            <p class="subtitle-a">
                                {{-- Lorem ipsum, dolor sit amet consectetur adipisicing elit. --}}
                            </p>
                            <div class="line-mf"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="owl-carousel owl-theme">

                        <div class="card card-blog shadow" data-aos="zoom-in-up">
                            <div class="card-img">
                                <a href="#">
                                    <img class="img-fluid"
                                        src="https://images.unsplash.com/photo-1547394765-185e1e68f34e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                                        alt="">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="card-category-box">
                                    <div class="card-category">
                                        <h6 class="category">Travel</h6>
                                    </div>
                                </div>
                                <h3 class="card-title">
                                    <a href="blog-single.html">
                                        See more ideas about Travel
                                    </a>
                                </h3>
                                <p class="card-description">
                                    Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus. Praesent
                                    sapien massa, convallis
                                    a pellentesque nec,
                                    egestas non nisi.
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="post-author">
                                    <a href="#">
                                        <img src="https://images.unsplash.com/photo-1547394765-185e1e68f34e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                                            alt="" class="avatar rounded-circle">
                                        <span class="author">Morgan Freeman</span>
                                    </a>
                                </div>
                                <div class="post-date">
                                    <span class="bi bi-clock"></span> 10 min
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Blog Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="paralax-mf footer-paralax bg-image sect-mt4 route"
            style="background-image: url(https://images.unsplash.com/photo-1518770660439-4636190af475?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80)">
            <div class="overlay-mf"></div>
            <div class="container">
                <x-alert />
                <div class="row">
                    <div class="col-sm-12">
                        <div class="contact-mf ">
                            <div id="contact" class="box-shadow-full shadow-lg rounded " data-aos="zoom-in">
                                <div class="row">
                                    <div class="col-lg-7" data-aos="fade-down-right" data-aos-duration="1200"
                                        data-aos-duration="600">
                                        <div class="title-box-2">
                                            <h5 class="title-left">
                                                {{ __(' Send Message') }}
                                            </h5>
                                        </div>
                                        <div>
                                            <livewire:admin.contact.create />
                                        </div>
                                    </div>
                                    <div class="col-lg-5" data-aos="fade-down-left" data-aos-duration="1200"
                                        data-aos-duration="600">
                                        <div class="title-box-2 pt-4 pt-md-0">
                                            <h5 class="title-left">
                                                {{ __('Get in Touch') }}
                                            </h5>
                                        </div>
                                        <div class="more-info">
                                            <p class="lead">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis dolorum
                                                dolorem soluta quidem
                                                expedita aperiam aliquid at.
                                                Totam magni ipsum suscipit amet? Autem nemo esse laboriosam ratione
                                                nobis
                                                mollitia inventore?
                                            </p>
                                            <ul class="list-ico">
                                                <li>
                                                    <span class="fa-solid fa-location-dot"> Mir osht mes me dit</span>
                                                </li>
                                                <li>
                                                    <span class="fa-solid fa-phone"></span> (+383) 44 567-561
                                                </li>

                                                <li><span class="fa-solid fa-envelope"></span> agexha@gmail.com</li>
                                            </ul>
                                        </div>
                                        <div class="socials">
                                            <ul>
                                                <li>
                                                    <a href="" title="Facebook">
                                                        <span class="ico-circle">
                                                            <i class="fa-brands fa-facebook"></i>
                                                        </span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#" title="Instagram">
                                                        <span class="ico-circle">
                                                            <i class="fa-brands fa-instagram"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Twitter">
                                                        <span class="ico-circle">
                                                            <i class="fa-brands fa-twitter"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ config('social.linkedin') }}" title="Linkedin">
                                                        <span class="ico-circle">
                                                            <i class="fa-brands fa-linkedin"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->

        @push('styles')
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
                integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
                crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
                integrity="sha512-sMXtMNL1zRzolHYKEu    M2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
                crossorigin="anonymous" referrerpolicy="no-referrer" />
        @endpush

        @push('head_scripts')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
                        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
                        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @endpush
        <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
        <script>
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,

                animateOut: 'slideOutDown',
                animateIn: 'flipInX',

                autoplay: true,
                autoplayTimeout: 3400, //3.4s
                autoplayHoverPause: true,

                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            })
        </script>
</x-app-layout>
