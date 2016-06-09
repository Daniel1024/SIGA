@if($errors->has())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @if ($errors->count() == 1)
            <p><strong>Corrija el siguiente error:</strong></p>
        @else
            <p><strong>Corrija los siguientes errores:</strong></p>
        @endif
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('correcto'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ session('correcto') }}
    </div>
@endif