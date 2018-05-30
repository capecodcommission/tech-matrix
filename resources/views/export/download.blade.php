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
<h1>Technologies Matrix</h1>

<table class="users admin table">
	<thead>
		<tr>
			<th><strong>Technology Type</strong></th>
			<th><strong>Technology Strategy</strong></th>
			<th><strong>Technology<br /> ID</strong></th>
			<th><strong>Technology Description</strong></th>
			<th><strong>Influent Sources</strong></th>
			<th><strong>Influent Concentration</strong></th>
			<th><strong>Pollutants Treated</strong></th>
			<th><strong>Potential Permitting Agencies</strong></th>
			<th><strong>Siting Requirements</strong></th>
			<th><strong>Unit Metric</strong></th>
			<th><strong>Current Construction <br />Cost (low)</strong></th>
			<th><strong>Current Construction<br /> Cost (high)</strong></th>
			<th><strong>Current Construction<br /> Cost (avg)</strong></th>
			<th><strong>Current Construction Cost Percent Labor</strong></th>
			<th><strong>Current Project Cost (low)</strong></th>
			<th><strong>Current Project Cost (high)</strong></th>
			<th><strong>Current Annual OM Cost (low)</strong></th>
			<th><strong>Current Annual OM Cost (high)</strong></th>
			<th><strong>Current Annual OM Cost (avg)</strong></th>
			<th><strong>Current Annual OM Cost Percent Labor</strong></th>
			<th><strong>Useful Life (Years)</strong></th>
			<th><strong>Replacement Cost</strong></th>
			<th><strong>System Design Considerations</strong></th>
			<th><strong>Advantages</strong></th>
			<th><strong>Disadvantages</strong></th>
			<th><strong>Eco Services</strong></th>
			<th><strong>Evaluation Monitoring</strong></th>
			<th><strong>Longterm Monitoring</strong></th>
			<th><strong>Piloting Status <br />DEP Approval</strong></th>
			<th><strong>Pilot Study Findings</strong></th>
			<th><strong>Public Acceptance</strong></th>
		</tr>
	</thead>
	<tbody>
		@forelse($list as $item)
			<tr>
				<td>@if($item->technology_type_id != NULL){{$item->technology_type->technology_type}}@endif</td>
				<td>{{$item->technology_strategy}}</td>
				<td>{{$item->technology_id }}</td>
				<td>{{ $item->technology_description }}</td>
				<td>@forelse($item->influent_sources as $each)
						{{$each->influent_source}}<br />
					@empty
						No Influent Sources Identified.
					@endforelse
				</td>
				<td>(Influent Concentration here)</td>
				<td>@forelse($item->pollutants as $each)
						{{$each->pollutant}}<br />
					@empty
						No pollutants identified.
					@endforelse
				</td>
				<td>@forelse($item->permitting_agencies as $each)
					{{$each->potential_agency}}<br />
					@empty
						No permitting agencies identified.
					@endforelse
				</td>
				<td>@forelse($item->siting_requirements as $each)
					{{$each->siting_requirement}}<br />
					@empty
						No siting requirements identified.
					@endforelse
				</td>
				<td>{{$item->unit_metric->unit_metric}}</td>
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
				<td>@forelse($item->system_design_considerations as $each)
						{{$each->infrastructure_to_consider}}<br />
					@empty No system design considerations identified.
					@endforelse</td>
				<td class="text">{{$item->advantages}}</td>
				<td class="text">{{$item->disadvantages}}</td>	
				<td>@forelse($item->ecosystem_services as $each)
						{{$each->ecosystem_service}}<br />
					@empty No ecosystem services identified.
					@endforelse
				</td>
				<td class="text">@forelse($item->evaluation_monitoring as $each)
						* {{$each->monitoring }}<br />
					@empty
						No Evaluation Monitoring Assigned yet.
					@endforelse
				</td>
				<td class="text">@forelse($item->longterm_monitoring as $each)
						* {{$each->monitoring }}<br />
					@empty
						No Long Term Monitoring Assigned yet.
					@endforelse
				</td>
				<td>{{$item->piloting_status->pilot_status}}</td>
				<td>{{$item->pilot_study_findings}}</td>
				<td class="text">{{$item->public_acceptance}}</td>
				
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