<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Drawing;
use Illuminate\Support\Facades\Auth;

class DrawingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        return view('home');
    }

    public function index(Request $request){
        if($request->has('category')) {
            $drawings = Drawing::where('category_id', '=', $request->query('category'))->get();
        } else{
            $drawings = Drawing::all();
        }

        $categories = Category::all();

        return view('drawings', compact('drawings', 'categories'));
    }

    public function show($id){
        $this->counter();
        $details = Drawing::find($id);

        return view('drawing.details', compact('id', 'details'));
    }

    public function create(){
        if(Auth::user()->counter >= 4){
            $categories = Category::all();

            return view('drawing.create', compact('categories'));
        } else{
            $drawings = Auth::user()->drawings;

            return view('my_collection', compact('drawings'));
        }

    }

    public function store(Request $request){
        $attributes = $request->validate([
            'name' => 'required',
            'materials' => 'required',
            'category' => 'required'
//            'image' => 'required'
        ]);

        $attributes['user_id'] = Auth::user()->id;
        $attributes['category_id'] = $request->input('category');

        Drawing::create($attributes);

        $categories = Category::all();

        return redirect(route('user.index', compact('categories')));
    }

    public function counter(){
        $user_id = Auth::id();
        $user = User::find($user_id);
        $count = $user->counter;
        $newCount = $count + 1;
        $user->counter = $newCount;
        $user->save();
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

        $categories = Category::all();

        return view('drawings', compact('drawings', 'categories'));
    }

}


