<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;

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
        dd($request->all());
    }
}
