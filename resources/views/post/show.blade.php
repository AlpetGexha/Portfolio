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
        <div class="row">
            @forelse ($posts as $post)
                <div class="col-md-4">
                    <div class="card card-blog shadow" data-aos="zoom-in-up">

                        <a href="{{ route('blog.single', ['post' => $post->slug]) }}" data-gallery="portfolioGallery"
                            class="portfolio-lightbox">
                            <div class=" work-img">
                                <img class="img-fluid" src="{{ $post->getMedia('posts')->first()->getUrl() }}"
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
                                <a href="">
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
                                    <img src="https://images.unsplash.com/photo-1547394765-185e1e68f34e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                                        alt="" class="avatar rounded-circle">
                                    .

                                </a>
                            </div>
                            <div class="post-date">
                                <span class="bi bi-clock"></span> 10 min
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
