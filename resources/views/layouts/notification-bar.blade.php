

<div class="notification-bar dropshadow-4">

    @if (isset($errors) && $errors->any())
    <div class="alert__wrapper alert__error" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li class="paragraph-semibold-16__light alert__item">{!! $error !!}</li>
            @endforeach
        </ul>
        {{ session('status') }}
    </div>
    @endif

    @if (session()->has('success'))
    <div class="alert__wrapper alert__succes" role="alert">
        <ul>
            @foreach(session()->get('success') as $message)
            <li class="paragraph-semibold-16__light alert__item">{!! $message !!}</li>
            @endforeach
        </ul>
        {{ session('status') }}
    </div>
    @endif

</div>