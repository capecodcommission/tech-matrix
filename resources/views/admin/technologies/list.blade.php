@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
			<h2>Technologies</h2> (<a href="{{route('export')}}" target="_blank">Download the full list</a>)
			<table class="table">
				<thead>
					<tr>
						<th>Technology Strategy</th>
						<th>Technology ID</th>
						<th>Edit</th>
						<th>Edit Relationships</th>
					</tr>
				</thead>
				<tbody>
					@forelse($list as $item)
						<tr>
							<td><a href="{{route('technologies.show', $item->id)}}">{{$item->technology_strategy}}</a></td>
							<td>{{$item->technology_id}}</td>
							<td><a href="{{route('technologies.edit', $item->id)}}"><i class="fa fa-pencil"></i> Edit </a></td>
							<td><a href="{{url('technologies/editRelationships', $item->id)}}"><i class="fa fa-pencil"></i> Edit Relationships</a></td>

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