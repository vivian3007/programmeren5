<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Drawing;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('home');
    }

    public function drawings()
    {
        $drawings = Drawing::all();

        return view('drawings', [
            'drawings' => $drawings
        ]);
    }

    public function search(Request $request)
    {
        $categories = Category::all();

        $searchedWord = $request->input('item');

        $drawings = Drawing::latest()
            ->where('name', 'like', '%' . $searchedWord . '%')
            ->orWhere('materials', 'like', '%' . $searchedWord . '%')
            ->orWhere('details', 'like', '%' . $searchedWord . '%')
//            ->orWhere('image', 'like', '%' . $searchedWord . '%')
            ->get();

        return view('drawings', compact('drawings', 'categories'));
    }
}
