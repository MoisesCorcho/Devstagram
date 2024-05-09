<div class="mb-2">
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        placeholder="{{ $placeholder }}"
        class="border p-3 w-full rounded-lg @error($name) border-red-500 @enderror bg-gray-900 placeholder-gray-300 text-white border-gray-700 focus:outline-none focus:ring focus:ring-blue-900"
        value="{{ old($name) }}"
    />
    @error( $name )
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
    @enderror
</div>

