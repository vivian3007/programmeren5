<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drawing;

class DrawingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $drawings = Drawing::all();

        return view('index', [
            'drawings' => $drawings
        ]);
    }

    public function show($id){
        $details = Drawing::all()
        ->where('id', '=', $id);

        return view('drawing.details', compact('id'), [
            'details' => $details
        ]);
    }

    public function create(){
        return view('drawing.create');
    }

    public function store(){
        $attributes = request()->validate([
            'name' => 'required',
            'materials' => 'required',
//            'image' => 'required'
        ]);

        Drawing::create($attributes);

        return redirect(route('drawing.index'));
    }

    public function edit($id){
        $details = Drawing::all()
            ->where('id', '=', $id);

        return view('drawing.edit', compact('id'), [
            'details' => $details
        ]);
    }

    public function update(Drawing $drawing){
        $attributes = request()->validate([
            'name' => 'required',
            'materials' => 'required',
            'details' => ''
//          'image' => 'required'
        ]);

        $drawing->update($attributes);

        return redirect(route('drawing.show', $drawing->id));
    }

    public function destroy(Drawing $drawing) {
        $drawing->delete();

        return redirect(route('drawing.index'));
    }
}


