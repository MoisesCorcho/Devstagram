@auth
<nav class="flex gap-2 items-center">
    <a
        class="flex items-center gap-2 bg-white border p-2 text-black rounded text-sm uppercase font-bold cursor-pointer"
        href="{{ route('posts.create') }}"
    >

         <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
      </svg>
        Crear
    </a>

    <a
        class="font-bold text-white text-sm"
        href="{{ route('posts.index', auth()->user()->username ) }}"
    >
        Hola:
        <span class="font-normal">
            {{ auth()->user()->username }}
        </span>
    </a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="font-bold uppercase text-white text-sm" >
            Cerrar Sesión
        </button>
    </form>
</nav>
@endauth

@guest
<nav class="flex gap-2 items-center">
    <a class="font-bold uppercase text-gray-600 text-sm text-white" href="{{ route('login') }}">Login</a>
    <a href="{{ route('register') }}" class="font-bold uppercase text-white text-sm" >
        Crear Cuenta
    </a>
</nav>
@endguest
