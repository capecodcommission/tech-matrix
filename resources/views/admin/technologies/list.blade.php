@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<h2>Technologies</h2>
			<table class="table">
				<thead>
					<tr>
						<th>Technology Strategy</th>
						<th>Technology Type</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					@forelse($list as $item)
						<tr>
							<td><a href="{{route('technologies.show', $item->id)}}">{{$item->technology_strategy}}</a></td>
							<td>{{$item->Technology_Type}}</td>
							<td><a href="{{route('technologies.edit', $item->id)}}"><i class="fa fa-pencil"></i> Edit </a></td>
						</tr>
					@empty
						<tr>
							<td colspan="3">No Technologies Exist</td>
						</tr>
					@endforelse
				</tbody>
			</table>
        </div>
    </div>
</div>
@endsection