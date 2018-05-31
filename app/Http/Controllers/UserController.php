<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
		$list = User::all();
		$deleted = User::onlyTrashed()->get();
		return view('admin.users.list', compact('list', 'deleted'));
    }

   
    public function create()
    {
        return view('admin.users.create');
	}
	
	public function show(User $user)
	{
		return view('admin.users.show', compact('user'));
	}

	public function edit(User $user)
	{
		return view('admin.users.edit', compact('user'));
	}

	public function destroy(User $user)
	{
		$user->delete();
		return redirect('users');
	}

	public function restore($id)
	{
		$user = User::withTrashed()
        ->where('id', $id)
        ->first();
		$user->restore();
		return redirect('users');
	}
}
