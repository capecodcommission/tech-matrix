<?php

namespace App\Http\Controllers;

use App\Models\Input;
use App\Models\InputGroup;
use Illuminate\Http\Request;
use Redirect;

class InputController extends Controller
{

	public function index()
	{
		$list = Input::all();
		$groups = InputGroup::all();
		return view('admin.inputs.list', compact('list', 'groups'));
	}


	public function create()
	{
		$groups = InputGroup::all();
		return view('admin.inputs.create', compact('groups'));
	}

	public function store(Request $request)
	{
		$data = $request->all();
		$input = Input::create($data);
		return redirect('inputs');
	}
   
	public function show(Input $input)
	{
		//
	}

	public function edit(Input $input)
	{
		$groups = InputGroup::all();
		return view('admin.inputs.edit', compact('input', 'groups'));
	}


	public function update(Request $request, Input $input)
	{
		$data = $request->all();
		$input->fill($data);
		$input->save();
		return redirect('inputs');
	}

	public function destroy(Input $input)
	{
		//
	}
}
