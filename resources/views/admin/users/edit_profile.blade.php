@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<h2>Edit Account</h2>
				<form action="{{route('update_profile')}}" method="POST">
					@csrf
					{{-- {!! method_field('PATCH') !!} --}}
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
					  </div>
					  <div class="form-group">
						<label for="email">Email address</label>
						<input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
					  </div>
					  <div class="form-group">
						  <label for="update_password">Update Password</label>
						  <input type="password" id="update_password" name="update_password">
					  </div>
					<div class="form-group">
						<input type="submit" value="Save Account">
					</div>
				</form>
			</div>
		</div>
	</div>
	
@endsection