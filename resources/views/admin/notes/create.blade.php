@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<p><a href="{{route('technologies.index')}}">Back to List</a></p>
			<h2>Create New Note</h2>
			<form action="{{route('notes.store')}}" method="POST">
					@csrf
				
				  <div class="form-group">
					<label for="note">Notes</label>
					<textarea class="form-control" id="note" name="note" rows="10" ></textarea>
				  </div>
				  
				<div class="form-group">
					<input type="submit" value="Save Note">
				</div>
			</form>
					
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