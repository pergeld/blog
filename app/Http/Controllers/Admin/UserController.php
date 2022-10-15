<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.user.list', compact('users'));
    }

    public function create()
    {
        return view('admin.user.form');
    }

    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'is_guest_writer' => $request->boolean('is_guest_writer'),
        ]);

        if (! $request->boolean('is_guest_writer')) {
            $user->is_guest_writer = false;
        }

        $user->save();

        session()->flash('successMessage');
        return redirect('/admin/users/list');
    }
}
