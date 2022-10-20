<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Drawing;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $drawings = Auth::user()->drawings;

        return view('my_collection', compact('drawings'));
    }

    public function show($id){
        if($id == Auth::user()->id){
            $user = User::find($id);
            return view('user.details', compact('user'));
        } else{
            return redirect(route('user.show', Auth::user()->id));
        }
    }

    public function edit($id){
        if($id == Auth::user()->id){
            $user = User::find($id);
            return view('user.edit', compact('user'));
        } else{
            return redirect(route('user.show', Auth::user()->id));
        }
    }

    public function update(Request $request, $id){
        if($id == Auth::user()->id){
            $request->validate([
                'name' => 'required',
                'email' => 'required',
            ]);

            $user = User::find($id);
            $user->update($request->all());

            return redirect(route('user.show', $user->id));
            } else {
                abort(403);
            }
    }
}
