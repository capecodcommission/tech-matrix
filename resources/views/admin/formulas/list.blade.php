@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
			<h2>Formulas</h2>
			<p><a href="{{route('formulas.create')}}" class="btn btn-primary">Create new formula</a></p>
			<table class="table">
				<tbody>
					{{-- @forelse($types as $type) --}}


						<tr>
							<th>Label</th>
							<th>Formula</th>
							<th>Edit</th>							
						</tr>
					
						@forelse($list as $item)
							<tr>
								<td><a href="{{route('formulas.show', $item->id)}}">{{$item->formula_label}}</a></td>
								<td>{{$item->formula}}</td>
								<td><a href="{{route('formulas.edit', $item->id)}}"><i class="fal fa-edit"></i> </a></td>

							</tr>
						@empty
							<tr>
								<td colspan="3">No Formulas Exist</td>
							</tr>
						@endforelse
					
				
				</tbody>
			</table>
        </div>
    </div>
</div>
@endsection