@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-6">Google Fonts Manager 🎨</h1>

<form method="POST" action="{{ route('fonts.change') }}" class="mb-6">
    @csrf
    <select name="font" class="border p-2 rounded w-full mb-3" onchange="this.form.submit()">
        @foreach(['Poppins', 'Playfair Display', 'Roboto'] as $f)
            <option value="{{ $f }}" {{ session('font') == $f ? 'selected' : '' }}>{{ $f }}</option>
        @endforeach
    </select>
</form>

<div class="flex gap-4 mb-6">
    <button onclick="copyCSS()" class="bg-gray-800 text-white px-4 py-2 rounded">Copy CSS</button>
    <button onclick="toggleFav()" class="text-2xl" id="favBtn">♥</button>
</div>

<div class="space-y-4 text-gray-800">
    <p>Current Font: <span id="fontName">{{ session('font', 'Poppins') }}</span></p>
    <p class="text-2xl">The quick brown fox jumps over the lazy dog.</p>
</div>

<script>
    function copyCSS() {
        const font = document.getElementById('fontName').innerText;
        const css = `font-family: '${font}', sans-serif;`;
        navigator.clipboard.writeText(css);
        alert("CSS Copied!");
    }

    function toggleFav() {
        const font = document.getElementById('fontName').innerText;
        fetch("{{ route('fonts.favorite') }}", {
            method: 'POST',
            headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            body: JSON.stringify({font: font})
        }).then(() => {
            document.getElementById('favBtn').classList.toggle('fav-active');
        });
    }
</script>
@endsection