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
			<th>Technology Type</th>
			<th>Technology Strategy</th>
			<th>Technology<br /> ID</th>
			{{-- <th>Icon</th> --}}
			<th>Icon File</th>
			<th>Technology Description</th>
			<th>Influent Sources</th>
			<th>Influent Concentration</th>
			<th>Baseline <br />Concentration (N)</th>
			<th>Baseline <br />Concentration (P)</th>
			<th>Pollutants Treated</th>
			<th>Potential Permitting Agencies</th>
			<th>Siting Requirements</th>
			<th>Unit Metric</th>
			<th>Metric Input</th>
			<th>Flow GPD</th>
			<th>Nitrogen % <br /> (Low)</th>
			<th>Nitrogen % <br /> (High)</th>
			<th>Nitrogen % <br /> (Avg)</th>
			<th>Phosphorus % <br /> (Low)</th>
			<th>Phosphorus % <br /> (High)</th>
			<th>Phosphorus % <br /> (Avg)</th>
			<th>Nitrogen Removed <br />(kg) Low</th>
			<th>Nitrogen Removed <br /> (kg) High</th>
			<th>Nitrogen Removed <br />(kg) Avg</th>
			<th>Phosphorus Removed <br />per Year (kg) Low</th>
			<th>Phosphorus Removed <br />per Year (kg) High</th>
			<th>Phosphorus Removed <br />per Year (kg) Avg</th>
			<th>Nitrogen Removed <br />per Planning Period</th>
			<th>Phosphorus Removed <br />per Planning Period</th>
			<th>Current Construction <br />Cost (Low)</th>
			<th>Current Construction<br /> Cost (High)</th>
			<th>Current Construction<br /> Cost (Avg)</th>
			<th>Current Construction Cost Percent Labor</th>
			<th>Land Cost</th>
			<th>Current Project Cost (Low)</th>
			<th>Current Project Cost (High)</th>
			<th>Current Project Cost (Avg)</th>
			<th>Current Annual OM Cost (low)</th>
			<th>Current Annual OM Cost (high)</th>
			<th>Current Annual OM Cost (avg)</th>
			<th>Current Annual OM Cost Percent Labor</th>
			<th>Adjustment Factors <br />Project Cost</th>
			<th>Adjustment Factors <br />O &amp; M</th>
			<th>Adjusted Project <br />Cost (PV) Low</th>
			<th>Adjusted Project <br />Cost (PV) High</th>
			<th>Adjusted Project <br />Cost (PV) Avg</th>
			<th>Adjusted Annual O&amp;M <br />Cost (PV) Low</th>
			<th>Adjusted Annual O&amp;M <br />Cost (PV) High</th>
			<th>Adjusted Annual O&amp;M <br />Cost (PV) Avg</th>
			<th>Useful Life (Years)</th>
			<th>Replacement Cost</th>
			<th>Total Replacement<br />/Upgrade Cost</th>
			<th>Project Cost (PV)</th>
			<th>Avg Project Cost<br />per KG N Removed</th>
			<th>Avg O&amp;M Cost<br />per KG N Removed</th>
			<th>Avg Life Cycle Cost<br />per KG N Removed</th>
			<th>Avg Project Cost<br />per KG P Removed</th>
			<th>Avg O&amp;M Cost<br />per KG P Removed</th>
			<th>Avg Life Cycle Cost<br />per KG P Removed</th>
			<th>System Design Considerations</th>
			<th>Advantages</th>
			<th>Disadvantages</th>
			<th>Eco Services</th>
			<th>Evaluation Monitoring</th>
			<th>Est. Annual<br />Evaluation Monitoring Costs</th>
			<th>Estimated Years of<br />Evaluation Monitoring Req.</th> 	
			<th>Longterm Monitoring</th>
			<th>Est. Annual<br />O.M. Monitoring Costs</th>
			<th>Time to Improve Estuary Water</th>
			<th>Piloting Status <br />DEP Approval</th>
			<th>Pilot Study Findings</th>
			<th>Detail Page</th>
			<th>Last Updated</th>
		</tr>
	</thead>
	<tbody>
		@forelse($list as $item)
			<tr> <?php $item->calc = $item->calculated(); ?>
				<td>{{$item->technology_type->technology_type}}</td>
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
				<td>{{$item->metric_input}}</td>
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
				<td>{{$item->evaluation_monitoring_cost->est_annual_cost}}</td>
				<td>{{$item->years_of_evaluation_monitoring->length_of_time}}</td>								
				<td>@forelse($item->longterm_monitoring as $each)
						* {{$each->monitoring }}<br />
					@empty
						No Long Term Monitoring Assigned yet.
					@endforelse
				</td>
				<td>{{$item->longterm_monitoring_cost->est_annual_cost}}</td>					
				<td>@forelse($item->time_to_improve_estuary as $each)
						{{$each->length_of_time}}
					@empty
						No Time to Improve Estuary Water range assigned.
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