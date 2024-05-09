<form method="POST" action="{{ route('login') }}" novalidate>
    @csrf

    @if(session('mensaje'))
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
            {{ session('mensaje') }}
        </p>
    @endif

    <x-form.input name="email" type="email" placeholder="Correo electrónico">
    </x-form.input>

    <x-form.input name="password" type="password" placeholder="Contraseña">
    </x-form.input>

    <div class="mb-5">
        <input type="checkbox" name="remember"> <label class="text-white text-sm">Mantener mi sesión abierta</label>
    </div>

    <x-form.button type="submit" value="Entrar">
    </x-form.button>

</form>
