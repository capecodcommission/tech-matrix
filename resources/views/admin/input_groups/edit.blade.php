@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<p><a href="{{route('input_groups.index')}}">Back to List</a></p>
			<h2>Edit Input Group</h2>
			<form action="{{route('input_groups.update', $input_group->id)}}" method="POST">
					@csrf
					{!! method_field('PATCH') !!}
				<div class="form-group">
					<label for="input_group_name">Input Group Name</label>
					<input type="text" class="form-control" id="input_group_name" name="input_group_name" value="{{$input_group->input_group_name}}">
					<small id="inputNameHelp" class="form-text text-muted">This needs to be unique to identify this setting/value in calculations.</small>

				  </div>
				  <div class="form-group">
					<label for="input_group_label">Input Group Label</label>
					<input type="text" class="form-control" id="input_group_label" name="input_group_label" value="{{$input_group->input_group_label}}">
					<small id="inputLabelHelp" class="form-text text-muted">This is the user-friendly label that appears in the browser.</small>

				  </div>
				  
				  <div class="form-group">
					<label for="input_group_description">Input Group Description</label>
					<textarea class="form-control" id="input_group_description" name="input_group_description" rows="10" >{{$input_group->input_group_description}}</textarea>
					<small class="form-text text-muted">Longer desription of this input and/or how it's used (optional).</small>
				  </div>
				
				<div class="form-group">
					<input type="submit" value="Save Input Group">
				</div>
			</form>
					
		</div>
	</div>
</div>
@endsection