<html>
<head>
	<title>Inputs</title>
	<meta http-equiv="Content-Type" content="application/vnd.ms-excel; charset=utf-8" /> 
</head>
<body>
<h1>Input Settings</h1>

<table class="users admin table">
	<thead>
		<tr>
			<th><strong>Label</strong></th>
			<th><strong>Value</strong></th>
			<th><strong>Description</strong></th>
			<th><strong>Last updated</strong></th>
		</tr>
	</thead>
	<tbody>
		@forelse($list as $item)
			<tr>
				<td>{{$item->input_label}}</td>
				<td>{{$item->input_value }}</td>
				<td>{{ $item->input_description }}</td>
				<td>{{$item->updated_at}}</td>
			</tr>
		@empty
			<tr>
				<td colspan="4">No  inputs available.</td>
			</tr>
		@endforelse
		
		<tr><td colspan="4">Exported on : (date)</td></tr>
	</tbody>
</table>
</body>
</html>	