<?php

namespace App\Http\Controllers;

use App\Models\InputGroup;
use Illuminate\Http\Request;
use Redirect;

class InputGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$list = InputGroup::all();
        return view('admin.input_groups.list', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.input_groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$data = $request->all();
		$input_group = InputGroup::create($data);
		return redirect('input_groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InputGroup  $inputGroup
     * @return \Illuminate\Http\Response
     */
    public function show(InputGroup $inputGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InputGroup  $inputGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(InputGroup $inputGroup)
    {
		$input_group = $inputGroup;
        return view('admin.input_groups.edit', compact('input_group'));
    }

    public function update(Request $request, InputGroup $inputGroup)
    {
		$data = $request->all();
		$inputGroup->fill($data);
		$inputGroup->save();
		return redirect('input_groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InputGroup  $inputGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(InputGroup $inputGroup)
    {
        //
    }
}
