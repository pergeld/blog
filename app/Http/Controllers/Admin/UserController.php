<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Felhasználó létrehozás', ['only' => ['create', 'store']]);
        $this->middleware('permission:Felhasználó módosítás', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Felhasználó törlés', ['only' => ['destroy']]);
    }

    public function index()
    {
        $users = User::all();

        return view('admin.user.list', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();

        return view('admin.user.form', compact('roles'));
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

        $user->assignRole($request->get('roles'));

        session()->flash('successMessage');
        return redirect('/admin/users/list');
    }

    public function pictureChange(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);

        if (! empty($user->profile_picture) && $request->boolean('change_picture') == true) {
            $oldFilename = $user->profile_picture;
            Storage::disk('public')->delete($oldFilename);
            $user->profile_picture = null;
        }

        if ($request->imageUpload && $request->boolean('change_picture') == true) {
            $newFilename = Str::after($request->imageUpload, 'tmp/');
            Storage::disk('public')->move($request->imageUpload, "profile/$newFilename");
            $user->profile_picture = "profile/$newFilename";
        }

        $user->save();

        return ['redirect' => '/profile'];
    }
}
