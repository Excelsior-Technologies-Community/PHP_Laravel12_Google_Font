# PHP_Laravel12_Google_Font

## Introduction

PHP_Laravel12_Google_Font is a Laravel 12 demo project that demonstrates
how to integrate and self-host Google Fonts using the **Spatie Laravel
Google Fonts** package.

Normally, when we use Google Fonts, the font files are loaded directly from Google's servers. This package allows Laravel applications to:

- Download Google Fonts locally

- Serve fonts from the Laravel application

- Improve website performance

- Reduce external requests

- Increase privacy

The package automatically fetches the font CSS from Google and stores the font files locally in the Laravel storage folder.


------------------------------------------------------------------------

## Project Overview

This project demonstrates:

-   Installing a Laravel package
-   Configuring Google Fonts
-   Fetching fonts locally
-   Using Blade directives
-   Serving fonts efficiently in Laravel 12

------------------------------------------------------------------------

## Step 1 --- Create Laravel 12 Project

Open terminal and run:

``` bash
composer create-project laravel/laravel PHP_Laravel12_Google_Font "12.*"
```

Move inside the project:

``` bash
cd PHP_Laravel12_Google_Font
```

Run the development server:

``` bash
php artisan serve
```

Open in browser:

```bash
http://127.0.0.1:8000
```

------------------------------------------------------------------------

## Step 2 --- Install Google Fonts Package

Install the Spatie Google Fonts package using Composer.

``` bash
composer require spatie/laravel-google-fonts
```

This package will automatically register the service provider.

------------------------------------------------------------------------

## Step 3 --- Publish Configuration File

Publish the configuration file:

``` bash
php artisan vendor:publish --provider="Spatie\GoogleFonts\GoogleFontsServiceProvider" --tag="google-fonts-config"
```

This command will create:

```bash
config/google-fonts.php
```

------------------------------------------------------------------------

## Step 4 --- Configure Fonts

Open the configuration file:

```bash
config/google-fonts.php
```

Update the fonts array.

``` php
<?php

return [

    'fonts' => [

        'default' => 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap',

        'heading' => 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap',
    ],

    'disk' => 'public',

    'path' => 'fonts',

    'inline' => true,

    'preload' => false,

    'fallback' => ! env('APP_DEBUG'),

];
```

------------------------------------------------------------------------

## Step 5 --- Create Storage Link

Fonts are stored in the public storage disk.

Run:

``` bash
php artisan storage:link
```

This will create:

```
public/storage → storage/app/public
```
This allows the browser to access locally stored fonts.

------------------------------------------------------------------------

## Step 6 --- Prefetch Google Fonts

To download the fonts locally run:

``` bash
php artisan google-fonts:fetch
```

This command will:

-   Download font files
-   Store them locally
-   Cache them for faster loading

------------------------------------------------------------------------

## Step 7 --- Create Layout File

Create layout:

```bash
resources/views/layouts/app.blade.php
```

Add:

``` blade
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
```

------------------------------------------------------------------------

## Step 8 --- Create Blade File

Create:

```bash
resources/views/home.blade.php
```

Add:

```blade
@extends('layouts.app')

@section('content')

<h1>Laravel Google Fonts Demo</h1>

<p>
This project demonstrates how to load Google Fonts locally using the Spatie Laravel Google Fonts package.
</p>

<hr>

<h2 style="font-family:'Playfair Display', serif;">Playfair Display Heading Example</h2>

<p style="font-weight:300;">Poppins Light (300)</p>

<p style="font-weight:400;">Poppins Regular (400)</p>

<p style="font-weight:500;">Poppins Medium (500)</p>

<p style="font-weight:600;">Poppins SemiBold (600)</p>

<p style="font-weight:700;">Poppins Bold (700)</p>

@endsection
```

------------------------------------------------------------------------

## Step 9 --- Create Route

Open:

```bash
routes/web.php
```

Add:

``` php
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
```

------------------------------------------------------------------------

## Step 10 --- Run Project

Start the server:

``` bash
php artisan serve
```

Open:

```bash
http://127.0.0.1:8000
```

You will see the page rendered with Google Fonts loaded locally.

------------------------------------------------------------------------

## Output

<img width="1919" height="1027" alt="Screenshot 2026-03-09 111540" src="https://github.com/user-attachments/assets/a185c996-c4a2-4d1f-979a-857fbd75a9bc" />

------------------------------------------------------------------------

## Project Structure

```
PHP_Laravel12_Google_Font
│
├── app
│
├── bootstrap
│
├── config
│   └── google-fonts.php
│
├── database
│
├── public
│   └── storage
│       └── fonts
│
├── resources
│   └── views
│       │
│       ├── layouts
│       │   └── app.blade.php
│       │
│       └── home.blade.php
│
├── routes
│   └── web.php
│
├── storage
│   └── app
│       └── public
│           └── fonts
│
├── vendor
│
└── artisan
```

------------------------------------------------------------------------

Your PHP_Laravel12_Google_Font Project is now ready!


