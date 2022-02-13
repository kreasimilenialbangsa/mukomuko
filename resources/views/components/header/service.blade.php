<div>
    @foreach($services as $service)
        <a class="dropdown-item" href="{{ route('service.index', $service->slug) }}">{{ $service->title }}</a>
    @endforeach
</div>