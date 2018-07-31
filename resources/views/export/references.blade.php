<html>
<head>
	<title>Technology References</title>
	<meta http-equiv="Content-Type" content="application/vnd.ms-excel; charset=utf-8" /> 
</head>
<body>
<table class="users admin table">
	<thead>
		<tr>
			<th><h1>Technologies Matrix</h1></th>
		</tr>
		<tr>
			<th><strong>Technology<br /> ID</strong></th>
			<th><strong>Technology Strategy</strong></th>
			<th><strong>Notes/References</strong></th>
			<th><strong>Last Updated</strong></th>
		</tr>
	</thead>
	<tbody>
		@forelse($list as $item)
			<tr>
				<td>{{$item->technology_id }}</td>
				<td>{{$item->technology_strategy}}</td>
				<td><div>{{ $item->references_notes_assumptions }}</div></td>
				<td>{{$item->updated_at}}</td>
			</tr>
		@empty
			<tr>
				<td colspan="3">No  data available.</td>
			</tr>
		@endforelse
		
		<tr><td colspan="4">Exported on : <?php echo date('M d, Y'); ?></td></tr>
	</tbody>
</table>
</body>
</html>	