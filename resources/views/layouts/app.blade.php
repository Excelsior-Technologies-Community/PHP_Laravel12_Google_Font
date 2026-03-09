<!DOCTYPE html>
<html>
<head>

<title>Laravel Google Fonts Demo</title>

{{-- Load Google Fonts --}}
@googlefonts
@googlefonts('heading')

<style>

body{
    font-family: 'Poppins', sans-serif;
    padding:40px;
    background:#f9fafb;
}

h1{
    font-family: 'Playfair Display', serif;
    color:#1f2937;
}

</style>

</head>

<body>

@yield('content')

</body>
</html>