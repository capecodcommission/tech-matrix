<html>
<head>
	<title>{{$data->title}}</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link rel="stylesheet" href="css/xls.css" />
</head>
<body>
<h1>Technologies Matrix</h1>

<table class="users admin table">
	<thead>
		<tr>
			<th>Technology Strategy</th>
			<th>Technology ID</th>
			
		</tr>
	</thead>
	<tbody>
		@forelse($data->list as $item)
			<tr>
				<td>{{$item->technology_strategy}}</td>
				<td>{{$item->technology_id }}</td>
				
			</tr>
		@empty
			<tr>
				<td colspan="2">No  data available.</td>
			</tr>
		@endforelse
		
		<tr><td colspan="4">Exported on {{$data->timestamp}}</td></tr>
	</tbody>
</table>
</body>
</html>	