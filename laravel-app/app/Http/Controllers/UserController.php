<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Friend;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::where('is_admin', false)->paginate(5);

        return view('users.index', compact('users'));
    }


    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->is_admin = false;
        $user->save();

        return redirect('/users');
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->save();

        return redirect('/users');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect('/users');
    }




}
