@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
			<h2>Users</h2> 
			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Permissions</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@forelse($list as $item)
						<tr>
							<td><a href="{{route('users.show', $item->id)}}">{{$item->name}}</a></td>
							<td>{{$item->email}}</td>
							<td> </td>
							<td><a href="{{route('users.edit', $item->id)}}"><i class="fa fa-pencil"></i> Edit </a></td>
							<td> 
								<form method="POST" action="{{route('users.destroy', $item->id)}}" accept-charset="UTF-8" class="delete_form">
										<input name="_method" type="hidden" value="DELETE"> 
										@csrf
										<button class="is-danger button is-inverted"><span class="icon"><i class="fa fa-trash"></i></span> delete</button> 
									</form></td>

						</tr>
					@empty
						<tr>
							<td colspan="3">No Users Exist</td>
						</tr>
					@endforelse
				</tbody>
			</table>
        </div>
    </div>
</div>
@endsection