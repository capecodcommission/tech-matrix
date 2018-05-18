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
					<div class="form-group">
						<p><strong>Influent Sources</strong></p>
						@forelse($influent_sources as $each)	
							<div class="input-group">
								{{-- <div class="input-group-prepend"> --}}
									{{-- <div class="input-group-text"> --}}
										<label class="form-check-label" for="influent_sources_{{$each->id}}">
											<input class="form-check-input form-control-lg" type="checkbox" value="{{$each->id}}" name="influent_sources[]" id="influent_sources_{{$each->id}}"  @if($item->influent_sources->contains($each->id)) checked='checked' @endif> {{$each->influent_source}}
										</label>
									{{-- </div> --}}
								{{-- </div> --}}
								{{-- <select class="form-control" id="influent_concentration_{{$each->id}}" name="influent_concentration[{{$each->id}}]">
									<option value="">Select concentration of influent source</option>								
									@forelse($influent_concentrations as $concentration)
										<option value="{{$concentration->id}}" @if($item->influent_sources->contains($each->id)) @if(  $each->pivot->influent_concentration_id == $concentration->id) selected @endif @endif>{{$concentration->influent_concentration}}</option>
									@empty
										<option value="">No Concentration levels available</option>
									@endforelse
								</select> --}}
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
						<p><strong>Longterm O.M. Monitoring</strong></p>
						@forelse($longterm_monitoring as $each)	
							<div class="form-check">
								<label class="form-check-label" for="longterm_monitoring_{{$each->id}}">
									<input class="form-check-input form-control-lg" type="checkbox" value="{{$each->id}}" name="longterm_monitoring[]" id="longterm_monitoring_{{$each->id}}"  @if($item->longterm_monitoring->contains($each->id)) checked='checked' @endif>
								{{$each->longterm_o_m_monitoring}}
								</label>
							</div>
						@empty
							No Longterm OM Monitoring Options Available
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