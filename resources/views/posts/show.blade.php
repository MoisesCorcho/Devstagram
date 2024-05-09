@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">


            <div class="p-3 flex items-center gap-4">
                @auth
                    <livewire:like-post :post="$post"/>
                @endauth
            </div>

            <div>
                <p class="font-bold text-gray-200"> {{ $post->user->username }} </p>
                <p class="text-sm text-gray-400">
                    {{ $post->created_at->diffForHumans() }}
                </p>
                <p class="mt-5 text-gray-200">
                    {{ $post->descripcion }}
                </p>
            </div>

            @auth
                @if($post->user_id === auth()->user()->id )
                    <form method="POST" action="{{ route('posts.destroy', $post) }}">
                        @method('DELETE')
                        @csrf
                        <input
                            type="submit"
                            value="Eliminar Publicación"
                            class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer"
                        />
                    </form>
                @endif
            @endauth
        </div>

        <div class="md:w-1/2 p-5">

            <div class="shadow bg-gray-800 p-5 mb-5">

                @auth
                    <p class="text-xl font-bold text-center mb-4 text-gray-200">Agrega un Nuevo Comentario</p>

                    @if(session('message'))
                        <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                            {{session('message')}}
                        </div>
                    @endif


                    <form action="{{ route('comments.store', ['post' => $post, 'user' => $user ]) }}" method="POST">
                        @csrf

                        <x-Form.TextArea name="comment" placeholder="Agrega un Comentario">
                        </x-Form.TextArea>

                        <x-Form.Button type="submit" value="Comentar">
                        </x-Form.Button>

                    </form>
                @endauth

                <x-listar-comentarios :post="$post" />

            </div>
        </div>
    </div>
@endsection


