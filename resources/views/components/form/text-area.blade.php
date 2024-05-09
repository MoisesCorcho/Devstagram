<div class="mb-5">
    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror placeholder-gray-300 text-white bg-gray-900 border-gray-600 focus:outline-none focus:ring focus:ring-blue-900"
    ></textarea>

    @error( $name )
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
    @enderror
</div>
