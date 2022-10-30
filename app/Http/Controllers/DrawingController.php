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
            $drawings = Drawing::where('category_id', '=', $request->query('category'))
                ->where('active', '=', '1')->get();
        } else{
            $drawings = Drawing::where('active', '=', '1')->get();
        }

        $categories = Category::all();

        return view('drawing.index', compact('drawings', 'categories'));
    }

    public function show($id){
        $this->counter();
        $drawing = Drawing::find($id);

        return view('drawing.details', compact('id', 'drawing'));
    }

    public function create(){
        if(Auth::user()->counter >= 2){
            $categories = Category::all();

            return view('drawing.create', compact('categories'));
        } else{
            $drawings = Drawing::where('active', '=', '1')->get();

            $categories = Category::all();

            return view('drawing.index', compact('drawings', 'categories'));
        }

    }

    public function store(Request $request){
        $attributes = $request->validate([
            'name' => 'required',
            'materials' => 'required',
            'category' => 'required',
            'image' => 'required',
            'details' => ''
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
        $drawing = Drawing::find($id);

        $categories = Category::all();

        return view('drawing.edit', compact('id', 'drawing', 'categories'));
    }

    public function update(Drawing $drawing, Request $request){
        $attributes = $request->validate([
            'name' => 'required',
            'materials' => 'required',
            'category' => 'required',
            'details' => '',
            'image' => 'required'
        ]);

        $attributes['category_id'] = $request->input('category');

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
            ->get();

        $categories = Category::all();

        return view('drawing.index', compact('drawings', 'categories'));
    }

    public function active(Drawing $drawing){
        $current = $drawing->active;
        if($current){
            $new = false;
        } else{
            $new = true;
        }

        $drawing->active = $new;
        $drawing->save();

        return redirect(route('user.index'));
    }

    public function createCategory()
    {
        if(Auth::user()->is_admin){
            return view('category.create');
        } else{
            return redirect(route('drawing.index'));
        }
    }

    public function storeCategory(Request $request)
    {
        if(Auth::user()->is_admin){
            $attributes = $request->validate([
                'name' => 'required',
            ]);

            Category::create($attributes);

            return redirect(route('user.index'));
        } else{
            abort(403);
        }
    }
}


