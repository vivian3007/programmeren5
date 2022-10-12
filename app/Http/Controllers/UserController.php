<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id){
        $user = User::all()
            ->where('id', '=', $id);

        return view('user.details', [
            'users' => $user
        ]);
    }

    public function edit($id){
        $details = User::all()
            ->where('id', '=', $id);

        return view('user.edit', compact('id'), [
            'details' => $details
        ]);
    }

    public function update(User $user){
        $attributes = request()->validate([
            'name' => '',
            'email' => ''
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->update($attributes);

        return redirect(route('user.show', $user->id));
    }
}
