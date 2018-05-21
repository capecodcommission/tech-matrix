@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<h2>Inputs / Settings</h2>
			<p><a href="{{route('inputs.create')}}" class="btn btn-primary">Create new input</a></p>
			<table class="table">
				<tbody>
					@forelse($groups as $group)

						<tr>
							<th colspan="3">{{$group->input_group_label}}</th>
						</tr>
						<tr>
							<th>Input Label</th>
							<th>Input Value</th>
							<th>Edit</th>							
						</tr>
					
						@forelse($group->inputs as $item)
							<tr>
								<td><a href="{{route('inputs.show', $item->id)}}">{{$item->input_label}}</a></td>
								<td>{{$item->input_value}}</td>
								<td><a href="{{route('inputs.edit', $item->id)}}"><i class="fa fa-pencil"></i> Edit </a></td>

							</tr>
						@empty
							<tr>
								<td colspan="3">No Inputs Exist</td>
							</tr>
						@endforelse
					
					@empty

					@endforelse
				</tbody>
			</table>
        </div>
    </div>
</div>
@endsection