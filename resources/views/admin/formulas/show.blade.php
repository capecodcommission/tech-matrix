@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p><a href="{{route('formulas.index')}}">Back to List</a></p>

			<h2>{{$item->formula_label}}
				<span class="subtitle">(<a href="{{route('formulas.edit', $item->id)}}">Edit</a>)</span>
			</h2>
			
			<h3>Formula</h3>
			<div>				
				<code>	{{$item->formula}}</code>
			</div>

			<h3>Description (optional)</h3>
			<div>
				{{$item->formula_description}}
			</div>
			
        </div>
    </div>
</div>
@endsection