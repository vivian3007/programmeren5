<?php

namespace App\Http\Controllers;

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
}
