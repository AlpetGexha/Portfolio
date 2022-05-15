<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    @endpush
    @push('head_scripts')
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    @endpush
    <div class="hero hero-single route bg-image" style="background-image: url({{ asset('img/overlay-bg.jpg') }})">
        <div class="overlay-mf"></div>
        <div class="heapp-layoutsro-content display-table">
            <div class="table-cell">
                <div class="container">
                    <h2 class="hero-title mb-4">{{ __('Portfolio Details') }}</h2>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Portfolio Details') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <main id="main">

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">

                                </head>

                                <body>
                                    <!-- Swiper -->
                                    <div class="swiper mySwiper mb-4">
                                        <div class="swiper-wrapper">
                                            @forelse ($portofilo->getMedia('portofilo') as  $img)
                                                <div class="swiper-slide">
                                                    <img src="{{ $img->getUrl('test') }}"
                                                        alt="{{ $portofilo->title }}">
                                                </div>
                                            @empty
                                                <span class="text-danger text-center">{{ __('No Image') }}</span>
                                            @endforelse

                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-5">
                        <div class="portfolio-info">
                            <h3>{{ __('Project information') }}</h3>
                            <ul>
                                <li><strong>Category</strong></li>
                                <li><strong>{{ __('Project date') }}</strong>: {{ $portofilo->data_created }}</li>
                                <li><strong>{{ __('Project URL') }}</strong>:
                                    <u><a href="{{ $portofilo->url }}">{{ $portofilo->url }}</a></u>
                                </li>
                            </ul>
                        </div>
                        <div class="portfolio-description">
                            <h2>{{ __('Project details') }}</h2>
                            <p>
                                {!! $portofilo->body !!}
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Details Section -->

        <!-- Swiper JS -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper(".mySwiper", {
                spaceBetween: 30,
                effect: "fade",
                loop: true,
                centeredSlides: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        </script>
</x-app-layout>
