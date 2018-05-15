<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Technology;
use App\Models\User;
use App\Models\TechnologyType;
use App\Models\SystemDesignConsideration;

class TechnologyController extends Controller
{
    public function index()
    {
		$list = Technology::all();
		return view('admin.technologies.list', compact('list'));
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $technology)
    {
        $item = $technology;
        return view('admin.technologies.show', compact('item'));
	}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
       $item = $technology;
       $types = TechnologyType::all();
       $considerations = SystemDesignConsideration::all();
        return view('admin.technologies.edit', compact('item', 'types', 'considerations'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}