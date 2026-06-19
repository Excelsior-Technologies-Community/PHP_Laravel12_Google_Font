<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FontController extends Controller
{
    public function index(Request $request)
    {
        $currentFont = session('font', 'Poppins');
        $favorites = Session::get('favorites', []);
        
        $fonts = ['Roboto', 'Open Sans', 'Lato', 'Poppins', 'Montserrat', 'Inter', 'Raleway'];

        return view('home', compact('currentFont', 'fonts', 'favorites'));
    }

    public function preview(Request $request)
    {
        $fonts = ['Roboto', 'Open Sans', 'Lato', 'Poppins', 'Montserrat', 'Inter', 'Raleway'];
        $favorites = Session::get('favorites', []);

        return view('fonts.preview', compact('fonts', 'favorites'));
    }

    public function changeFont(Request $request)
    {
        $request->validate([
            'font' => 'required|string'
        ]);

        session(['font' => $request->font]);

        return redirect('/')->with('success', 'Font updated successfully!');
    }

    public function toggleFavorite(Request $request)
    {
        $request->validate([
            'font' => 'required|string'
        ]);

        $font = $request->font;
        $favorites = Session::get('favorites', []);

        if (in_array($font, $favorites)) {
            $favorites = array_diff($favorites, [$font]);
        } else {
            $favorites[] = $font;
        }

        Session::put('favorites', $favorites);

        return response()->json(['status' => 'success', 'favorites' => $favorites]);
    }
}