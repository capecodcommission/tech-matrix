@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<p><a href="{{route('technologies.index')}}">Back to List</a></p>
			<h2>{{$item->technology_strategy}}</h2>
			<form action="">
				<div class="form-group">
					<label for="technology_strategy">Technology Strategy</label>
					<input type="text" class="form-control" id="technology_strategy" value="{{$item->technology_strategy}}">
				  </div>
				  <div class="form-group">
					<label for="technology_id">Technology ID</label>
					<input type="text" class="form-control" id="technology_id" value="{{$item->technology_id}}">
				  </div>
				  <div class="form-group">
					  <label for="technology_type_id">Technology Type</label>
					<select class="form-control" id="technology_type_id">
							<option>Select Technology Type</option>
							@forelse($types as $type)
								<option value="{{$type->id}}" @if($type->id == $item->technology_type_id) selected @endif>{{$type->technology_type}}</option>
							@empty	
								<option value="">No Types available</option>
							@endforelse
							</select>
				  </div>
				  <div class="form-group">
					<label for="technology_description">Technology Description</label>
					<textarea class="form-control" id="technology_description" rows="10" >{{$item->technology_description}}</textarea>
				  </div>
				  <div class="form-group">
						<label for="current_construction_cost_low">Current Construction Cost (Low)</label>
						<div class="input-group mb-3">
						
								<div class="input-group-prepend">
								  <span class="input-group-text">$</span>
								</div>
								<input type="number" class="form-control" id="current_construction_cost_low" value="{{$item->current_construction_cost_low}}">
							  </div>
					</div>
					<div class="form-group">
						<label for="current_construction_cost_high">Current Construction Cost (High)</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type="number" class="form-control" id="current_construction_cost_high" value="{{$item->current_construction_cost_high}}">
						</div>
					</div>	
					<div class="form-group">
						<label for="current_construction_cost_percent_labor">Current Construction Cost Percent Labor</label>
						<div class="input-group mb-3">
								
							<input type="number" class="form-control" id="current_construction_cost_percent_labor" value="{{$item->current_construction_cost_percent_labor}}">
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
							<input type="text" class="form-control" id="current_project_cost_low" value="{{$item->current_project_cost_low}}">
						</div>
					</div>
					<div class="form-group">
						<label for="current_project_cost_high">Current Project Cost (High)</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type="number" class="form-control" id="current_project_cost_high" value="{{$item->current_project_cost_high}}">
						</div>
					</div>
					<div class="form-group">
						<label for="current_annual_o_m_cost_low">Current Annual OM Cost (Low)</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type="number" class="form-control" id="current_annual_o_m_cost_low" value="{{$item->current_annual_o_m_cost_low}}">
						</div>
					</div>	
					<div class="form-group">
						<label for="current_annual_o_m_cost_high">Current Annual OM Cost (High)</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type="number" class="form-control" id="current_annual_o_m_cost_high" value="{{$item->current_annual_o_m_cost_high}}">
						</div>
					</div>		
					<div class="form-group">
						<label for="current_annual_o_m_cost_percent_labor">Current Annual OM Cost Percent Labor</label>
						<div class="input-group mb-3">
							<input type="number" class="form-control" id="current_annual_o_m_cost_percent_labor" value="{{$item->current_annual_o_m_cost_percent_labor}}">
						<div class="input-group-append">
								<span class="input-group-text">%</span>
							</div>
						</div>
						
					</div>					
					<div class="form-group">
						<label for="useful_life_years">Useful Life (Years)</label>
						<input type="number" class="form-control" id="useful_life_years" value="{{$item->useful_life_years}}">
					</div>			
					<div class="form-group">
						<label for="replacement_cost">Replacement Cost</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type="number" class="form-control" id="replacement_cost" value="{{$item->replacement_cost}}">
						</div>
					</div>	
					<div class="form-group">
						<label for="advantages">Advantages</label>
						<textarea name="advantages" id="advantages" class="form-control"  rows="10">{{$item->advantages}}</textarea>
					</div>
					<div class="form-group">
						<label for="disadvantages">Disadvantages</label>
						<textarea name="disadvantages" id="disadvantages" class="form-control"  rows="10">{{$item->disadvantages}}</textarea>
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

			</form>
		
		
		
			<p>{{$item->image}}</p>
			<p>{{$item->show_on_Matrix}}</p>
			<p>{{$item->technology_system_type}}</p>
			<p>{{$item->show_in_wMVP}}</p>
			<p>{{$item->type_of_cost_spread}}</p>
        </div>
    </div>
</div>
@endsection