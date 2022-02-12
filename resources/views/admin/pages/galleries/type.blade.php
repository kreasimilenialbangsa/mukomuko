@if($type == 'image')
    <img src="{{ $content ? asset("storage".$content) : asset("img/no_image.jpg") }}" height="120px"/>
@else
    <div class="test" data-id="{{ $id }}"><i class="fab fa-youtube"></i> YouTube</div>
@endif
