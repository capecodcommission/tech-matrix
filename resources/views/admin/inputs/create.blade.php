@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<p><a href="{{route('inputs.index')}}">Back to List</a></p>
			<h2>Create New Input</h2>
			<form action="{{route('inputs.store')}}" method="POST">
					@csrf
				<div class="form-group">
					<label for="input_name">Input Name</label>
					<input type="text" class="form-control" id="input_name" name="input_name" value="">
					<small id="inputNameHelp" class="form-text text-muted">This needs to be unique to identify this setting/value in calculations.</small>

				  </div>
				  <div class="form-group">
					<label for="input_label">Input Label</label>
					<input type="text" class="form-control" id="input_label" name="input_label" value="">
					<small id="inputLabelHelp" class="form-text text-muted">This is the user-friendly label that appears in the browser.</small>

				  </div>
				  
				  <div class="form-group">
					<label for="input_description">Input Description</label>
					<textarea class="form-control" id="input_description" name="input_description" rows="10" ></textarea>
					<small class="form-text text-muted">Longer desription of this input and/or how it's used (optional).</small>
				  </div>
				  <div class="form-group">
					  <label for="input_value">Input value</label>
					<input type="text" name="input_value" id="input_value" class="form-control">
					<small class="form-text text-muted">Enter value only, no formatting($, %, etc).</small>

				  </div>
					<div class="form-group">
						<label for="input_group_id">Input Group</label>
						<select class="form-control" id="input_group_id" name="input_group_id">
						
							<option value="0">None</option>
							@forelse($groups as $each)
								<option value="{{$each->id}}">{{$each->input_group_label}}</option>
							@empty
								No Input Groups available.
							@endforelse
						</select>
						<small class="form-text text-muted">Does this belong to an Input Group? (optional)</small>
					</div>
				{{-- Do Inputs have pollutant relationship??
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
					--}}

				<div class="form-group">
					<input type="submit" value="Save Input">
				</div>
			</form>
					
		</div>
	</div>
</div>
@endsection