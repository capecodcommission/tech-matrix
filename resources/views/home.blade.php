@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                <div class="title m-b-md">
                    Tech Matrix v2.0
				</div>
				<div>
					<ul>
						<li><a href="{{route('technologies.index')}}">View Technologies</a></li>
						<li><a href="{{route('export')}}" target="_blank">Export the Tech Matrix</a></li>
					</ul>
				</div>
				
            </div>
        </div>
    </div>
</div>
@endsection
