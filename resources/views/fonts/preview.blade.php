@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">Font Preview & CSS Generator</h2>
    
    <input type="text" id="previewText" placeholder="Type here to preview..." 
           class="w-full p-4 mb-8 border-2 border-blue-200 rounded-xl shadow-sm focus:border-blue-500 outline-none transition" 
           oninput="updatePreview(this.value)">

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($fonts as $font)
        <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition border border-gray-100" id="card-{{ $font }}">
            <h3 style="font-family: '{{ $font }}', sans-serif;" class="preview-text text-xl mb-4 h-16 overflow-hidden">Sample Text: {{ $font }}</h3>
            
            <div class="flex gap-2">
                <button onclick="generateCSS('{{ $font }}')" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700">Copy CSS</button>
                <button onclick="toggleFav('{{ $font }}')" class="border px-4 py-2 rounded-lg text-sm {{ in_array($font, $favorites) ? 'bg-red-100 border-red-300 text-red-600' : 'border-gray-300' }}">
                    ♥
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    function updatePreview(val) {
        document.querySelectorAll('.preview-text').forEach(el => el.innerText = val || 'Sample Text');
    }

    function generateCSS(font) {
        const css = `font-family: '${font}', sans-serif;`;
        navigator.clipboard.writeText(css);
        alert("CSS Copied: " + css);
    }

    function toggleFav(font) {
        fetch('/toggle-favorite', {
            method: 'POST',
            headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            body: JSON.stringify({font: font})
        }).then(() => location.reload());
    }
</script>
@endsection