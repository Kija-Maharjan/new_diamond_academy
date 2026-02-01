<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('about', [
            'title' => 'About Us',
            'headerTitle' => 'About New Diamond Academy'
        ]);
    }

    public function edit()
    {
        return view('about-edit', [
            'title' => 'Edit About Us',
            'headerTitle' => 'Edit About Page'
        ]);
    }

    public function update(Request $request)
    {
        // Store content in file or database
        file_put_contents(storage_path('app/about_content.txt'), $request->input('content'));
        return redirect()->route('about.index')->with('success', 'About page updated successfully!');
    }
}
