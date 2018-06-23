@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<p><a href="{{route('technologies.index')}}">Back to List</a></p>
				<h2>{{$item->technology_strategy}}</h2>
				<form action="{{route('technologies.update', $item->id)}}" method="POST">
					@csrf
					{!! method_field('PATCH') !!}
					<div class="form-group">
						<label for="technology_strategy">Technology Strategy</label>
						<input type="text" class="form-control" id="technology_strategy" name="technology_strategy" value="{{$item->technology_strategy}}">
					</div>
					<div class="form-group">
						<label for="technology_id">Technology ID</label>
						<input type="text" class="form-control" id="technology_id" name="technology_id" value="{{$item->technology_id}}">
					</div>
					<div class="form-group">
						<label for="technology_type_id">Technology Type</label>
						<select class="form-control" id="technology_type_id" name="technology_type_id">
							<option></option>
							@forelse($types as $type)
								<option value="{{$type->id}}" @if($type->id == $item->technology_type_id) selected @endif>{{$type->technology_type}}</option>
							@empty	
								<option value="">No Types available</option>
							@endforelse
						</select>
					</div>
					<div class="form-group">
						<label for="technology_system_type"> Technology System Type</label>
						<input type="text" class="form-control" name="technology_system_type" value="{{$item->technology_system_type}}">					
					</div>
					<div class="form-group">
						<label for="unit_metric_id">Unit Metric</label>
						<select name="unit_metric_id" id="unit_metric_id" class="form-control">
							<option value="">Choose Unit Metric</option>
							@forelse($unit_metrics as $unit)
								<option value="{{$unit->id}}" @if($unit->id == $item->unit_metric_id) selected @endif>{{$unit->unit_metric}}</option>
							@empty	
								<option value="">No unit metrics available</option>
							@endforelse
						</select>
					</div>
				  <div class="form-group">
				  	<label title="Average Daily Flow, Gallons Per Day" for="flow_gpd">Flow (GPD)<sup>*</sup>
				  		<input type="number" name="flow_gpd" id="flow_gpd" class="form-control" value="{{$item->flow_gpd}}">
				  		<small class="text-muted">Leave blank if Not Applicable.</small>
				  	</label>
				  </div>
					<div class="form-group">
						<label for="technology_description">Technology Description</label>
						<textarea class="form-control" id="technology_description" name="technology_description" rows="10" >{{$item->technology_description}}</textarea>
					</div>
					<div class="form-group">
						<label for="current_construction_cost_low">Current Construction Cost (Low)</label>
						<div class="input-group mb-3">	
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type="number" class="form-control" id="current_construction_cost_low" name="current_construction_cost_low" value="{{$item->current_construction_cost_low}}">
						</div>
					</div>
					<div class="form-group">
						<label for="current_construction_cost_high">Current Construction Cost (High)</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type="number" class="form-control" id="current_construction_cost_high" name="current_construction_cost_high" value="{{$item->current_construction_cost_high}}">
						</div>
					</div>	
					<div class="form-group">
						<label for="current_construction_cost_percent_labor">Current Construction Cost Percent Labor</label>
						<div class="input-group mb-3">
								
							<input type="number" class="form-control" id="current_construction_cost_percent_labor" name="current_construction_cost_percent_labor" value="{{$item->current_construction_cost_percent_labor}}">
							<div class="input-group-append">
									<span class="input-group-text">%</span>
								</div>
						</div>
					</div>
					<div class="form-group">
						<label for="current_project_cost_low">Current Project Cost (Low)</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type="text" class="form-control" id="current_project_cost_low" name="current_project_cost_low" value="{{$item->current_project_cost_low}}">
						</div>
					</div>
					<div class="form-group">
						<label for="current_project_cost_high">Current Project Cost (High)</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type="number" class="form-control" id="current_project_cost_high" name="current_project_cost_high" value="{{$item->current_project_cost_high}}">
						</div>
					</div>
					<div class="form-group">
						<label for="current_annual_o_m_cost_low">Current Annual OM Cost (Low)</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type="number" class="form-control" id="current_annual_o_m_cost_low" name="current_annual_o_m_cost_low" value="{{$item->current_annual_o_m_cost_low}}">
						</div>
					</div>	
					<div class="form-group">
						<label for="current_annual_o_m_cost_high">Current Annual OM Cost (High)</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type="number" class="form-control" id="current_annual_o_m_cost_high" name="current_annual_o_m_cost_high" value="{{$item->current_annual_o_m_cost_high}}">
						</div>
					</div>		
					<div class="form-group">
						<label for="current_annual_o_m_cost_percent_labor">Current Annual OM Cost Percent Labor</label>
						<div class="input-group mb-3">
							<input type="number" class="form-control" id="current_annual_o_m_cost_percent_labor" name="current_annual_o_m_cost_percent_labor" value="{{$item->current_annual_o_m_cost_percent_labor}}">
							<div class="input-group-append">
								<span class="input-group-text">%</span>
							</div>
						</div>
					</div>					
					<div class="form-group">
						<label for="useful_life_years">Useful Life (Years)</label>
						<input type="number" class="form-control" id="useful_life_years" name="useful_life_years" value="{{$item->useful_life_years}}">
					</div>			
					<div class="form-group">
						<label for="replacement_cost">Replacement Cost</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type="number" class="form-control" id="replacement_cost" name="replacement_cost" value="{{$item->replacement_cost}}">
						</div>
					</div>	
					<div class="form-group">
						<label for="n_percent_reduction_low">Nitrogen Percent Reduction Low</label>
						<div class="input-group mb-3">
							<input type="number" class="form-control" id="n_percent_reduction_low" name="n_percent_reduction_low" value="{{$item->n_percent_reduction_low}}">
							<div class="input-group-append">
								<span class="input-group-text">%</span>
							</div>
						</div>
					</div>		
					<div class="form-group">
						<label for="n_percent_reduction_high">Nitrogen Percent Reduction High</label>
						<div class="input-group mb-3">
							<input type="number" class="form-control" id="n_percent_reduction_high" name="n_percent_reduction_high" value="{{$item->n_percent_reduction_high}}">
							<div class="input-group-append">
								<span class="input-group-text">%</span>
							</div>
						</div>
					</div>	
					<div class="form-group">
						<label for="p_percent_reduction_low">Phosphorus Percent Reduction Low</label>
						<div class="input-group mb-3">
							<input type="number" class="form-control" id="p_percent_reduction_low" name="p_percent_reduction_low" value="{{$item->p_percent_reduction_low}}">
							<div class="input-group-append">
								<span class="input-group-text">%</span>
							</div>
						</div>
					</div>		
					<div class="form-group">
						<label for="p_percent_reduction_high">Phosphorus Percent Reduction High</label>
						<div class="input-group mb-3">
							<input type="number" class="form-control" id="p_percent_reduction_high" name="p_percent_reduction_high" value="{{$item->p_percent_reduction_high}}">
							<div class="input-group-append">
								<span class="input-group-text">%</span>
							</div>
						</div>
					</div>		
						
					<div class="form-group">
						<label for="advantages">Advantages</label>
						<textarea name="advantages" id="advantages" name="advantages" class="form-control" rows="10">{{$item->advantages}}</textarea>
					</div>
					<div class="form-group">
						<label for="disadvantages">Disadvantages</label>
						<textarea name="disadvantages" id="disadvantages" name="disadvantages" class="form-control" rows="10">{{$item->disadvantages}}</textarea>
					</div>
					
					<div class="form-group">
						<label for="show_in_wmvp">Show in wMVP</label>
						<select class="form-control" id="show_in_wmvp" name="show_in_wmvp">
							<option value="0" @if($item->show_in_wmvp == 0) selected @endif>Do Not Show in wMVP</option>
							<option value="1" @if($item->show_in_wmvp == 1) selected @endif>Show in wMVP (1)</option>
							<option value="2" @if($item->show_in_wmvp == 2) selected @endif>Show in wMVP (2)</option>
						</select>
					</div>
					<div class="form-group">
						<label for="show_on_Matrix">Show in Tech Matrix</label>
						<select class="form-control" id="show_on_Matrix" name="show_on_Matrix">
							<option value="">Should this field be displayed in Tech Matrix?</option>
							<option value="0" @if($item->show_on_Matrix == 0) selected @endif>Do Not Show in Tech Matrix</option>
							<option value="1" @if($item->show_on_Matrix == 1) selected @endif>Show in Tech Matrix</option>
						</select>
					</div>
					
					<div class="form-group">
						<p><strong>Piloting Status</strong></p>
						<select name="piloting_status_id" id="piloting_status_id" class="form-control">
							<option></option>
							@forelse($piloting_statuses as $each)	
								<option value="{{$each->id}}" @if($each->id == $item->piloting_status_id) selected @endif>{{$each->pilot_status}}</option>
							@empty
								No Piloting Statuses Available
							@endforelse
						</select>
					</div>		
					<div class="form-group">
						<label for="pilot_study_findings">Pilot Study Findings</label>
						<textarea name="pilot_study_findings" id="pilot_study_findings" name="pilot_study_findings" class="form-control" rows="10">{{$item->pilot_study_findings}}</textarea>
						
					</div>			
					<div class="form-group">
						<label for="references_notes_assumptions">References, Notes, &amp; Assumptions</label>
						<textarea name="references_notes_assumptions" id="references_notes_assumptions" name="references_notes_assumptions" class="form-control" rows="10">{{$item->references_notes_assumptions}}</textarea>
					</div>
					<div class="form-group">
							<label for="regulatory_comments">Regulatory Comments &amp; Certainty</label>
							<textarea name="regulatory_comments" id="regulatory_comments" name="regulatory_comments" class="form-control" rows="10">{{$item->regulatory_comments}}
							</textarea>
						</div>
						<div class="form-group">
							<label for="public_acceptance">Public Acceptance</label>
							<textarea name="public_acceptance" id="public_acceptance" name="public_acceptance" class="form-control" rows="5">{{$item->public_acceptance}}</textarea>
						</div>					
					<div class="form-group">
						<input type="submit" value="Save Changes">
					</div>
				</form>
		
		
				<p>{{$item->image}}</p>
				<p>{{$item->type_of_cost_spread}}</p>
			</div>
		</div>
	</div>
	
@endsection

@section('scripts')
<link rel="stylesheet" href="/tech_matrix_v2/css/redactor.css" />
<script src="/tech_matrix_v2/js/redactor.js"></script>
	<script type="text/javascript">
		$(function()
		{
			$('textarea.form-control').redactor();
		});
	</script>
@endsection