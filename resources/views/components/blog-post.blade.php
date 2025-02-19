<article class="pb-5 pt-sm-1 mb-lg-3 mb-xl-4">
    <a href="{{ route('blogs.show', $post->slug) }}">
        <img class="rounded-5" src="{{ asset('assets/' . $post->cover) }}" alt="{{ $post->title }}">
    </a>
    <h2 class="h3 pt-3 mt-2 mt-md-3">
        <a href="{{ route('blogs.show', $post->slug) }}">{{ $post->title }}</a>
    </h2>
    <p>{!! $post->content !!}</p>
    <div class="d-flex flex-wrap align-items-center pt-1 mt-n2">
        <a class="nav-link text-body-secondary fs-sm fw-normal p-0 mt-2 me-3" href="#">
            {{ $post->formatted_share_count }} <i class="ai-share fs-lg ms-1"></i>
        </a>
        <a class="nav-link text-body-secondary fs-sm fw-normal d-flex align-items-end p-0 mt-2" href="#">
            {{-- Tampilkan jumlah komentar --}}
            {{-- @if ($post->comments)
                {{ $post->comments->count() }}
            @endif --}}
            {{-- Atau --}}
            {{-- {{ $post->comments()->count() }} --}}
            {{-- <i class="ai-message fs-lg ms-1"></i> --}}
        </a>

        <span class="fs-xs opacity-20 mt-2 mx-3">|</span>
        <span class="fs-sm text-body-secondary mt-2">{{ $post->created_at_human }}</span>
        <span class="fs-xs opacity-20 mt-2 mx-3">|</span>
        <a class="badge text-nav fs-xs border mt-2" href="#">Fashion</a>
    </div>
</article>
