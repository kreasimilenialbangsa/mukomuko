<div>
    @if(!empty($notice))
    <div class="slider-header">
        @foreach($notice as $row)
            <div>
                <div class="bg-green">
                <span class="mb-2">
                    <span class="headline">KABAR TERBARU!</span>
                    {{ $row->title }}
                    <a href="{{ route('program.detail', $row->slug) }}" class="view-more">Lihat disini</a>
                </span>
                </div>
            </div>
        @endforeach
      </div>
      @endif
</div>