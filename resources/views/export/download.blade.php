<html>
<head>
	<title>Technology Matrix v2.0</title>
	<meta http-equiv="Content-Type" content="application/vnd.ms-excel; charset=utf-8" /> 
	<link rel="stylesheet" href="css/xls.css" />
</head>
<body>
<h1>Technologies Matrix</h1>

<table class="users admin table">
	<thead>
		<tr>
			<th><strong>Technology Strategy</strong></th>
			<th><strong>Technology ID</strong></th>
			<th><strong>Technology Description</strong></th>
			<th><strong>Current Construction Cost (low)</strong></th>
			<th><strong>Current Construction Cost (high)</strong></th>
			<th><strong>Current Construction Cost (avg)</strong></th>
			<th><strong>Current Construction Cost Percent Labor</strong></th>
			<th><strong>Current Project Cost (low)</strong></th>
			<th><strong>Current Project Cost (high)</strong></th>
			<th><strong>Current Annual OM Cost (low)</strong></th>
			<th><strong>Current Annual OM Cost (high)</strong></th>
			<th><strong>Current Annual OM Cost (avg)</strong></th>
			<th><strong>Current Annual OM Cost Percent Labor</strong></th>
			<th><strong>Useful Life (Years)</strong></th>
			<th><strong>Replacement Cost</strong></th>
		</tr>
	</thead>
	<tbody>
		@forelse($list as $item)
			<tr>
				<td>{{$item->technology_strategy}}</td>
				<td>{{$item->technology_id }}</td>
				<td>{!! $item->technology_description !!}</td>
				<td>{{$item->current_construction_cost_low}}</td>
				<td>{{$item->current_construction_cost_high}}</td>
				<td>{{($item->current_construction_cost_high + $item->current_construction_cost_low)/2}}</td>
				<td>{{$item->current_construction_cost_percent_labor}}</td>
				<td>{{$item->current_project_cost_low}}</td>
				<td>{{$item->current_project_cost_high}}</td>
				<td>{{$item->current_annual_o_m_cost_low}}</td>
				<td>{{$item->current_annual_o_m_cost_high}}</td>
				<td>{{($item->current_annual_o_m_cost_high + $item->current_annual_o_m_cost_low)/2}}</td>
				<td>{{$item->current_annual_o_m_cost_percent_labor}}</td>
				<td>{{$item->useful_life_years}}</td>
				<td>{{number_format($item->replacement_cost)}}</td>
			</tr>
		@empty
			<tr>
				<td colspan="2">No  data available.</td>
			</tr>
		@endforelse
		
		<tr><td colspan="4">Exported on : (date)</td></tr>
	</tbody>
</table>
</body>
</html>	