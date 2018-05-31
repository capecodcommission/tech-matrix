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
					<p><strong>User Roles</strong></p>
					@forelse($roles as $each)
						<div class="form-check">
							<label class="form-check-label" for="role_{{$each->id}}">
								<input class="form-check-input form-control-lg" type="checkbox" value="{{$each->id}}" name="roles[]" id="role_{{$each->id}}">
								{{$each->name}}
							</label>
						</div>
					@empty
						No Roles Available
					@endforelse
				</div>
				  	
				<div class="form-group">
					<input type="submit" value="Save User">
				</div>
			</form>
					
		</div>
	</div>
</div>
@endsection