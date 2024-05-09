@extends('layouts.app')

@section('titulo')
    Crea una nueva Publicación
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form
                action="{{ route('images.store') }}"
                method="POST"
                enctype="multipart/form-data"
                id="dropzone"
                class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 p-10 bg-gray-800 rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{ route('posts.store') }}" method="POST" novalidate>
                @csrf

                <x-Form.Input name="titulo" type="text" placeholder="Titulo de la Publicación">
                </x-Form.Input>

                <x-Form.TextArea name="descripcion" label="Descripción" placeholder="Descripción de la Publicación">
                </x-Form.TextArea>

                {{-- El valor a esta input oculta se asigna en el archivo JS ubicado en resources/js/app.js --}}
                <x-Form.Input name="imagen" type="hidden">
                </x-Form.Input>

                <x-Form.Button type="submit" value="Crear Publicación">
                </x-Form.Button>

            </form>
        </div>
    </div>
@endsection
