<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Drawing;
use Illuminate\Support\Facades\Auth;

class DrawingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id){
        $details = Drawing::find($id);

        return view('drawing.details', compact('id', 'details'));
    }

    public function create(){
        return view('drawing.create');
    }

    public function store(Request $request){
        $attributes = $request->validate([
            'name' => 'required',
            'materials' => 'required',
//            'image' => 'required'
        ]);

        $attributes['user_id'] = Auth::user()->id;

        Drawing::create($attributes);

        return redirect(route('user.index'));
    }

    public function edit($id){
        $details = Drawing::find($id);

        return view('drawing.edit', compact('id', 'details'));
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

        return redirect(route('user.index'));
    }

    public function search(Request $request){

        $drawings = Drawing::where('name', 'like', '%' . $request->item . '%')
            ->orWhere('materials', 'like', '%' . $request->item . '%')
            ->orWhere('details', 'like', '%' . $request->item . '%')
//            ->orWhere('image', 'like', '%' . $searchedWord . '%')
            ->get();

        return view('drawings', compact('drawings'));
    }
}


