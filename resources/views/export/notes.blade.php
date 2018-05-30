<html>
<head>
	<title>Tech Matrix Notes</title>
	<meta http-equiv="Content-Type" content="application/vnd.ms-excel; charset=utf-8" /> 
	<link rel="stylesheet" href="css/xls.css" />
	<style type="text/css">
		td.text { width: 200px; border-left: 1px solid #f00; }
	</style>
</head>
<body>
<h1>Notes</h1>

<table class="users admin table">
	<thead>
		<tr>
			<th><strong></strong></th>
			<th><strong>Note</strong></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@forelse($list as $item)
			<tr>
				<td>{{$item->id}}</td>
				<td>{{$item->note}} </td>
				<td>@if($item->trashed()) Deleted: {{$item->deleted_at}} @endif</td>
			</tr>
		@empty
		<tr>
			<td></td>
			<td>No Notes</td>
			<td></td>
		</tr>
		@endforelse
	</tbody>
</table>
</body>
</html>	