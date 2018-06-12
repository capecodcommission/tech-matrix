@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
			<h2>Technologies</h2> (<a href="{{route('export')}}" target="_blank">Download the full list</a>)
			<table class="table">
				<thead>
					<tr>
						<th>Technology<br />Strategy</th>
						<th>Technology<br />ID</th>
						<th>Edit<br />Data</th>
						<th>Edit<br />Relationships</th>
						<th>Edit<br />Formulas</th>
						<th>Updated</th>
					</tr>
				</thead>
				<tbody>
					@forelse($list as $item)
						<tr>
							<td><a href="{{route('technologies.show', $item->id)}}">{{$item->technology_strategy}}</a></td>
							<td>{{$item->technology_id}}</td>
							<td><a href="{{route('technologies.edit', $item->id)}}"><i class="fal fa-edit"></i> </a></td>
							<td><a href="{{url('technologies/editRelationships', $item->id)}}"><i class="fal fa-project-diagram" title="Edit Relationships"></i></a></td>
							<td><a href="{{url('technologies/editFormulas', $item->id)}}"><i class="fal fa-calculator" title="Edit Formulas"></i></a></td>
							<td>{{$item->updated_at}}</td>
						</tr>
					@empty
						<tr>
							<td colspan="5">No Technologies Exist</td>
						</tr>
					@endforelse
				</tbody>
			</table>
        </div>
    </div>
</div>
@endsection