<form method="POST" action="{{ route('register') }}" novalidate>
    @csrf

    @if(session('mensaje'))
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
            {{ session('mensaje') }}
        </p>
    @endif

    <x-form.input name="name" type="email" placeholder="Nombre completo">
    </x-form.input>

    <x-form.input name="username" type="text" placeholder="Nombre de usuario">
    </x-form.input>

    <x-form.input name="email" type="email" placeholder="Correo electrónico">
    </x-form.input>

    <x-form.input name="password" type="password" placeholder="Contraseña">
    </x-form.input>

    <x-form.input name="password_confirmation" type="password" placeholder="Repite Contraseña">
    </x-form.input>

    <x-form.button type="submit" value="Crear Cuenta">
    </x-form.button>

</form>
