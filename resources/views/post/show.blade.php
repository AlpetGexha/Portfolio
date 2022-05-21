<x-app-layout>

    <x-slot name="header">
        {{ __('Blog Posts') }}
    </x-slot>

    <style>
        .work-img {
            /* margin-bottom: 3rem; */
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            background-color: #fff;
        }

        .work-img:hover img {
            transform: scale(1.3);
        }

    </style>

    <div class="container">
        <div class="row g-3 row-cols-1 row-cols-md-3 row-cols-lg-3">
            @forelse ($posts as $post)
                <div class="col-md-6 col-lg-4">
                    <div class="card card-blog shadow" data-aos="zoom-in-up">

                        <a href="{{ route('blog.single', ['post' => $post->slug]) }}" data-gallery="portfolioGallery"
                            class="portfolio-lightbox">
                            <div class=" work-img">
                                <img class="card-img-top"
                                    src="{{ $post->getMedia('posts')->first()->getUrl('test') }}"
                                    alt="{{ $post->title }}">
                            </div>
                        </a>

                        <div class="card-body">
                            {{-- <div class="card-category-box">
                                <div class="card-category">
                                    <h6 class="category">{{Travel}}</h6>
                                </div>
                            </div> --}}
                            <h3 class="card-title">
                                <a href="{{ route('blog.single', ['post' => $post->slug]) }}">
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <p class="card-description">
                                {{ Str::limit(Str::removehtml($post->body), 100) }}
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="post-author">
                                <a href="#">
                                    <img src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}"
                                        alt="" class="avatar rounded-circle">
                                    {{ $post->user->name }}

                                </a>
                            </div>
                            <div class="post-date">
                                <i class="fas fa-calendar-alt"></i>
                                <span class="bi bi-clock"></span> {{ $post->created_at->diffForHumans() }}
                                <i class="fas fa-eye ml-2" style="margin-left: 10px;"></i>
                                <span>{{ number_format($post->views) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <span class="text-center text-danger p-5 mb-5">{{ __('Nuk ka postime') }}</span>
            @endforelse
        </div>
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
