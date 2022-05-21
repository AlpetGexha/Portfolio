<x-app-layout>

    <x-slot name="header">
        {{ __('Post / ' . $post->title) }}
    </x-slot>

    {{-- {{ $post }} --}}

    <style>
        pre {
            background-color: #1f2937;
            border-radius: 0.375rem;
            color: #e5e7eb;
            font-size: .875em;
            font-weight: 400;
            line-height: 1.7142857;
            margin-bottom: 1.7142857em;
            margin-top: 1.7142857em;
            overflow-x: auto;
            padding: 0.8571429em 1.1428571em;
        }

        .post-info img {
            width: 100%;
        }

    </style>

    <div class="row">
        <div class="col-md-1">
            {{-- <div class="widget-sticky">
                @can('post_edit')
                    <a href="{{ route('post.edit', ['post' => $post->slug]) }}" class="btn btn-primary btn-sm mb-2">
                        <i class="fas fa-edit"></i>
                        {{ __('Ndrysho Postimin') }}
                    </a>
                @endcan

                <button title="kopjo linkun" href="javascript:;" class="btn btn-info btn-sm mt-1" type="button"
                    onclick="CopyUrl();">
                    {{ __('Kopjo Linkun') }}
                </button>
            </div> --}}
        </div>
        <div class="col-md-10 post-info card">
            <div class="card-body">
                <h1 style="font-size: 55px"> {{ $post->title }}</h1>
                <ul>
                    <li>
                        <i class="fa-solid fa-user"></i>
                        <a href="#">{{ $post->user->name }}</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-eye"></i>
                        {{ $post->views . __(' views') }}
                    </li>
                    <li>
                        <i class="fa-solid fa-book-open-reader"></i>
                        {{ str()->readTime(str()->removehtml($post->body)) . ' min Read' }}
                    </li>
                </ul>

                <div class="single_post_info_show">
                    <img class="rounded mx-auto d-block shadow" style="width: auto; height: 450px;"
                        src="{{ $post->getMedia('posts')->first()->getUrl() }}" alt="{{ $post->title }}">
                </div>

                <article class="mt-3">
                    {!! $post->body !!}
                </article>
            </div>
            {{-- <div class="col-md-2">
                <div class="widget-sticky">
                    <p>{{ __('Kategorit') }}</p>
                    {{-- @forelse ($postCategorys as $postCategory)
                    <a href="{{ route('category.single', ['category' => $postCategory->category->slug]) }}"
                        class="badge bg-primary text-wrap">{{ $postCategory->category->title }}</a>
                @empty
                @endforelse --}}

            {{-- <p> {{ __('Postimet e ngjajshme') }} </p>
                @forelse ($relatePosts as $relatePost)
                    <a class="badge bg-primary text-wrap" href="{{ $relatePost->slug }}">
                        {{ $relatePost->title }}</a>
                @empty
                @endforelse --}}
            {{-- <h3>Tags: </h3>
                </div> --}}
        </div>
    </div>
    </div>

    <div class="komenti">
        <section class="mb-5">
            {{-- <livewire:post.comments :id="$post->id" /> --}}
        </section>
    </div>

    {{-- Progress bar --}}
    <script>
        window.onscroll = function() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            document.getElementById("myBar").style.width = scrolled + "%";
        };
    </script>

    {{-- Copy Url --}}
    <script>
        function CopyUrl() {
            var dummy = document.createElement('input'),
                text = window.location.href;
            document.body.appendChild(dummy);
            dummy.value = text;
            dummy.select();
            document.execCommand('copy');
            document.body.removeChild(dummy);

        }
    </script>
    <style>
        .post-info ul li {
            display: inline-block;
            margin-right: 10px;
        }

        /* .post-info ul {
            border-left: 4px solid #0078ff;
            margin-top: 1rem;
        }

        .post-info ul li {
            display: inline-block;
            margin-left: 15px;
        }

        .post-info ul a {
            color: #0078ff;
        }

        .post-info ul span {
            color: #1e1e1e;
        } */

    </style>

</x-app-layout>
