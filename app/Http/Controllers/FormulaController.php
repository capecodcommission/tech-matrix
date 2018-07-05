<?php

namespace App\Http\Controllers;

use App\Models\Formula;
use App\Models\FormulaType;
use App\Models\Input;
use Illuminate\Http\Request;
use DB;

class FormulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$formulas = DB::select("SELECT sm.object_id,   
				OBJECT_NAME(sm.object_id) AS object_name,   
				o.type,   
				o.type_desc,   
				CAST(sm.definition AS char(1000)) AS definition
		-- using the two system tables sys.sql_modules and sys.objects  
		FROM sys.sql_modules AS sm  
		JOIN sys.objects AS o ON sm.object_id = o.object_id  

		WHERE  RIGHT(o.type_desc, 8) = 'FUNCTION' 
		ORDER BY o.type ");
		$list = [];
		$x = 0;
		foreach($formulas as $each)
		{
			$list[$x]['name'] = $each->object_name;
			$list[$x]['definition'] = $each->definition;
			$x++;
		}	
		
		dd($list);
		// $list = Formula::all()->sortBy('formula_type_id');
		$types = FormulaType::all();
		return view('admin.formulas.list', compact('list', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$types = FormulaType::all();
		$inputs = Input::all();
		$fields = $this->get_fields();
		$formulas = Formula::all();

		return view ('admin.formulas.create', compact('types', 'inputs', 'fields', 'formulas'));
    }


    public function store(Request $request)
    {
		$formula = Formula::create($request->all());
		return redirect('formulas');
    }


    public function show(Formula $formula)
    {
		$item = $formula;
		return view('admin.formulas.show', compact('item'));
    }


    public function edit(Formula $formula)
    {
		$item = $formula;
		$inputs = Input::all();
		$fields = $this->get_fields();
		$formulas = Formula::all()->except($formula->id);
		return view ('admin.formulas.edit', compact('inputs', 'fields', 'item', 'formulas'));
    }


    public function update(Request $request, Formula $formula)
    {
		$formula->fill($request->all());
		$formula->save();
		return redirect('formulas');
    }


    public function destroy(Formula $formula)
    {
        //
	}
	
	public function get_fields()
	{
		$field_names = DB::select("
		SELECT 
			c.name 'name',
			t.Name 'type',
			
			ISNULL(i.is_primary_key, 0) 'is_primary'
		FROM    
			sys.columns c
		INNER JOIN 
			sys.types t ON c.user_type_id = t.user_type_id
		LEFT OUTER JOIN 
			sys.index_columns ic ON ic.object_id = c.object_id AND ic.column_id = c.column_id
		LEFT OUTER JOIN 
			sys.indexes i ON ic.object_id = i.object_id AND ic.index_id = i.index_id
		WHERE
			c.object_id = OBJECT_ID('technologies') ");
		$fields = [];
		foreach($field_names as $each)
		{
			if($each->is_primary < 1 && $each->type != 'varchar' && $each->type != 'tinyint' && $each->type != 'datetime' )
			{
				$fields[] = $each->name;
			}	
		}
		return $fields;
	}
}
