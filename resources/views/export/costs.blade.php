<html>
<head>
	<title>Technology Matrix v2.0</title>
	<meta http-equiv="Content-Type" content="application/vnd.ms-excel; charset=utf-8" /> 
	<link rel="stylesheet" href="css/xls.css" />
	<style type="text/css">
		td.text { width: 200px; border-left: 1px solid #f00; }
	</style>
</head>
<body>
<h1>Technologies Matrix Cost Data</h1>

<table class="users admin table">
	<thead>
		<tr>
			
			<th><strong>Technology Strategy</strong></th>
			<th><strong>Technology<br /> ID</strong></th>
			<th><strong>Nitrogen Removed <br />per Year (kg) Low</strong></th>
			<th><strong>Nitrogen Removed <br />per Year (kg) High</strong></th>
			<th><strong>Nitrogen Removed <br />per Year (kg) Avg</strong></th>
			<th><strong>Nitrogen Removed <br />per Planning Period</strong></th>
			<th><strong>Phosphorus Removed <br />per Year (kg) Low</strong></th>
			<th><strong>Phosphorus Removed <br />per Year (kg) High</strong></th>
			<th><strong>Phosphorus Removed <br />per Year (kg) Avg</strong></th>
			<th><strong>Phosphorus Removed <br />per Planning Period</strong></th>

			<th><strong>Current Construction <br />Cost (Low)</strong></th>
			<th><strong>Current Construction<br /> Cost (High)</strong></th>
			<th><strong>Current Construction<br /> Cost (Avg)</strong></th>
			<th><strong>Current Construction Cost Percent Labor</strong></th>
			<th><strong>Current Project Cost (Low)</strong></th>
			<th><strong>Current Project Cost (High)</strong></th>
			<th><strong>Current Project Cost (Avg)</strong></th>
			<th><strong>Current Annual OM Cost (low)</strong></th>
			<th><strong>Current Annual OM Cost (high)</strong></th>
			<th><strong>Current Annual OM Cost (avg)</strong></th>
			<th><strong>Current Annual OM Cost Percent Labor</strong></th>
			<th><strong>Adjustment Factors <br />Project Cost</strong></th>
			<th><strong>Adjustment Factors <br />O & M</strong></th>
			<th><strong>Adjusted Project <br />Cost (PV) Low</strong></th>
			<th><strong>Adjusted Project <br />Cost (PV) High</strong></th>
			<th><strong>Adjusted Project <br />Cost (PV) Avg</strong></th>
			<th><strong>Adjusted Annual O&M <br />Cost (PV) Low</strong></th>
			<th><strong>Adjusted Annual O&M <br />Cost (PV) High</strong></th>
			<th><strong>Adjusted Annual O&M <br />Cost (PV) Avg</strong></th>
			<th><strong>Useful Life (Years)</strong></th>
			<th><strong>Replacement Cost</strong></th>
			<th><strong>Total Replacement<br />/Upgrade Cost</strong></th>
			<th><strong>Project Cost (PV)</strong></th>
			<th><strong>Last Updated</strong></th>
		</tr>
	</thead>
	<tbody>
		@forelse($list as $item)
			<tr>
				<td>{{$item->technology_strategy}}</td>
				<td>{{$item->technology_id }}</td>
				<td>{{$item->n_removed_low}}</td>
				<td>{{$item->n_removed_high}}</td>
				<td>{{$item->n_removed_avg}}</td>
				<td>{{$item->n_removed_planning_period}}</td>
				<td>{{$item->p_removed_low}}</td>
				<td>{{$item->p_removed_high}}</td>
				<td>{{$item->p_removed_avg}}</td>
				<td>{{$item->p_removed_planning_period}}</td>
				<td>{{$item->current_project_cost_low}}</td>
				<td>{{$item->current_project_cost_high}}</td>
				<td>{{($item->current_project_cost_high + $item->current_project_cost_low) / 2}}</td>
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
				<td>{{$item->adjustment_factor_project_cost}}</td>
				<td>{{$item->adjustment_factor_o_m_cost}}</td>
				<td>{{$item->adj_project_cost_low}}</td>
				<td>{{$item->adj_project_cost_high}}</td>
				<td>{{$item->adj_project_cost_avg}}</td>
				<td>{{$item->adj_o_m_cost_low}}</td>
				<td>{{$item->adj_o_m_cost_high}}</td>
				<td>{{$item->adj_o_m_cost_avg}}</td>
				<td>{{$item->useful_life_years}}</td>
				<td>{{number_format($item->replacement_cost)}}</td>
				<td>{{$item->total_replacement_cost}}</td>
				<td>{{$item->project_cost_pv}}</td>
				
				<td>{{$item->updated_at}}</td>
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