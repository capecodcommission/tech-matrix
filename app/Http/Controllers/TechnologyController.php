<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Technology;
use App\Models\User;
use App\Models\TechnologyType;
use App\Models\SystemDesignConsideration;
use App\Models\Pollutant;
use App\Models\InfluentSource;
use App\Models\InfluentConcentration;
use App\Models\SitingRequirement;
use App\Models\PermittingAgency;
use App\Models\UnitMetric;
use App\Models\EcosystemService;
use App\Models\EvaluationMonitoring;
use App\Models\OMMonitoring;
use App\Models\PilotingStatus;
class TechnologyController extends Controller
{
    public function index()
    {
		$list = Technology::all();
		return view('admin.technologies.list', compact('list'));
	}

    public function create()
    {
		$types = TechnologyType::all();
		$considerations = SystemDesignConsideration::all();
		$pollutants = Pollutant::all();
		$influent_sources = InfluentSource::all();
		$influent_concentrations = InfluentConcentration::all();
		$siting_requirements = SitingRequirement::all();
		$permitting_agencies = PermittingAgency::all();
        $unit_metrics = UnitMetric::all();
        $ecosystem_services = EcosystemService::all();
		$evaluation_monitoring = EvaluationMonitoring::all();
		$longterm_monitoring = OMMonitoring::all();
		return view('admin.technologies.create', compact('types', 'considerations', 'pollutants', 'influent_sources', 'siting_requirements', 'permitting_agencies', 'influent_concentrations', 'unit_metrics', 'ecosystem_services', 'evaluation_monitoring', 'longterm_monitoring'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
		$item = Technology::create($data);
		if($data['siting_requirements'])
		{
			$item->siting_requirements()->sync([$data['siting_requirements']]);
		}
		if($data['permitting_agencies'])
		{
			$item->permitting_agencies()->sync([$data['permitting_agencies']]);
		}
		if($data['pollutants'])
		{
			$item->pollutants()->sync($data['pollutants']);
		}
		if($data['considerations'])
		{
			$item->considerations()->sync($data['considerations']);
		}
		if($request->influent_sources)
        {
			foreach($request->influent_sources as $source)
			{
                $syncData[$source]['influent_id'] = $source;
                $syncData[$source]['influent_concentration_id'] = $request->influent_concentration[$source];
            }            
            $item->influent_sources()->sync($syncData);
        }
		
		return redirect('technologies');
	}

    public function show(Technology $technology)
    {
        $item = $technology;
        return view('admin.technologies.show', compact('item'));
	}
 
    public function edit(Technology $technology)
    {
		$item = $technology;
		$types = TechnologyType::all();
		$considerations = SystemDesignConsideration::all();
		$pollutants = Pollutant::all();
		$influent_sources = InfluentSource::all();
		$influent_concentrations = InfluentConcentration::all();
		$siting_requirements = SitingRequirement::all();
		$permitting_agencies = PermittingAgency::all();
        $unit_metrics = UnitMetric::all();
		$ecosystem_services = EcosystemService::all();
		$evaluation_monitoring = EvaluationMonitoring::all();
		$longterm_monitoring = OMMonitoring::all();
		$piloting_statuses = PilotingStatus::all();
       
		return view('admin.technologies.edit', compact('item', 'types', 'considerations', 'pollutants', 'influent_sources', 'siting_requirements', 'permitting_agencies', 'influent_concentrations', 'unit_metrics', 'ecosystem_services', 'evaluation_monitoring', 'longterm_monitoring', 'piloting_statuses'));
    }
	
    public function editRelationships(Technology $technology)
    {
		$item = $technology;
		$types = TechnologyType::all();
		$considerations = SystemDesignConsideration::all();
		$pollutants = Pollutant::all();
		$influent_sources = InfluentSource::all();
		$influent_concentrations = InfluentConcentration::all();
		$siting_requirements = SitingRequirement::all();
		$permitting_agencies = PermittingAgency::all();
        $unit_metrics = UnitMetric::all();
		$ecosystem_services = EcosystemService::all();
		$evaluation_monitoring = EvaluationMonitoring::all();
		$longterm_monitoring = OMMonitoring::all();
		$piloting_statuses = PilotingStatus::all();
       
		return view('admin.technologies.edit_relationships', compact('item', 'types', 'considerations', 'pollutants', 'influent_sources', 'siting_requirements', 'permitting_agencies', 'influent_concentrations', 'unit_metrics', 'ecosystem_services', 'evaluation_monitoring', 'longterm_monitoring', 'piloting_statuses'));
    }
	
    public function update(Request $request, $id)
    {
        $data = $request->all();
		$item = Technology::find($id);
		// $relationships = $data['relationships'];
		// unset($data['relationships']);
		$item->fill($data);
		// dd($item);
        // $item->technology_strategy = $data['technology_strategy'];
		// $item->technology_id = $data['technology_id'];
		// if($data['technology_type_id'] != 'NULL') { $item->technology_type_id = $data['technology_type_id']; }
        // $item->technology_description = $data['technology_description'];
        // $item->current_construction_cost_low = $data['current_construction_cost_low'];
        // $item->current_construction_cost_high = $data['current_construction_cost_high'];
        // $item->current_construction_cost_percent_labor = $data['current_construction_cost_percent_labor'];
        // $item->current_project_cost_low = $data['current_project_cost_low'];
        // $item->current_project_cost_high = $data['current_project_cost_high'];
        // $item->current_annual_o_m_cost_high = $data['current_annual_o_m_cost_high'];
        // $item->current_annual_o_m_cost_low = $data['current_annual_o_m_cost_low'];
        // $item->current_annual_o_m_cost_percent_labor = $data['current_annual_o_m_cost_percent_labor'];
        // $item->useful_life_years = $data['useful_life_years'];
        // $item->replacement_cost = $data['replacement_cost'];
        // $item->advantages = $data['advantages'];
        // $item->disadvantages = $data['disadvantages'];
		// $item->show_in_wmvp = $data['show_in_wmvp'];
		// $item->references_notes_assumptions = $data['references_notes_assumptions'];
		// $item->public_acceptance = $data['public_acceptance'];
		// $item->regulatory_comments = $data['regulatory_comments'];
		// $item->unit_metric_id = $data['unit_metric_id'];
		// $item->piloting_status_id = $data['piloting_status_id'];

        $item->update();
      
    }
	 
	public function updateRelationships(Request $request)
	{
		// $data = $request->all();
		$item = Technology::find($request->id);
		
		if($request->pollutants)
        {
            $item->pollutants()->sync($request->pollutants);
        }
        if($request->considerations)
        {
            $item->system_design_considerations()->sync($request->considerations);
        }
        if($request->permitting_agencies)
        {
            $item->permitting_agencies()->sync($request->permitting_agencies);
        }
        if($request->influent_sources)
        {
			foreach($request->influent_sources as $source)
			{
                $syncData[$source]['influent_id'] = $source;
                // $syncData[$source]['influent_concentration_id'] = $request->influent_concentration[$source];
                $syncData[$source]['influent_concentration_id'] =0;

			}
            
            $item->influent_sources()->sync($syncData);
        }
        if($request->siting_requirements)
        {
            $item->siting_requirements()->sync($request->siting_requirements);
        }  

		if($request->ecosystem_services)
        {
            $item->ecosystem_services()->sync($request->ecosystem_services);
		}  
	
		if($request->longterm_monitoring)
        {
            $item->longterm_monitoring()->sync($request->longterm_monitoring);
		}  
		if($request->evaluation_monitoring)
        {
            $item->longterm_monitoring()->sync($request->longterm_monitoring);
		}  
		return redirect('technologies');
	}

	public function destroy($id)
    {
        $technology = Technology::find($id);
		$technology->delete($id);
		alert()->message('Technology Deleted');
		return Redirect::route('technologies.index');
    }

	public function restore($id)
	{
		$technology = Technology::withTrashed()->find($id);
		$technology->restore();
		return Redirect::route('technologies.index');
	}
}