<div>
    @foreach($abouts as $about)
        <a class="dropdown-item" href="{{ route('about.index', $about->slug) }}">{{ $about->title }}</a>
    @endforeach
</div>