@props(['src', 'title'])

<div class="card card-blog shadow" data-aos="zoom-in-up">
    <div class="card-img">
        <a href="#">
            <img class="img-fluid" src="{{ $img_src }}" alt="{{ $title }}">
        </a>
    </div>
    <div class="card-body">
        @if (isset($category))
            <div class="card-category-box">
                <div class="card-category">
                    <h6 class="category">{{ $category }}</h6>
                </div>
            </div>
        @endif
        <h3 class="card-title">
            <a href="{{ $href }}">
                {{ $title }}
            </a>
            {{-- <span>dsad</span> --}}
        </h3>
        <p class="card-description">
            {{ $slot }}
        </p>
    </div>
    <div class="card-footer">
        <div class="post-author">
            <a href="#">
                <img src="{{ $user_img }}" alt="" class="avatar rounded-circle">
                <span class="author">{{ $user }}</span>
            </a>
        </div>
        <div class="post-date">
            <span class="bi bi-clock"></span> {{ $time }} min
        </div>
    </div>
</div>
