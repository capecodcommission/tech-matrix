@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
			<h2>Notes</h2> (<a href="{{route('notes.create')}}">Create new Note</a>)
			<table class="table">
				<thead>
					<tr>
						<th>Note ID</th>
						<th>Note</th>
						<th>Last Updated</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@forelse($list as $item)
						<tr>
							<td><a href="{{route('notes.show', $item->id)}}">{{$item->id}}</a></td>
							<td>{{$item->note}}</td>
							<td>{{$item->updated_at}}</td>
							<td><a href="{{route('notes.edit', $item->id)}}"><i class="fa fa-pencil"></i> Edit </a></td>
							<td>{!! Form::open(['route' => ['notes.destroy',$item->id], 
                                        'method'    => 'delete',
                                        'class'     =>'delete_form'
                                        ])  !!}
                             <button class="is-danger button is-inverted"><span class="icon"><i class="fa fa-trash"></i></span> delete</button>           
            {!! Form::close() !!}</td>

						</tr>
					@empty
						<tr>
							<td colspan="3">No Notes Exist</td>
						</tr>
					@endforelse
				</tbody>
			</table>
        </div>
    </div>
</div>
@endsection