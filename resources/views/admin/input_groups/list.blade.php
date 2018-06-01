@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<h2>Input Groups</h2>
			<p><a href="{{route('input_groups.create')}}" class="btn btn-primary">Create new Input Group</a></p>
			<table class="table">
				<thead>
					<tr>
						<th>Input Group Label</th>
						{{-- <th>Technology Type</th> --}}
						{{-- <th>Input Name</th> --}}
						<th>Edit</th>
						
					</tr>
				</thead>
				<tbody>
					@forelse($list as $item)
						<tr>
							<td><a href="{{route('input_groups.show', $item->id)}}">{{$item->input_group_label}}</a></td>
							{{-- <td>{{$item->input_value}}</td> --}}
							<td><a href="{{route('input_groups.edit', $item->id)}}"><i class="fal fa-edit"></i> </a></td>

						</tr>
					@empty
						<tr>
							<td colspan="3">No Input Groups Exist</td>
						</tr>
					@endforelse
				</tbody>
			</table>
        </div>
    </div>
</div>
@endsection