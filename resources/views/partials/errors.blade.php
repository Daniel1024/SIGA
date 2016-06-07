@if($errors->has())
    <div class="alert alert-danger" role="alert">
        @if ($errors->count() == 1)
            <p>Corrija el siguiente error:</p>
        @else
            <p>Corrija los siguientes errores:</p>
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