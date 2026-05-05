<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FontController extends Controller
{
    public function index(Request $request)
    {
        $font = session('font', 'Poppins');

        return view('home', compact('font'));
    }

   public function changeFont(Request $request)
{
    $request->validate([
        'font' => 'required|string'
    ]);

    session(['font' => $request->font]);

    return redirect('/')->with('success', 'Font updated successfully!');
}
}