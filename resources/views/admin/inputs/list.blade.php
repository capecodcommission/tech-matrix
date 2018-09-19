@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<h2>Inputs / Settings</h2>
			@role('admin|tech editor|text editor')
				<p><a href="{{route('inputs.create')}}" class="btn btn-primary">Create new input</a></p>
			@endrole
			<table class="table">
				<tbody>
					@forelse($groups as $group)

						<tr>
							<th colspan="3">{{$group->input_group_label}}</th>
						</tr>
						<tr>
							<th>Input Label</th>
							<th>Input Value</th>
							@role('admin|tech editor|text editor')
							<th>Edit</th>	
							@endrole						
						</tr>
					
						@forelse($group->inputs as $item)
							<tr>
								<td>{{$item->input_label}}</td>
								<td>{{$item->input_value}}</td>
								@role('admin|tech editor|text editor')
								<td><a href="{{route('inputs.edit', $item->id)}}"><i class="fal fa-edit"></i> </a></td>
								@endrole
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