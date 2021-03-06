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
					<div class="row">
						<div class="col-lg-9">
							<div class="form-group">
								<label for="technology_strategy">Technology Strategy</label>
								<input type="text" class="form-control" id="technology_strategy" name="technology_strategy" value="{{$item->technology_strategy}}">
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<label for="technology_id">Technology ID</label>
								<input type="text" class="form-control" id="technology_id" name="technology_id" value="{{$item->technology_id}}">
							</div>
						</div>
						<div class="col-lg-6">
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
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="treatment_type_id">Treatment Type</label>
								<select class="form-control" id="treatment_type_id" name="treatment_type_id">
									<option></option>
									@forelse($treatment_types as $type)
										<option value="{{$type->id}}" @if($type->id == $item->treatment_type_id) selected @endif>{{$type->treatment_type}}</option>
									@empty	
										<option value="">No Treatment Types available</option>
									@endforelse
								</select>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="approach_id">Technology Approach</label>
								<select class="form-control" id="approach_id" name="approach_id">
									<option></option>
									@forelse($approaches as $approach)
										<option value="{{$approach->id}}" @if($approach->id == $item->approach_id) selected @endif>{{$approach->approach}}</option>
									@empty	
										<option value="">No Approaches available</option>
									@endforelse
								</select>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="technology_system_type"> Technology System Type</label>
								<input type="text" class="form-control" name="technology_system_type" value="{{$item->technology_system_type}}">					
							</div>
						</div>
						<div class="col-lg-4">
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
						</div>
						<div class="col-lg-4">
							<label for="metric_input">Metric Input</label>
							<input type="text" class="form-control" name="metric_input" value="{{$item->metric_input}}">	
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label title="Average Daily Flow, Gallons Per Day" for="flow_gpd">Flow (GPD)</label>
									<input type="number" name="flow_gpd" id="flow_gpd" class="form-control" value="{{$item->flow_gpd}}">
									{{-- <small class="text-muted">Leave blank if Not Applicable.</small> --}}
								
							</div>
						</div>
					</div>
					
				  
					<div class="form-group">
						<label for="technology_description">Technology Description</label>
						<textarea class="form-control" id="technology_description" name="technology_description" rows="10" >{{$item->technology_description}}</textarea>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label for="current_construction_cost_low">Current Construction Cost (Low)</label>
								<div class="input-group mb-3">	
									<div class="input-group-prepend">
										<span class="input-group-text">$</span>
									</div>
									<input type="number" class="form-control" id="current_construction_cost_low" name="current_construction_cost_low" value="{{$item->current_construction_cost_low}}">
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="current_construction_cost_high">Current Construction Cost (High)</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">$</span>
									</div>
									<input type="number" class="form-control" id="current_construction_cost_high" name="current_construction_cost_high" value="{{$item->current_construction_cost_high}}">
								</div>
							</div>	
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="current_construction_cost_percent_labor">Current Construction Cost Percent Labor</label>
								<div class="input-group mb-3">
										
									<input type="number" class="form-control" id="current_construction_cost_percent_labor" name="current_construction_cost_percent_labor" value="{{$item->current_construction_cost_percent_labor}}">
									<div class="input-group-append">
											<span class="input-group-text">%</span>
										</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="current_project_cost_low">Current Project Cost (Low)</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">$</span>
									</div>
									<input type="text" class="form-control" id="current_project_cost_low" name="current_project_cost_low" value="{{$item->current_project_cost_low}}">
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="current_project_cost_high">Current Project Cost (High)</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">$</span>
									</div>
									<input type="number" class="form-control" id="current_project_cost_high" name="current_project_cost_high" value="{{$item->current_project_cost_high}}">
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="current_annual_o_m_cost_percent_labor">Current Annual OM Cost Percent Labor</label>
								<div class="input-group mb-3">
									<input type="number" class="form-control" id="current_annual_o_m_cost_percent_labor" name="current_annual_o_m_cost_percent_labor" value="{{$item->current_annual_o_m_cost_percent_labor}}">
									<div class="input-group-append">
										<span class="input-group-text">%</span>
									</div>
								</div>
							</div>	
						</div>








					</div>
					
						
					<div class="form-group">
						<label for="replacement_cost_factor">Replacement Cost Factor (%)</label>
						<div class="input-group mb-3">							
							<input type="number" class="form-control" id="replacement_cost_factor" name="replacement_cost_factor" value="{{$item->replacement_cost_factor}}">
							<div class="input-group-append">
								<span class="input-group-text">%</span>
							</div>
							<small  class="form-text text-muted">
								The % used to calculate the Replacement Cost. Project Cost Avg is multiplied by this % (e.g. {{$item->current_project_cost_low + $item->current_project_cost_high/2}} * {{$item->adjustment_factor_project_cost}}%)
							</small>
						</div>
					</div>	
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="current_annual_o_m_cost_low">Current Annual OM Cost (Low)</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">$</span>
									</div>
									<input type="number" class="form-control" id="current_annual_o_m_cost_low" name="current_annual_o_m_cost_low" value="{{$item->current_annual_o_m_cost_low}}">
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="current_annual_o_m_cost_high">Current Annual OM Cost (High)</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">$</span>
									</div>
									<input type="number" class="form-control" id="current_annual_o_m_cost_high" name="current_annual_o_m_cost_high" value="{{$item->current_annual_o_m_cost_high}}">
								</div>
							</div>	
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="adjustment_factor_o_m_cost">Adjustment Factor OM Cost (%)</label>
								<div class="input-group mb-3">							
									<input type="number" class="form-control" id="adjustment_factor_o_m_cost" name="adjustment_factor_o_m_cost" value="{{$item->adjustment_factor_o_m_cost}}">
									<div class="input-group-append">
										<span class="input-group-text">%</span>
									</div>
								</div>
							</div>	
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="adjustment_factor_project_cost">Adjustment Factor Project Cost (%)</label>
								<div class="input-group mb-3">							
									<input type="number" class="form-control" id="adjustment_factor_project_cost" name="adjustment_factor_project_cost" value="{{$item->adjustment_factor_project_cost}}">
									<div class="input-group-append">
										<span class="input-group-text">%</span>
									</div>
								</div>
							</div>
						</div>
						
					</div>	
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="useful_life_years">Useful Life (Years)</label>
								<input type="number" class="form-control" id="useful_life_years" name="useful_life_years" value="{{$item->useful_life_years}}">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="replacement_cost">Replacement Cost</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">$</span>
									</div>
									<input type="number" class="form-control" id="replacement_cost" name="replacement_cost" value="{{$item->replacement_cost}}">
								</div>
							</div>	
						</div>
					</div>	
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="baseline_concentration_n">Baseline Concentration Nitrogen</label>
								<div class="input-group mb-3">
									<input type="text" class="form-control" id="baseline_concentration_n" name="baseline_concentration_n" value="{{$item->baseline_concentration_n}}">
									<div class="input-group-append"><span class="input-group-text">mg/L</span></div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="baseline_concentration_p">Baseline Concentration Phosphorus</label>
								<div class="input-group mb-3">
									<input type="text" class="form-control" id="baseline_concentration_p" name="baseline_concentration_p" value="{{$item->baseline_concentration_p}}">
									<div class="input-group-append"><span class="input-group-text">mg/L</span></div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="n_percent_reduction_low">Nitrogen Percent Reduction Low</label>
								<div class="input-group mb-3">
									<input type="number" class="form-control" id="n_percent_reduction_low" name="n_percent_reduction_low" value="{{$item->n_percent_reduction_low}}">
									<div class="input-group-append">
										<span class="input-group-text">%</span>
									</div>
								</div>
							</div>	
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="n_percent_reduction_high">Nitrogen Percent Reduction High</label>
								<div class="input-group mb-3">
									<input type="number" class="form-control" id="n_percent_reduction_high" name="n_percent_reduction_high" value="{{$item->n_percent_reduction_high}}">
									<div class="input-group-append">
										<span class="input-group-text">%</span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="form-group">
								<label for="p_percent_reduction_low">Phosphorus Percent Reduction Low</label>
								<div class="input-group mb-3">
									<input type="number" class="form-control" id="p_percent_reduction_low" name="p_percent_reduction_low" value="{{$item->p_percent_reduction_low}}">
									<div class="input-group-append">
										<span class="input-group-text">%</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="p_percent_reduction_high">Phosphorus Percent Reduction High</label>
								<div class="input-group mb-3">
									<input type="number" class="form-control" id="p_percent_reduction_high" name="p_percent_reduction_high" value="{{$item->p_percent_reduction_high}}">
									<div class="input-group-append">
										<span class="input-group-text">%</span>
									</div>
								</div>
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
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label for="show_in_wmvp">Show in wMVP</label>
								<select class="form-control" id="show_in_wmvp" name="show_in_wmvp">
									<option value="0" @if($item->show_in_wmvp == 0) selected @endif>Do Not Show in wMVP</option>
									<option value="1" @if($item->show_in_wmvp == 1) selected @endif>Show in wMVP (use unit metric)</option>
									<option value="2" @if($item->show_in_wmvp == 2) selected @endif>Show in wMVP (use polygon)</option>
									<option value="3" @if($item->show_in_wmvp == 3) selected @endif>Show in wMVP (use both unit metric and polygon)</option>
									<option value="4" @if($item->show_in_wmvp == 4) selected @endif>Show in wMVP (use neither unit metric or polygon)</option>
								</select>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="show_on_Matrix">Show in Tech Matrix</label>
								<select class="form-control" id="show_on_Matrix" name="show_on_Matrix">
									<option value="">Should this field be displayed in Tech Matrix?</option>
									<option value="0" @if($item->show_on_Matrix == 0) selected @endif>Do Not Show in Tech Matrix</option>
									<option value="1" @if($item->show_on_Matrix == 1) selected @endif>Show in Tech Matrix</option>
								</select>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="piloting_status_id">Piloting Status</label>
								<select name="piloting_status_id" id="piloting_status_id" class="form-control">
									<option></option>
									@forelse($piloting_statuses as $each)	
										<option value="{{$each->id}}" @if($each->id == $item->piloting_status_id) selected @endif>{{$each->pilot_status}}</option>
									@empty
										No Piloting Statuses Available
									@endforelse
								</select>
							</div>	
						</div>
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