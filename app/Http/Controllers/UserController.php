<?php

namespace App\Http\Controllers;

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
        $user = User::find($id);

        $loggedInUser = Auth::user()->id;

        if($user->id === $loggedInUser){
            return view('user.details', compact('user'));
        } else{
            return redirect(route('drawing.index'));
        }

    }

    public function edit($id){
        $user = User::find($id);

        return view('user.edit', compact('id', 'user'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::find($id);
        $user->update($request->all());

        return redirect(route('user.show', $user->id));
    }
}
