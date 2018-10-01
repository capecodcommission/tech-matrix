<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Log;
use App\Models\Technology;
use App\Models\User;
use App\Models\TechnologyType;
use App\Models\TreatmentType;
use App\Models\SystemDesignConsideration;
use App\Models\Consideration;
use App\Models\Pollutant;
use App\Models\InfluentSource;
use App\Models\InfluentConcentration;
use App\Models\Input;
use App\Models\SitingRequirement;
use App\Models\PermittingAgency;
use App\Models\UnitMetric;
use App\Models\EcosystemService;
use App\Models\EvaluationMonitoring;
use App\Models\OMMonitoring;
use App\Models\PilotingStatus;
use App\Models\YearGrouping;
use App\Models\Category;
use App\Models\Formula;
use App\Models\MonitoringCost;
use App\Models\Scale;
use App\Models\Approach;

use App\Http\Resources\Technology as TechnologyResource;

class TechnologyController extends Controller
{
    public function index()
    {
		$list = Technology::all()->sortBy('technology_id');
		return view('admin.technologies.list', compact('list'));
	}

    public function create()
    {
		$types = TechnologyType::all();
		$treatment_types = TreatmentType::all();
		$considerations = SystemDesignConsideration::all();
		$pollutants = Pollutant::all();
		$influent_sources = InfluentSource::all();
		$influent_concentrations = InfluentConcentration::all();
		$siting_requirements = SitingRequirement::all();
		$permitting_agencies = PermittingAgency::all();
        $unit_metrics = UnitMetric::all();
        $ecosystem_services = EcosystemService::all();
		$evaluation_monitoring = EvaluationMonitoring::all();
		$longterm_monitoring = EvaluationMonitoring::all();
		$categories = Category::all();
		$scales = Scale::all();
		return view('admin.technologies.create', compact('types', 'treatment_types', 'considerations', 'pollutants', 'influent_sources', 'siting_requirements', 'permitting_agencies', 'influent_concentrations', 'unit_metrics', 'ecosystem_services', 'evaluation_monitoring', 'longterm_monitoring', 'categories', 'scales'));
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
		if($data['scales'])
		{
			$item->scales()->sync([$data['scales']]);
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
		$item->calc = $item->calculated();
		// dd($item);
        return view('admin.technologies.show', compact('item'));
	}

	public function test_formula(Technology $technology)
	{
		$item = $technology;
		$input = Input::where('input_name', 'n_per_years')->first();
		$formula = DB::table('dbo.lkp_formulas')->select('formula')->first();
		return view('admin.technologies.test', compact('input', 'formula', 'item'));
	}
 
    public function edit(Technology $technology)
    {
		$item = $technology;
		$types = TechnologyType::all();
		$treatment_types = TreatmentType::all();
		$considerations = SystemDesignConsideration::all();
		$pollutants = Pollutant::all();
		$influent_sources = InfluentSource::all();
		$influent_concentrations = InfluentConcentration::all();
		$siting_requirements = SitingRequirement::all();
		$permitting_agencies = PermittingAgency::all();
        $unit_metrics = UnitMetric::all();
		$ecosystem_services = EcosystemService::all();
		$evaluation_monitoring = EvaluationMonitoring::all();
		$longterm_monitoring = EvaluationMonitoring::all();
		$piloting_statuses = PilotingStatus::all();
		// $categories = Category::all();
		$approaches = Approach::all();
       
		return view('admin.technologies.edit', compact('item', 'types', 'treatment_types', 'considerations', 'pollutants', 'influent_sources', 'siting_requirements', 'permitting_agencies', 'influent_concentrations', 'unit_metrics', 'ecosystem_services', 'evaluation_monitoring', 'longterm_monitoring', 'piloting_statuses', 'approaches'));
    }
	
    public function editRelationships(Technology $technology)
    {
		$item = $technology;
		$types = TechnologyType::all();
		$design_considerations = SystemDesignConsideration::all();
		$considerations = Consideration::all();
		$pollutants = Pollutant::all();
		$influent_sources = InfluentSource::all();
		$influent_concentrations = InfluentConcentration::all();
		$n_influent_concentrations = $influent_concentrations->filter(function ($value, $key) {
			return substr($value->influent_concentration, -1, 1) == 'N';
		});
		$p_influent_concentrations = $influent_concentrations->filter(function ($value, $key) {
			return substr($value->influent_concentration, -1, 1) == 'P';
		});
		$other_influent_concentrations = $influent_concentrations->filter(function ($value, $key) {
			return (
				(substr($value->influent_concentration, -1, 1) != 'P') && 
				(substr($value->influent_concentration, -1, 1) != 'N'));
		});
		$siting_requirements = SitingRequirement::all();
		$permitting_agencies = PermittingAgency::all();
        $unit_metrics = UnitMetric::all();
		$ecosystem_services = EcosystemService::all();
		$evaluation_monitoring = EvaluationMonitoring::all();
		$longterm_monitoring = EvaluationMonitoring::all();
		$costs = MonitoringCost::all();
		$piloting_statuses = PilotingStatus::all();
		$years = YearGrouping::all();
		$scales = Scale::all();
       
		return view('admin.technologies.edit_relationships', compact('item', 'types', 'design_considerations', 'considerations', 'pollutants', 'influent_sources', 'siting_requirements', 'permitting_agencies', 'other_influent_concentrations', 'n_influent_concentrations', 'p_influent_concentrations', 'unit_metrics', 'ecosystem_services', 'evaluation_monitoring', 'longterm_monitoring', 'piloting_statuses', 'years', 'costs', 'scales'));
    }
	
    public function update(Request $request, $id)
    {
		$data = $request->all();
		Log::info($data['baseline_concentration_p']);
		$item = Technology::find($id);
		$item->fill($data);
		Log::info($item->baseline_concentration_p);
        $item->update();
        return redirect('technologies');
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
            $item->considerations()->sync($request->considerations);
		}
		if($request->design_considerations)
        {
            $item->system_design_considerations()->sync($request->design_considerations);
        }
        if($request->permitting_agencies)
        {
            $item->permitting_agencies()->sync($request->permitting_agencies);
		}
		if($request->scales)
		{
			$item->scales()->sync($request->scales);
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
		if($request->influent_concentrations)
        {            
            $item->influent_concentrations()->sync($request->influent_concentrations);
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
            $item->evaluation_monitoring()->sync($request->evaluation_monitoring);
		}  
		if($request->evaluation_monitoring_cost_id)
		{
			$item->evaluation_monitoring_cost_id = $request->evaluation_monitoring_cost_id;
		}
		if($request->longterm_monitoring_cost_id)
		{
			$item->longterm_monitoring_cost_id = $request->longterm_monitoring_cost_id;
		}
		if($request->years_of_evaluation_monitoring_id)
		{
			$item->evaluation_monitoring_years_id = $request->years_of_evaluation_monitoring_id;
		}
		$item->save();
		if($request->time_to_improve_estuary)
		{
			$item->time_to_improve_estuary()->sync($request->time_to_improve_estuary);
		}
		

		return redirect('technologies');
	}

	public function editFormulas(Technology $technology)
	{
		$item = $technology;
		$formulas = Formula::all();
		$fields = $this->get_fields();
		return view('admin.technologies.edit_formulas', compact('item', 'formulas', 'fields'));
	}

	public function updateFormulas(Request $request)
	{
		$technology = Technology::find($request->id);
		$technology->formulas()->sync($request->formulas);
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

	public function detail($id)
	{
		return new TechnologyResource(Technology::find($id));
	}
}