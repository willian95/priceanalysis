<p>Han solicitado el siguiente producto: {{ $body }}</p>

<a href="{{ url('/admin/product/index')?emailresponse=\Auth::user()->email }}">Crear producto</a>
