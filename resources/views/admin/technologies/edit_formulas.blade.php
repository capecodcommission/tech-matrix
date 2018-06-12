@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<p><a href="{{route('technologies.index')}}">Back to List</a></p>
				<h2>Edit formulas for {{$item->technology_strategy}}</h2>
				<p>
					<a href="{{route('formulas.create')}}" class="btn btn-primary btn-sm">Create new Formula</a>
				</p>
				<form action="{{url('technologies/updateFormulas')}}" method="POST">
					@csrf
					{{-- {!! method_field('PATCH') !!} --}}
					<input type="hidden" id="id" name="id" value="{{$item->id}}">

					<div class="form-group">
						<p><strong>Formulas</strong></p>
						@forelse($formulas as $each)
							<div class="form-check">
								<label class="form-check-label" for="formula_{{$each->id}}">
									<input class="form-check-input form-control-lg" type="checkbox" value="{{$each->id}}" name="formulas[]" id="formulas{{$each->id}}"  @if($item->formulas->contains($each->id)) checked='checked' @endif>
									{{$each->formula_label}} <button type="button" class="btn btn-sm btn-info" data-toggle="popover"  data-placement="bottom"  title="{{$each->formula_label}}" data-content="<code>{{$each->formula}}</code>">Show Formula</button>
								</label>
							</div>
						@empty
							No Formulas Available
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

@section('scripts')
	<script>
$(function () {
  $('button').popover({
	container: 'body',
	trigger: 'focus',
	html: true
  })
})
	</script>
@endsection