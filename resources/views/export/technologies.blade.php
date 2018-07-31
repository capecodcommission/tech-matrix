<html>
<head>
	<title>Technology Matrix v2.0</title>
	<meta http-equiv="Content-Type" content="application/vnd.ms-excel; charset=utf-8" /> 
	<link rel="stylesheet" href="css/xls.css" />
</head>
<body>
<table class="users admin table">
	<thead>
		<tr>
			<th colspan = "10"><h1>Technologies Matrix</h1></th>
			<th colspan="6">Nutrient Reduction (Percent)</th>
			<th colspan="6">Nutrient Removed Per Year (kg)</th>
			<th colspan="2">Nutrient Removed Per Planning Period (kg)</th>
			<th colspan = "3">Current Project Cost</th>
		</tr>
		<tr style="border-bottom: 1px solid #000">
			<th><strong>Technology Type</strong></th>
			<th><strong>Technology Strategy</strong></th>
			<th><strong>Technology<br /> ID</strong></th>
			{{-- <th><strong>Icon</strong></th> --}}
			<th><strong>Icon File</strong></th>
			<th><strong>Technology Description</strong></th>
			<th><strong>Influent Sources</strong></th>
			<th><strong>Influent Concentration</strong></th>
			<th><strong>Baseline <br />Concentration (N)</strong></th>
			<th><strong>Baseline <br />Concentration (P)</strong></th>
			<th><strong>Pollutants Treated</strong></th>
			<th><strong>Potential Permitting Agencies</strong></th>
			<th><strong>Siting Requirements</strong></th>
			<th><strong>Unit Metric</strong></th>
			<th><strong><strong>Flow GPD</strong></strong></th>
			<th><strong>Nitrogen % <br /> (Low)</strong></th>
			<th><strong>Nitrogen % <br /> (High)</strong></th>
			<th><strong>Nitrogen % <br /> (Avg)</strong></th>
			<th><strong>Phosphorus % <br /> (Low)</strong></th>
			<th><strong>Phosphorus % <br /> (High)</strong></th>
			<th><strong>Phosphorus % <br /> (Avg)</strong></th>
			<th><strong>Nitrogen Removed <br />(kg) Low</strong></th>
			<th><strong>Nitrogen Removed <br /> (kg) High</strong></th>
			<th><strong>Nitrogen Removed <br />(kg) Avg</strong></th>
			<th><strong>Phosphorus Removed <br />per Year (kg) Low</strong></th>
			<th><strong>Phosphorus Removed <br />per Year (kg) High</strong></th>
			<th><strong>Phosphorus Removed <br />per Year (kg) Avg</strong></th>
			<th><strong>Nitrogen Removed <br />per Planning Period</strong></th>
			<th><strong>Phosphorus Removed <br />per Planning Period</strong></th>
			<th><strong>Current Construction <br />Cost (Low)</strong></th>
			<th><strong>Current Construction<br /> Cost (High)</strong></th>
			<th><strong>Current Construction<br /> Cost (Avg)</strong></th>
			<th><strong>Current Construction Cost Percent Labor</strong></th>
			<th><strong>Land Cost</strong></th>
			<th><strong>Current Project Cost (Low)</strong></th>
			<th><strong>Current Project Cost (High)</strong></th>
			<th><strong>Current Project Cost (Avg)</strong></th>
			<th><strong>Current Annual OM Cost (low)</strong></th>
			<th><strong>Current Annual OM Cost (high)</strong></th>
			<th><strong>Current Annual OM Cost (avg)</strong></th>
			<th><strong>Current Annual OM Cost Percent Labor</strong></th>
			<th><strong>Adjustment Factors <br />Project Cost</strong></th>
			<th><strong>Adjustment Factors <br />O &amp; M</strong></th>
			<th><strong>Adjusted Project <br />Cost (PV) Low</strong></th>
			<th><strong>Adjusted Project <br />Cost (PV) High</strong></th>
			<th><strong>Adjusted Project <br />Cost (PV) Avg</strong></th>
			<th><strong>Adjusted Annual O&amp;M <br />Cost (PV) Low</strong></th>
			<th><strong>Adjusted Annual O&amp;M <br />Cost (PV) High</strong></th>
			<th><strong>Adjusted Annual O&amp;M <br />Cost (PV) Avg</strong></th>
			<th><strong>Useful Life (Years)</strong></th>
			<th><strong>Replacement Cost</strong></th>
			<th><strong>Total Replacement<br />/Upgrade Cost</strong></th>
			<th><strong>Project Cost (PV)</strong></th>
			<th><strong>Avg Project Cost<br />per KG N Removed</strong></th>
			<th><strong>Avg O&amp;M Cost<br />per KG N Removed</strong></th>
			<th><strong>Avg Life Cycle Cost<br />per KG N Removed</strong></th>
			<th><strong>Avg Project Cost<br />per KG P Removed</strong></th>
			<th><strong>Avg O&amp;M Cost<br />per KG P Removed</strong></th>
			<th><strong>Avg Life Cycle Cost<br />per KG P Removed</strong></th>
			<th><strong>System Design Considerations</strong></th>
			<th><strong>Advantages</strong></th>
			<th><strong>Disadvantages</strong></th>
			<th><strong>Eco Services</strong></th>
			<th><strong>Evaluation Monitoring</strong></th>
			<th><strong>Longterm Monitoring</strong></th>
			<th><strong>Piloting Status <br />DEP Approval</strong></th>
			<th><strong>Pilot Study Findings</strong></th>
			<th>Detail Page</th>
			<th><strong>Last Updated</strong></th>
		</tr>
	</thead>
	<tbody>
		@forelse($list as $item)
			<tr> <?php $item->calc = $item->calculated(); ?>
				<td></td>
				<td>{{$item->technology_strategy}}</td>
				<td>{{$item->technology_id }}</td>
				{{-- <td><span style="display:inline-block; background-color:aqua"><img src="{{config('app.url')}}/icons/{{$item->icon}}" height="25" width="25" /></span></td> --}}
				<td>{{$item->icon}}</td>
				<td>{{$item->technology_description}}</td>
				<td>@forelse($item->influent_sources as $each)
						{{$each->influent_source}}<br />
					@empty
						No Influent Sources Identified.
					@endforelse
				</td>
				<td>(Influent Concentration here)</td>
				<td>{{$item->baseline_concentration_n}}</td>
				<td>{{$item->baseline_concentration_p}}</td>
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
				<td>{{$item->flow_gpd}}</td>
				<td>{{$item->n_percent_reduction_low}}%</td>
				<td>{{$item->n_percent_reduction_high}}%</td>
				<td>{{($item->n_percent_reduction_low + $item->n_percent_reduction_high) / 2}}</td> 
           		<td>{{$item->p_percent_reduction_low}}%</td>
				<td>{{$item->p_percent_reduction_high}}%</td>
				<td>{{($item->p_percent_reduction_low + $item->p_percent_reduction_high) / 2}}</td>
				<td>{{$item->calc->n_removed_low}}</td>
				<td>{{$item->calc->n_removed_high}}</td>
				<td>{{$item->calc->n_removed_avg}}</td>
				<td>{{$item->calc->n_removed_planning_period}}</td>
				<td>{{$item->calc->p_removed_low}}</td>
				<td>{{$item->calc->p_removed_high}}</td>
				<td>{{$item->calc->p_removed_avg}}</td>
				<td>{{$item->calc->p_removed_planning_period}}</td>
				<td>{{$item->current_construction_cost_low}}</td>
				<td>{{$item->current_construction_cost_high}}</td>
				<td>{{($item->current_construction_cost_high + $item->current_construction_cost_low)/2}}</td>
				<td>{{$item->current_construction_cost_percent_labor}}</td>
				<td>{{$item->calc->land_cost}}</td>
				<td>{{$item->current_project_cost_low}}</td>
				<td>{{$item->current_project_cost_high}}</td>
				<td>{{($item->current_project_cost_high + $item->current_project_cost_low) / 2}}</td>
				<td>{{$item->current_annual_o_m_cost_low}}</td>
				<td>{{$item->current_annual_o_m_cost_high}}</td>
				<td>{{($item->current_annual_o_m_cost_high + $item->current_annual_o_m_cost_low)/2}}</td>
				<td>{{$item->current_annual_o_m_cost_percent_labor}}</td>
				<td>{{$item->adjustment_factor_project_cost}}</td>
				<td>{{$item->adjustment_factor_o_m_cost}}</td>
				<td>{{$item->calc->adj_project_cost_low}}</td>
				<td>{{$item->calc->adj_project_cost_high}}</td>
				<td>{{$item->calc->adj_project_cost_avg}}</td>
				<td>{{$item->calc->adj_o_m_cost_low}}</td>
				<td>{{$item->calc->adj_o_m_cost_high}}</td>
				<td>{{$item->calc->adj_o_m_cost_avg}}</td>
				<td>{{$item->useful_life_years}}</td>
				<td>{{$item->calc->replacement_cost}}</td>
				<td>{{$item->calc->total_replacement_cost}}</td>
				<td>{{$item->calc->project_cost_pv}}</td>
				<td>{{$item->calc->cost_per_kg_avg_project_cost_n}}</td>
				<td>{{$item->calc->cost_per_kg_avg_om_cost_n}}</td>
				<td>{{$item->calc->cost_per_kg_avg_lifecycle_cost_n}}</td>
				<td>{{$item->calc->cost_per_kg_avg_project_cost_p}}</td>
				<td>{{$item->calc->cost_per_kg_avg_om_cost_p}}</td>
				<td>{{$item->calc->cost_per_kg_avg_lifecycle_cost_p}}</td>
				<td>@forelse($item->system_design_considerations as $each)
						{{$each->infrastructure_to_consider}}<br />
					@empty No system design considerations identified.
					@endforelse
				</td>
				<td>@forelse(striplist($item->advantages) as $each)
					* {{$each}}<br />
					@empty --
					@endforelse
				</td>
				<td>@forelse(striplist($item->disadvantages) as $each)
					* {{$each}}<br />
					@empty --
					@endforelse
				</td>	
				<td>@forelse($item->ecosystem_services as $each)
						{{$each->ecosystem_service}}<br />
					@empty No ecosystem services identified.
					@endforelse
				</td>
				<td>@forelse($item->evaluation_monitoring as $each)
						* {{$each->monitoring}}<br />
					@empty
						No Evaluation Monitoring Assigned yet.
					@endforelse
				</td>
				<td>@forelse($item->longterm_monitoring as $each)
						* {{$each->monitoring }}<br />
					@empty
						No Long Term Monitoring Assigned yet.
					@endforelse
				</td>
				<td>@if($item->piloting_status_id != NULL){{$item->piloting_status->pilot_status}}@endif</td>
				<td>{{$item->pilot_study_findings}}</td>
				<td><a href="{{route('technologies.show', $item->id)}}">View Detail</a></td>
				<td>{{$item->updated_at}}</td>
			</tr>
		@empty
			<tr>
				<td colspan="2">No  data available.</td>
			</tr>
		@endforelse
		
		<tr><td colspan="4">Exported on : <?php echo date('M d, Y'); ?></td></tr>
	</tbody>
</table>
</body>
</html>	