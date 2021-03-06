@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
			<h2>Users</h2> 
			<p><a href="{{route('users.create')}}" class="btn btn-primary">Create new User</a></p>
			<table class="table">
				<thead class="thead-light">
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Role</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@forelse($list as $item)
						<tr>
							<td><a href="{{route('users.show', $item->id)}}">{{$item->name}}</a></td>
							<td>{{$item->email}}</td>
							<td>@forelse($item->getRoleNames() as $each) {{$each}}<br /> @empty -- @endforelse</td>
							<td><a href="{{route('users.edit', $item->id)}}"><i class="fal fa-edit"></i> </a></td>
							<td> 
								<form method="POST" action="{{route('users.destroy', $item->id)}}" accept-charset="UTF-8" class="delete_form">
										<input name="_method" type="hidden" value="DELETE"> 
										@csrf
										<button class="is-danger btn btn-danger"><span class="icon is-danger"><i class="fal fa-trash-alt" title="Delete User"></i></span></button>
									</form></td>

						</tr>
					@empty
						<tr>
							<td colspan="5">No Users Exist</td>
						</tr>
					@endforelse
					<thead class="thead-light">
<tr>	<th colspan="5">Deleted Users</th></tr>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th></th>
						<th>Edit</th>
						<th>Restore</th>
					</tr>
					</thead>
					
					@forelse($deleted as $item)

						<tr>
							<td><s><a href="{{route('users.show', $item->id)}}">{{$item->name}}</a></s></td>
							<td>{{$item->email}}</td>
							<td> </td>
							<td><a href="{{route('users.edit', $item->id)}}"><i class="fal fa-edit"></i> </a></td>
							<td> <a href="{{url('users/restore', $item->id)}}"><span class="icon"><i class="fal fa-undo"></i></span></a> </td>

						</tr>
					@empty
						<tr>
							<td colspan="5">No Users have been deleted.</td>
						</tr>
					@endforelse
				</tbody>
			</table>
        </div>
    </div>
</div>
@endsection