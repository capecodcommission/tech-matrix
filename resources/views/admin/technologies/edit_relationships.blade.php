@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<p><a href="{{route('technologies.index')}}">Back to List</a></p>
				<h2>Edit relationships for {{$item->technology_strategy}}</h2>
				<form action="{{url('technologies/updateRelationships')}}" method="POST">
					@csrf
					{{-- {!! method_field('PATCH') !!} --}}
					<input type="hidden" id="id" name="id" value="{{$item->id}}">

					<div class="form-group">
						<p><strong>System Design Considerations</strong></p>
						@forelse($considerations as $each)
							<div class="form-check">
								<label class="form-check-label" for="consideration_{{$each->id}}">
									<input class="form-check-input form-control-lg" type="checkbox" value="{{$each->id}}" name="considerations[]" id="consideration_{{$each->id}}"  @if($item->system_design_considerations->contains($each->id)) checked='checked' @endif>
									{{$each->infrastructure_to_consider}}
								</label>
							</div>
						@empty
							No System Design Considerations Available
						@endforelse
					</div>
					
					<div class="form-group">
						<p><strong>Pollutants Treated</strong></p>
						@forelse($pollutants as $each)	
							<div class="form-check">
								<label class="form-check-label" for="pollutant_{{$each->id}}">
									<input class="form-check-input form-control-lg" type="checkbox" value="{{$each->id}}" name="pollutants[]" id="pollutant_{{$each->id}}"  @if($item->pollutants->contains($each->id)) checked='checked' @endif>
								{{$each->pollutant}}
								</label>
							</div>
						@empty
							No Pollutants Available
						@endforelse
					</div>
					{{-- <div class="form-group">
						<p><strong>Baseline Concentration Nitrogen</strong></p>
						<select name="baseline_concentration_n_id" id="baseline_concentration_n_id" class="form-control">
							<option></option>
							@forelse($influent_concentrations as $each)	
								<option value="{{$each->id}}" @if($each->id == $item->baseline_concentration_nitrogen->id) selected @endif>{{$each->baseline_concentration}}</option>
							@empty
								No Baseline Concentrations Available
							@endforelse
						</select>
					</div> --}}
					{{-- <div class="form-group">
						<p><strong>Nutrient Percent Reduction</strong></p>
						@forelse($item->pollutants as $each)	
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<label class="form-check-label" for="pollutant_{{$each->id}}">
										{{$each->pollutant}} (Low)
									</label>
								</div>
							</div>
							<input type="number" class="form-control" aria-label="Text input with radio button">
							<div class="input-group-append">
									<span class="input-group-text">%</span>
								</div>
						</div>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<label class="form-check-label" for="pollutant_{{$each->id}}">
										{{$each->pollutant}} (High)
									</label>	
								</div>
							</div>
							<input type="number" class="form-control" aria-label="Text input with radio button">
							<div class="input-group-append">
									<span class="input-group-text">%</span>
								</div>
						</div>
						@empty
							No Pollutants Available
						@endforelse

						nutrient_reductions
					</div> --}}
					<div class="form-group">
						<p><strong>Influent Sources</strong></p>
						@forelse($influent_sources as $each)	
							<div class="form-check">
								<label class="form-check-label" for="influent_sources_{{$each->id}}">
									<input class="form-check-input form-control-lg" type="checkbox" value="{{$each->id}}" name="influent_sources[]" id="influent_sources_{{$each->id}}"  > {{$each->influent_source}}
								</label>
							</div>
						@empty
							No Influent Sources Available
						@endforelse
					</div>
					<div class="form-group">
						<p><strong>Influent Concentrations</strong></p>
						@forelse($influent_concentrations as $each)	
							<div class="form-check">
								<label class="form-check-label" for="influent_concentrations_{{$each->id}}">
									<input class="form-check-input form-control-lg" type="checkbox" value="{{$each->id}}" name="influent_concentrations[]" id="influent_concentrations_{{$each->id}}" > {{$each->influent_concentration}}
								</label>
							</div>
						@empty
							No Influent Concentrations Available
						@endforelse
					</div>
					<div class="form-group">
						<p><strong>Scale</strong></p>
						@forelse($scales as $each)
							<div class="form-check">
								<label class="form-check-label" for="scales_{{$each->id}}">
									<input class="form-check-input form-control-lg" type="checkbox" value="{{$each->id}}" name="scales[]" id="scales_{{$each->id}}"  @if($item->scales->contains($each->id)) checked='checked' @endif>
								{{$each->scale}}
								</label>
							</div>
						@empty
							No Scales Available
						@endforelse
					</div>
					<div class="form-group">
						<p><strong>Permitting Agencies</strong></p>
						@forelse($permitting_agencies as $each)
							<div class="form-check">
								<label class="form-check-label" for="permitting_agencies_{{$each->id}}">
									<input class="form-check-input form-control-lg" type="checkbox" value="{{$each->id}}" name="permitting_agencies[]" id="permitting_agencies_{{$each->id}}"  @if($item->permitting_agencies->contains($each->id)) checked='checked' @endif>
								{{$each->potential_agency}}
								</label>
							</div>
						@empty
							No Permitting Agencies Available
						@endforelse
					</div>
					<div class="form-group">
						<p><strong>Ecosystem Services</strong></p>
						@forelse($ecosystem_services as $each)	
							<div class="form-check">
								<label class="form-check-label" for="ecosystem_service_{{$each->id}}">
									<input class="form-check-input form-control-lg" type="checkbox" value="{{$each->id}}" name="ecosystem_services[]" id="ecosystem_service_{{$each->id}}"  @if($item->ecosystem_services->contains($each->id)) checked='checked' @endif>
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
									<input class="form-check-input form-control-lg" type="checkbox" value="{{$each->id}}" name="evaluation_monitoring[]" id="evaluation_monitoring_{{$each->id}}"  @if($item->evaluation_monitoring->contains($each->id)) checked='checked' @endif>
								{{$each->monitoring}}
								</label>
							</div>
						@empty
							No Evaluation Monitoring Options Available
						@endforelse
					</div>
					<div class="form-group">
						<p><strong>Estimated Years of Evaluation Monitoring Required</strong></p>
						@forelse($years as $time)
							<div class="form-check">
								<label class="form-check-label" for="years_of_evaluation_monitoring_{{$time->id}}">
									<input type="radio" class="form-check-input" id="years_of_evaluation_monitoring_{{$time->id}}" value="{{$time->id}}" name="years_of_evaluation_monitoring" @if($item->years_of_evaluation_monitoring->contains($time->id)) checked="checked" @endif>
									{{$time->length_of_time}}
								</label>
							</div>
						@empty
							No Year Groupings available.
						@endforelse
					</div>
					<div class="form-group">
						<p><strong>Estimated Annual Evaluation Monitoring Costs</strong></p>
						@forelse($costs as $cost)
							<div class="form-check">
								<label class="form-check-label" for="evaluation_monitoring_cost_{{$cost->id}}">
									<input type="radio" class="form-check-input" id="evaluation_monitoring_cost_{{$cost->id}}" value="{{$cost->id}}" name="evaluation_monitoriing_cost_id" @if($item->evaluation_monitoring_cost_id == $cost->id) checked="checked" @endif>
									{{$cost->est_annual_cost}}
								</label>
							</div>
						@empty
							No Monitoring Costs available.
						@endforelse
					</div>
					<div class="form-group">
						<p><strong>Longterm O.M. Monitoring</strong></p>
						@forelse($longterm_monitoring as $each)	
							<div class="form-check">
								<label class="form-check-label" for="longterm_monitoring_{{$each->id}}">
									<input class="form-check-input form-control-lg" type="checkbox" value="{{$each->id}}" name="longterm_monitoring[]" id="longterm_monitoring_{{$each->id}}"  @if($item->longterm_monitoring->contains($each->id)) checked='checked' @endif>
								{{$each->monitoring}}
								</label>
							</div>
						@empty
							No Longterm OM Monitoring Options Available
						@endforelse
					</div>
					<div class="form-group">
						<p><strong>Estimated Annual Longterm O&amp;M Monitoring Costs</strong></p>
						@forelse($costs as $cost)
							<div class="form-check">
								<label class="form-check-label" for="longterm_monitoring_cost_{{$cost->id}}">
									<input type="radio" class="form-check-input" id="longterm_monitoring_cost_{{$cost->id}}" value="{{$cost->id}}" name="longterm_monitoring_cost_id" @if($item->longterm_monitoring_cost_id == $cost->id) checked="checked" @endif>
									{{$cost->est_annual_cost}}
								</label>
							</div>
						@empty
							No Monitoring Costs available.
						@endforelse
					</div>

					<div class="form-group">
						<p><strong>Time to Improve Estuary Water (Years)</strong></p>
						@forelse($years as $time)
							<div class="form-check">
								<label class="form-check-label" for="time_to_improve_estuary_{{$time->id}}">
									<input type="radio" class="form-check-input" id="time_to_improve_estuary_{{$time->id}}" value="{{$time->id}}" name="time_to_improve_estuary" @if($item->time_to_improve_estuary->contains($time->id)) checked="checked" @endif>
									{{$time->length_of_time}}
								</label>
							</div>
						@empty
							No Year Groupings available.
						@endforelse
					</div>
					<div class="form-group">
						<p><strong>Siting Requirements</strong></p>
						@forelse($siting_requirements as $each)
							<div class="form-check">
								<label class="form-check-label" for="siting_requirements_{{$each->id}}">
									<input type="checkbox" class="form-check-input" id="siting_requirements_{{$each->id}}" value="{{$each->id}}" name="siting_requirements[]" @if($item->siting_requirements->contains($each->id)) checked="checked" @endif>
									{{$each->siting_requirement}}
								</label>
							</div>
						@empty
							No Siting Requirements available.
						@endforelse
					</div>
					
					<div class="form-group">
						<input type="submit" value="Save Changes">
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection