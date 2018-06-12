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
					<label for="formula">Formula</label>
					<textarea class="form-control" id="formula" name="formula" rows="10" ></textarea>
					<small class="form-text text-muted">Use @input and #parameter to denote parameters or input variables. See list of possible inputs and field names below.</small>
				  </div>
				<div class="row">  
				  <div class="col-lg-6">
					<h3>Input Parameters</h3>
					<ul>
						@forelse($inputs as $input)
							<li>$${{$input->input_name}} <a class="add btn btn-outline-primary btn-sm" data-text="$${{$input->input_name}}">Add</a></li>
							@empty
								<li>No Input Parameters Available.</li>
							@endforelse
					</ul>
				  </div>
				  <div class="col-lg-6">
					<h3>Field Names</h3>
					<ul>
						@forelse($fields as $each)
							<li>#{{$each}} <a class="add btn btn-outline-primary btn-sm" data-text="#{{$each}}">Add</a></li>
							@empty
								<li>No field names available.</li>
							@endforelse
					</ul>
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
@endsection

@section('scripts')
	<script>
		jQuery('.add').on('click', function(e){
			var thing = e.target;
			var what = jQuery(thing).data('text');
			console.log(what);
			addToFormula(what);
		});
		// document.getElementsByClassName("copy").addEventListener("click", function(e) {
		// 	copyToClipboard(e.target.value());
		// });

		function addToFormula(elem) {
			console.log("inside addToFormula " + elem);
			var newVal = jQuery('#formula').val() + elem;
			jQuery('#formula').val(newVal);
					// document.body.appendChild(target);
			
		}
	</script>
	<link rel="stylesheet" href="/tech_matrix_v2/css/redactor.css" />
	<script src="/tech_matrix_v2/js/redactor.js"></script>
		<script type="text/javascript">
			$(function()
			{
				$('textarea.form-control').redactor();
			});
		</script>
@endsection