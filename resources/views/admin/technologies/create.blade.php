@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<p><a href="{{route('technologies.index')}}">Back to List</a></p>
			<h2>Create New Technology Strategy</h2>
			<form action="{{route('technologies.store')}}" method="POST">
					@csrf
				<div class="form-group">
					<label for="technology_strategy">Technology Strategy</label>
					<input type="text" class="form-control" id="technology_strategy" name="technology_strategy" value="">
				  </div>
				  <div class="form-group">
					<label for="technology_id">Technology ID</label>
					<input type="text" class="form-control" id="technology_id" name="technology_id" value="">
				  </div>
				  <div class="form-group">
						<label for="technology_type_id">Technology Type</label>
						<select class="form-control" id="technology_type_id" name="technology_type_id">
							<option>Select Technology Type</option>
							@forelse($types as $type)
								<option value="{{$type->id}}">{{$type->technology_type}}</option>
							@empty	
								<option value="">No Types available</option>
							@endforelse
						</select>
				  </div>
				  <div class="form-group">
					  <label for="technology_system_type"> Technology System Type</label>
						  <input type="text" class="form-control" name="technology_system_type">					  
				  </div>
				  <div class="form-group">
					  <label for="unit_metric_id">Unit Metric</label>
					  <select name="unit_metric_id" id="unit_metric_id" class="form-control">
						  <option value="">Choose Unit Metric</option>
						  @forelse($unit_metrics as $unit)
							<option value="{{$unit->id}}">{{$unit->unit_metric}}</option>
						  @empty	
							  <option value="">No unit metrics available</option>
							@endforelse
					  </select>
				  </div>
				  <div class="form-group">
					<label for="technology_description">Technology Description</label>
					<textarea class="form-control" id="technology_description" name="technology_description" rows="10" ></textarea>
				  </div>
				  <div class="form-group">
						<label for="current_construction_cost_low">Current Construction Cost (Low)</label>
						<div class="input-group mb-3">
						
								<div class="input-group-prepend">
								  <span class="input-group-text">$</span>
								</div>
								<input type="number" class="form-control" id="current_construction_cost_low" name="current_construction_cost_low" value="">
							  </div>
					</div>
					<div class="form-group">
						<label for="current_construction_cost_high">Current Construction Cost (High)</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type="number" class="form-control" id="current_construction_cost_high" name="current_construction_cost_high" value="">
						</div>
					</div>	
					<div class="form-group">
						<label for="current_construction_cost_percent_labor">Current Construction Cost Percent Labor</label>
						<div class="input-group mb-3">
								
							<input type="number" class="form-control" id="current_construction_cost_percent_labor" name="current_construction_cost_percent_labor" value="">
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
							<input type="text" class="form-control" id="current_project_cost_low" name="current_project_cost_low" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="current_project_cost_high">Current Project Cost (High)</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type="number" class="form-control" id="current_project_cost_high" name="current_project_cost_high" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="current_annual_o_m_cost_low">Current Annual OM Cost (Low)</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type="number" class="form-control" id="current_annual_o_m_cost_low" name="current_annual_o_m_cost_low" value="">
						</div>
					</div>	
					<div class="form-group">
						<label for="current_annual_o_m_cost_high">Current Annual OM Cost (High)</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type="number" class="form-control" id="current_annual_o_m_cost_high" name="current_annual_o_m_cost_high" value="">
						</div>
					</div>		
					<div class="form-group">
						<label for="current_annual_o_m_cost_percent_labor">Current Annual OM Cost Percent Labor</label>
						<div class="input-group mb-3">
							<input type="number" class="form-control" id="current_annual_o_m_cost_percent_labor" name="current_annual_o_m_cost_percent_labor" value="">
						<div class="input-group-append">
								<span class="input-group-text">%</span>
							</div>
						</div>
						
					</div>					
					<div class="form-group">
						<label for="useful_life_years">Useful Life (Years)</label>
						<input type="number" class="form-control" id="useful_life_years" name="useful_life_years" value="">
					</div>			
					<div class="form-group">
						<label for="replacement_cost">Replacement Cost</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type="number" class="form-control" id="replacement_cost" name="replacement_cost" value="">
						</div>
					</div>	
					<div class="form-group">
						<label for="advantages">Advantages</label>
						<textarea name="advantages" id="advantages" name="advantages" class="form-control"  rows="10"></textarea>
					</div>
					<div class="form-group">
						<label for="disadvantages">Disadvantages</label>
						<textarea name="disadvantages" id="disadvantages" name="disadvantages" class="form-control"  rows="10"></textarea>
					</div>

					<div class="form-group">
						<p><strong>System Design Considerations</strong></p>
						@forelse($considerations as $each)
						
						<div class="form-check">
							<label class="form-check-label" for="consideration_{{$each->id}}">
								<input class="form-check-input form-control-lg" type="checkbox" value="{{$each->id}}" name="considerations[]" id="consideration_{{$each->id}}">
							  {{$each->infrastructure_to_consider}}
							</label>
						  </div>
						  @empty
							No System Design Considerations Available
						  @endforelse
					</div>
					<div class="form-group">
							<label for="show_in_wmvp">Show in wMVP</label>
						  <select class="form-control" id="show_in_wmvp" name="show_in_wmvp">
								  
									  <option value="0">Do Not Show in wMVP</option>
									  <option value="1">Show in wMVP (1)</option>
									  <option value="2">Show in wMVP (2)</option>
									</select>
						</div>
						<div class="form-group">
							<label for="show_in_wmvp">Show in Tech Matrix</label>
						  	<select class="form-control" id="show_on_Matrix" name="show_on_Matrix">
								<option value="">Should this field be displayed in Tech Matrix?</option>
								<option value="0">Do Not Show in Tech Matrix</option>
								<option value="1">Show in Tech Matrix</option>
							</select>
						</div>
						<div class="form-group">
							<label for="type_of_cost_spread">Type of Cost Spread</label>
							<select name="type_of_cost_spread" id="type_of_cost_spread" class="form-control">
								<option value="">Select Type of Cost Spread</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
						<div class="form-group">
								<p><strong>Pollutants Treated</strong></p>
								@forelse($pollutants as $each)
									<div class="form-check">
										<label class="form-check-label" for="pollutant_{{$each->id}}">
											<input class="form-check-input form-control-lg" type="checkbox" value="{{$each->id}}" name="pollutants[]" id="pollutant_{{$each->id}}">
										{{$each->pollutant}}
										</label>
									</div>
								@empty
								No Pollutants Available
								@endforelse
						</div>
						<div class="form-group">
							<p><strong>Influent Sources</strong></p>
							@forelse($influent_sources as $each)
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<div class="input-group-text">
											<label class="form-check-label" for="influent_sources_{{$each->id}}">
												<input class="form-check-input form-control-lg" type="checkbox" value="{{$each->id}}" name="influent_sources[]" id="influent_sources_{{$each->id}}"> {{$each->influent_source}}
											</label>
										</div>
									</div>
									<select class="form-control" id="influent_concentration_{{$each->id}}" name="influent_concentration[{{$each->id}}]">
										<option value="">Select concentration of influent source</option>					
										@forelse($influent_concentrations as $concentration)
											<option value="{{$concentration->id}}">{{$concentration->influent_concentration}}</option>
										@empty
											<option value="">No Concentration levels available</option>
										@endforelse
									</select>
								</div>
							@empty
							No Influent Sources Available
							@endforelse
						</div>
						<div class="form-group">
							<p><strong>Permitting Agencies</strong></p>
							@forelse($permitting_agencies as $each)
							
								<div class="form-check">
									<label class="form-check-label" for="permitting_agencies_{{$each->id}}">
										<input class="form-check-input form-control-lg" type="checkbox" value="{{$each->id}}" name="permitting_agencies[]" id="permitting_agencies_{{$each->id}}">
									{{$each->potential_agency}}
									</label>
								</div>
							@empty
								No Agencies Available
							@endforelse

						</div>
						<div class="form-group">
								<p><strong>Ecosystem Services</strong></p>
								@forelse($ecosystem_services as $each)	
									<div class="form-check">
										<label class="form-check-label" for="ecosystem_service_{{$each->id}}">
											<input class="form-check-input form-control-lg" type="checkbox" value="{{$each->id}}" name="ecosystem_services[]" id="ecosystem_service_{{$each->id}}">
										{{$each->ecosystem_service}}
										</label>
									</div>
								@empty
									No Ecosystem Services Available
								@endforelse
							</div>
							<div class="form-group">
									<p><strong>Evaluation Monitoring</strong></p>
									@forelse($evaluation_monitoring as $each)	
										<div class="form-check">
											<label class="form-check-label" for="evaluation_monitoring_{{$each->id}}">
												<input class="form-check-input form-control-lg" type="checkbox" value="{{$each->id}}" name="evaluation_monitoring[]" id="evaluation_monitoring_{{$each->id}}">
											{{$each->monitoring}}
											</label>
										</div>
									@empty
										No Evaluation Monitoring Options Available
									@endforelse
								</div>
								<div class="form-group">
									<p><strong>Longterm O.M. Monitoring</strong></p>
									@forelse($longterm_monitoring as $each)	
										<div class="form-check">
											<label class="form-check-label" for="longterm_monitoring_{{$each->id}}">
												<input class="form-check-input form-control-lg" type="checkbox" value="{{$each->id}}" name="longterm_monitoring[]" id="longterm_monitoring_{{$each->id}}">
											{{$each->longterm_o_m_monitoring}}
											</label>
										</div>
									@empty
										No Evaluation Monitoring Options Available
									@endforelse
								</div>	
							<div class="form-group">
									<label for="references_notes_assumptions">References, Notes, &amp; Assumptions</label>
									<textarea name="references_notes_assumptions" id="references_notes_assumptions" name="references_notes_assumptions" class="form-control" rows="10"></textarea>
								</div>
								<div class="form-group">
										<label for="regulatory_comments">Regulatory Comments &amp; Certainty</label>
										<textarea name="regulatory_comments" id="regulatory_comments" name="regulatory_comments" class="form-control" rows="10">
										</textarea>
									</div>
									<div class="form-group">
										<label for="public_acceptance">Public Acceptance</label>
										<textarea name="public_acceptance" id="public_acceptance" name="public_acceptance" class="form-control" rows="5"></textarea>
									</div>	
				<div class="form-group">
					<input type="submit" value="Save Technology">
				</div>
			</form>
					
		</div>
	</div>
</div>
@endsection