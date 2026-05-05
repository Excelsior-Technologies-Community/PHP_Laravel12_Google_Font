@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">Google Fonts Manager 🎨</h1>

<p class="mb-6 text-gray-600">
Choose your preferred font style and see live preview.
</p>

<form method="POST" action="{{ route('change.font') }}" class="mb-6">
    @csrf

    <select id="fontSelector" name="font" class="border p-2 rounded w-full mb-3">
    <option value="Poppins">Poppins</option>
    <option value="Playfair Display">Playfair Display</option>
    <option value="Roboto">Roboto</option>
</select>

    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Apply Font
    </button>
</form>

<hr class="my-6">

<h2 class="text-xl font-semibold mb-3">Preview Section</h2>

<p class="mb-2">The quick brown fox jumps over the lazy dog.</p>

<p class="font-light">Light Text</p>
<p class="font-normal">Normal Text</p>
<p class="font-medium">Medium Text</p>
<p class="font-semibold">Semi Bold Text</p>
<p class="font-bold">Bold Text</p>

@endsection


<script>
const fontSelector = document.getElementById('fontSelector');

fontSelector.addEventListener('change', function () {
    document.body.style.setProperty('--app-font', this.value);
});
</script>