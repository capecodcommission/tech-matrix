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
						<th>Delete/Restore</th>
					</tr>
				</thead>
				<tbody>
					@forelse($list as $item)
						<tr>
							@if($item->trashed())
								<td>{{$item->id}}</td>
								<td><s>{{$item->note}}</s></td>
								<td>Del: {{$item->deleted_at}}</td>
								<td>--</td>
								<td>
									<a href="{{url('notes/restore', $item->id)}}"> Restore</a>
								</td>
							@else
								<td><a href="{{route('notes.show', $item->id)}}">{{$item->id}}</a></td>
								<td>{{$item->note}}</td>
								<td>{{$item->updated_at}}</td>
								<td><a href="{{route('notes.edit', $item->id)}}"><i class="fa fa-pencil"></i> Edit </a></td>
								<td>
									<form method="POST" action="{{route('notes.destroy', $item->id)}}" accept-charset="UTF-8" class="delete_form">
										<input name="_method" type="hidden" value="DELETE"> 
										@csrf
										<button class="is-danger button is-inverted"><span class="icon"><i class="fa fa-trash"></i></span> delete</button> 
									</form>
							@endif

						</tr>
					@empty
						<tr>
							<td colspan="5">No Notes Exist</td>
						</tr>
					@endforelse
				</tbody>
			</table>
        </div>
    </div>
</div>
@endsection