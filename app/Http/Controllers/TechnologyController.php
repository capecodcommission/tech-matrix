<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Technology;
use App\Models\User;
use App\Models\TechnologyType;
use App\Models\SystemDesignConsideration;
use App\Models\Pollutant;
use App\Models\InfluentSource;
use App\Models\SitingRequirement;
use App\Models\PermittingAgency;

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
        $data = $request->all();
        dd($data);
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
       $pollutants = Pollutant::all();
       $influent_sources = InfluentSource::all();
       $siting_requirements = SitingRequirement::all();
       $permitting_agencies = PermittingAgency::all();
        return view('admin.technologies.edit', compact('item', 'types', 'considerations', 'pollutants', 'influent_sources', 'siting_requirements', 'permitting_agencies'));
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
        $data = $request->all();
        // dd($data);
        $item = Technology::find($id);
        
        $item->technology_strategy = $data['technology_strategy'];
        $item->technology_id = $data['technology_id'];
        $item->technology_description = $data['technology_description'];
        $item->current_construction_cost_low = $data['current_construction_cost_low'];
        $item->current_construction_cost_high = $data['current_construction_cost_high'];
        $item->current_construction_cost_percent_labor = $data['current_construction_cost_percent_labor'];
        $item->current_project_cost_low = $data['current_project_cost_low'];
        $item->current_project_cost_high = $data['current_project_cost_high'];
        $item->current_annual_o_m_cost_high = $data['current_annual_o_m_cost_high'];
        $item->current_annual_o_m_cost_low = $data['current_annual_o_m_cost_low'];
        $item->current_annual_o_m_cost_percent_labor = $data['current_annual_o_m_cost_percent_labor'];
        $item->useful_life_years = $data['useful_life_years'];
        $item->replacement_cost = $data['replacement_cost'];
        $item->advantages = $data['advantages'];
        $item->disadvantages = $data['disadvantages'];
        $item->show_in_wmvp = $data['show_in_wmvp'];
        $item->save();
        // dd($item->pollutants());
        if($request->pollutants)
        {
            $item->pollutants()->sync($request->pollutants);
        }
        if($request->considerations)
        {
            $item->system_design_considerations()->sync($request->considerations);
        }
        // dd($item->permitting_agencies);
        if($request->permitting_agencies)
        {
            $item->permitting_agencies()->sync($request->permitting_agencies);
        }
        if($request->influent_sources)
        {
            // $pivotData = array_fill(0, count($request->fabric_countries), ['type' => 'fabric']);
			// $syncData  = array_combine($request->fabric_countries, $pivotData);
            // $business->countries('fabric')->sync($syncData);
            
            $item->influent_sources()->sync($request->influent_sources);
        }
        if($request->siting_requirements)
        {
            $item->siting_requirements()->sync($request->siting_requirements);
        }  
      
      
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