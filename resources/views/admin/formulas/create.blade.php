@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-12">
			<p><a href="{{route('formulas.index')}}">Back to List</a></p>
			<h2>Create New Formula</h2>
			<form action="{{route('formulas.store')}}" method="POST">
					@csrf
				<div class="form-group">
					<label for="formula_label">Formula Label</label>
					<input type="text" class="form-control" id="formula_label" name="formula_label" value="">
				  </div>
				  
				   <div class="form-group">
				  	<h3>Does this formula contain a conditional?</h3> 
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="is_conditional" id="is_conditional_yes" value="1" >
						  <label class="form-check-label" for="is_conditional_yes">Yes</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="is_conditional" id="is_conditional_no" value="0"   checked >
						  <label class="form-check-label" for="is_conditional_no">No</label>
						</div>
				  </div>
				  <div class="form-group">
					<label for="formula">Formula</label>
					<textarea class="form-control code" id="formula" name="formula" rows="10" ></textarea>
					<small class="form-text text-muted">Use @input and #parameter to denote parameters or input variables. See list of possible inputs and field names below.</small>
				  </div>
				<div class="row">
					<div class="col-lg-4">
						<h3>Inputs</h3>
						<table class="table">
							<thead>
								<tr>
									<th>Input</th>
									<th>Current Value</th>
									<th>Add</th>
								</tr>
							</thead>
						
							@forelse($inputs as $input)
								<tr><td>$${{$input->input_name}}</td>
									<td>{{$input->input_value}}</td>
									<td><a class="add btn btn-outline-primary btn-sm" data-text="$${{$input->input_name}}%%">Add</a></td>
								</tr>
								@empty
									<tr><td colspan="2">No Input Parameters Available.</td></tr>
								@endforelse
						</table>
					</div>
				
					<div class="col-lg-4">
						<h3>Fields</h3>
						<table class="table">
							<thead>
								<tr>
									<th>Field</th>
									<th>Add</th>
								</tr>
							</thead>
							@forelse($fields as $each)
								<tr>
									<td>##{{$each}}</td>
									<td><a class="add btn btn-outline-primary btn-sm" data-text="##{{$each}}">Add</a></td>
								</tr>
							@empty
								<tr><td colspan="2">No field names available.</td></tr>
							@endforelse
						</table>
					</div>
					<div class="col-lg-4">
						<h3>Formulas</h3>
						<table class="table">
							<thead>
								<tr>
									<th>Formula</th>
									<th>Show</th>
									<th>Add</th>
								</tr>
							</thead>
							
							@forelse($formulas as $each)
								<tr>
									<td>
										{{$each->formula_label}}
									</td>
									<td><button type="button" class="btn btn-sm btn-info" data-toggle="popover"  data-placement="bottom"  title="{{$each->formula_label}}" data-content="<code>{{$each->formula}}</code>">Show</button></td>
									<td>
										<a class="add btn btn-outline-primary btn-sm" data-text="!!{{$each->formula_name}}^^">Add</a>
									</td>
								</tr> 
							@empty
								<tr><td colspan="2">No Formulas Available.</td></tr>
							@endforelse
						</table>
					  </div>
				</div>
				  <div class="col-lg-12">
					  
				<div class="col-lg-12">
						<h3>Formula Description (optional)</h3>
						<textarea name="formula_description" id="formula_description" cols="30" rows="10" class="form-control"></textarea>
					</div>
				  </div>

				<div class="form-group">
					<input type="submit" value="Save Formula">
				</div>
			</form>
					
		</div>
	</div>
</div>
<style type="text/css">
	textarea#formula { font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
}

</style>
@endsection

@section('scripts')
	<script>
		jQuery('.add').on('click', function(e){
			var thing = e.target;
			var what = jQuery(thing).data('text');
			addToFormula(what);
		});

		function addToFormula(elem) {
			var newVal = jQuery('#formula').val() + elem;
			jQuery('#formula').val(newVal);
			
		}
	</script>

@endsection