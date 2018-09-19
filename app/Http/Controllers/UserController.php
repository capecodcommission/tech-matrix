<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

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
		$roles = Role::all();
        return view('admin.users.create', compact('roles'));
	}

	public function store(Request $request)
	{
		$data = $request->all();
		$user = User::create($data);
		$user->assignRole($data['roles']);
		return redirect('users');
	}
	
	public function show(User $user)
	{
		return view('admin.users.show', compact('user'));
	}

	public function edit(User $user)
	{
		$roles = Role::all();
		return view('admin.users.edit', compact('user', 'roles'));
	}
	
	public function edit_profile()
	{
		$user = Auth::user();
		return view('admin.users.edit_profile', compact('user'));
	}
	public function update(Request $request, $id)
	{
		$user = User::find($id);
		$data = $request->all();
		$user->name = $data['name'];
		$user->email = $data['email'];
		if ($data['update_password']) {
			$user->password = bcrypt($data['update_password']);
		}
		
		$user->save();
		$user->syncRoles($data['roles']);
		return redirect('users');
	}

	public function update_profile(Request $request)
	{
		$user = Auth::user();
		$data = $request->all();
		$user->name = $data['name'];
		$user->email = $data['email'];
		if ($data['update_password']) {
			$user->password = bcrypt($data['update_password']);
		}
		dd($user);
		$user->save();
		
		return redirect('/home');
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
