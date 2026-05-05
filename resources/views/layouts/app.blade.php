<!DOCTYPE html>
<html>
<head>
    <title>Laravel Google Fonts Demo</title>

    @googlefonts('poppins')
    @googlefonts('playfair')
    @googlefonts('roboto')

    <script src="https://cdn.tailwindcss.com"></script>

 <style>
    body{
        font-family: var(--app-font, 'Poppins'), sans-serif;
        background: linear-gradient(to right, #f8fafc, #e2e8f0);
    }

    h1{
        font-family: 'Playfair Display', serif;
    }
</style>
</head>

<body class="p-10" style="--app-font: '{{ session('font', 'Poppins') }}'">

<div class="max-w-4xl mx-auto bg-white p-8 rounded-2xl shadow-lg">

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

</div>

</body>
</html>