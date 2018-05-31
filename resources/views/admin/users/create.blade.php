@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<p><a href="{{route('users.index')}}">Back to List</a></p>
			<h2>Create New User</h2>
			<form action="{{route('users.store')}}" method="POST">
					@csrf
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name" name="name" value="">
				  </div>
				  <div class="form-group">
					<label for="email">Email address</label>
					<input type="text" class="form-control" id="email" name="email" value="">
				  </div>
				  <div class="form-group">
						<label for="role_id">User Role</label>
						<select class="form-control" id="role_id" name="role_id">
							<option>Select User Role</option>
							@forelse($roles as $role)
								<option value="{{$role->id}}">{{$role->display_name}}</option>
							@empty	
								<option value="">No Roles available</option>
							@endforelse
						</select>
				  </div>
				  	
				<div class="form-group">
					<input type="submit" value="Save User">
				</div>
			</form>
					
		</div>
	</div>
</div>
@endsection