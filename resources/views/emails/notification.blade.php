<p>{{ $body }}</p>

@if(isset($link))
    @if($link != "")
        <a href="{{ $link }}">Ver publicación</a>
    @endif
@endif