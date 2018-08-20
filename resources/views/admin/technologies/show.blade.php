@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<p><a href="{{route('technologies.index')}}">Back to List</a></p>
			<?php $item->calc = $item->calculated(); ?>
			
			<h2>{{$item->technology_strategy}} 
				<span class="subtitle">(<a href="{{route('technologies.edit', $item->id)}}">Edit</a>)</span>
			</h2>
			<div class="panel">
				<p><span style="display:inline-block; background-color:#52a9df"><img src="{{config('app.url')}}/icons/{{$item->icon}}" height="45" width="45" /></span></p>
				<div class="row">
					@forelse($item->ecosystem_services as $benefit)
						<p class="col-lg-3 col-sm-3" >
							<img src="http://10.10.1.205/cch2o/Matrix/icons/{{$benefit->icon}}" title="{{$benefit->ecosystem_service}}" />
						</p>
					@empty N/A
					@endforelse
				</div>
				<p><strong>Technology Strategy</strong>: {{$item->technology_strategy}}</p>
				<p><strong>Technology ID</strong>: {{$item->technology_id}}</p>
				<p><strong>Scale</strong>: @forelse($item->scales as $each){{$each->scale}} @empty -- @endforelse</p>
				<p><strong>Technology System Type</strong>: {{$item->technology_system_type}}</p>
			</div>
			<div class="accordion" id="accordion">
				<div class="card">
					<div class="card-header" id="headingDescription">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#description" aria-expanded="false" aria-controls="description">
								Technology Description
							</button>
						</h5>
					</div>
					<div id="description" class="collapse " aria-labelledby="headingDescription" data-parent="#accordion">
						<div class="card-body">
							<div>
								<p><strong>Description</strong></p>
									{!! $item->technology_description !!}
							</div>
						</div>
					</div>
				</div>
			
				<div class="card">
					<div class="card-header" id="headingCosts">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#costData" aria-expanded="false" aria-controls="costData">
								Cost Data
							</button>
						</h5>
					</div>

					<div id="costData" class="collapse " aria-labelledby="headingCosts" data-parent="#accordion">
						<div class="card-body">
						
							<p><strong>Construction Cost Percent Labor</strong>: {{$item->current_construction_cost_percent_labor}}%</p>
							<p><strong>Current Annual OM Cost Percent Labor</strong>: {{$item->current_annual_o_m_cost_percent_labor}}</p>
							<p><strong>Land Cost (per acre)</strong>: ${{$item->calc->land_cost}}</p>
							<p><strong>Useful Life (Years)</strong>: {{$item->useful_life_years}}</p>
							
							<div class="row">
								<table class="table col-lg-10 offset-lg-1 table-sm">
									<thead>
										<tr>
											<th colspan="3"><h5>Construction Costs</h5></th>
										</tr>
										<tr>
											<th>Low</th>
											<th>High</th>
											<th>Avg</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>${{number_format($item->current_construction_cost_low, 0, '.', ',')}}</td>
											<td>${{number_format($item->current_construction_cost_high, 0, '.', ',')}}</td>
											<td>${{number_format(($item->current_construction_cost_high + $item->current_construction_cost_low)/2, 0, '.', ',')}}</td>
										</tr>
									</tbody>
								</table>
								<table class="table col-lg-10 offset-lg-1 table-sm">
									<thead>
										<tr>
											<th colspan="3"><h5>Project Costs</h5></th>
										</tr>
										<tr>
											<th>Low</th>
											<th>High</th>
											<th>Avg</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>${{number_format($item->calc->current_project_cost_low, 0, '.', ',')}}</td>
											<td>${{number_format($item->calc->current_project_cost_high, 0, '.', ',')}}</td>
											<td>${{number_format(($item->calc->current_project_cost_low + $item->calc->current_project_cost_high/2), 0, '.', ',')}}</td>
										</tr>
										<tr>
											<td colspan="2">Project Cost Adjustment Factor</td>
											<td class="text-right">{{$item->calc->adjustment_factor_project_cost * 100}}%</td>
										</tr>
										<tr>
											<td colspan="2">Adjusted Project Cost (avg)</td>
											<td class="text-right">${{number_format($item->calc->adj_project_cost_avg, 0, '.', ',')}}</td>
										</tr>
										<tr>
											<td colspan="2">Project Cost (PV)</td>
											<td class="text-right">${{number_format($item->calc->project_cost_pv, 0, '.', ',')}}</td>
										</tr>
									</tbody>
								</table>
								<table class="table col-lg-10 offset-lg-1 table-sm">
									<thead>
										<tr>
											<th colspan="2"><h5>Replacement Costs</h5></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Replacement Cost</td>
											<td class="text-right">${{number_format($item->calc->replacement_cost, 0, '.', ',')}}</td>
										</tr>
										<tr>
											<td>Replacement Cost Factor</td>
											<td class="text-right">{{$item->calc->replacement_cost_factor}}%</td>
										</tr>
										<tr>
											<td>Total Replacement Cost</td>
											<td class="text-right">${{number_format($item->calc->total_replacement_cost, 0, '.', ',')}}</td>
										</tr>
									</tbody>
								</table>
								<table class="table col-lg-10 offset-lg-1 table-sm">
									<thead>
										<tr>
											<th colspan="3"><h5>Annual OM Costs</h5></th>
										</tr>
										<tr>
											<th>Low</th>
											<th>High</th>
											<th>Avg</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>${{number_format($item->calc->current_annual_o_m_cost_low, 0, '.', ',')}}</td>
											<td>${{number_format($item->calc->current_annual_o_m_cost_high, 0, '.', ',')}}</td>
											<td class="text-right">${{number_format(($item->calc->current_annual_o_m_cost_low + $item->calc->current_annual_o_m_cost_high/2), 0, '.', ',')}}</td>
										</tr>
										<tr>
											<td colspan="2">OM Cost Adjustment Factor</td>
											<td class="text-right">{{number_format($item->calc->adjustment_factor_o_m_cost, 0, '.', ',')}}</td>
										</tr>
										<tr>
											<td colspan="2">Adjusted OM Cost (avg)</td>
											<td class="text-right">${{number_format($item->calc->adj_o_m_cost_avg, 0, '.', ',')}}</td>
										</tr>
									</tbody>
								</table>
								<table class="table col-lg-10 offset-lg-1 table-sm">
									<thead>
										<tr>
											<th colspan="2"><h5>Costs per Kg Nitrogen Removed</h5></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Project Cost (avg)</td>
											<td class="text-right">${{number_format($item->calc->cost_per_kg_avg_project_cost_n, 0, '.', ',')}}</td>
										</tr>
										<tr>
											<td>OM Cost (avg)</td>
											<td class="text-right">${{number_format($item->calc->cost_per_kg_avg_om_cost_n, 0, '.', ',')}}</td>
										</tr>
										<tr>
											<td>Lifecycle Cost (avg)</td>
											<td class="text-right">${{number_format($item->calc->cost_per_kg_avg_lifecycle_cost_n, 0, '.', ',')}}</td>
										</tr>
									</tbody>
								</table>
								<table class="table col-lg-10 offset-lg-1 table-sm">
									<thead>	
										<tr>
											<th colspan="2"><h5>Costs per Kg Phosphorus Removed</h5></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Project Cost (avg)</td>
											<td class="text-right">${{number_format($item->calc->cost_per_kg_avg_project_cost_p, 0, '.', ',')}}</td>
										</tr>
										<tr>
											<td>OM Cost (avg)</td>
											<td class="text-right">${{number_format($item->calc->cost_per_kg_avg_om_cost_p, 0, '.', ',')}}</td>
										</tr>
										<tr>
											<td>Lifecycle Cost (avg)</td>
											<td class="text-right">${{number_format($item->calc->cost_per_kg_avg_lifecycle_cost_p, 0, '.', ',')}}</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="headingDetails">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#details" aria-expanded="false" aria-controls="details">
								Treatment Details
							</button>
						</h5>
					</div>
					<div class="collapse" id="details"  aria-labelledby="headingDetails" data-parent="#accordion">
						<div class="card-body">
								<div class="row">
									<div class="col-lg-12">
										<p><strong>Unit Metric</strong>: {{$item->unit_metric->unit_metric}}</p>
										<p><strong>Useful Life (years)</strong>: 
											{{$item->calc->useful_life_years}}</p>
										<p><strong>Flow GPD</strong>: {{$item->flow_gpd}}</p>
									<h5>Nutrient Removal</h5>
									<table class="table col-lg-12 offset-lg-1 table-sm">
										<thead>
											<tr>
												<th></th>
												<th><h5>Nitrogen</h5></th>
												<th><h5>Phosphorus</h5></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Percent Removal (low-high)</td>
												<td>{{$item->n_percent_reduction_low}}% - {{$item->n_percent_reduction_high}}%</td>
												<td>{{$item->p_percent_reduction_low}}% - {{$item->p_percent_reduction_high}}%</td>
											</tr>
											<tr>
												<td>Per Year</td>
												<td>{{$item->calc->n_removed_avg}}kg</td>
												<td>{{$item->calc->p_removed_avg}}kg</td>
											</tr>
											<tr>
												<td>Per Planning Period</td>
												<td>{{$item->calc->n_removed_planning_period}}kg</td>
												<td>{{$item->calc->p_removed_planning_period}}kg</td>
											</tr>
										</tbody>
									</table>
								</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="headingAdvantages">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#advData" aria-expanded="false" aria-controls="advData">
							Advantages &amp; Disadvantages
							</button>
						</h5>
					</div>

					<div id="advData" class="collapse " aria-labelledby="headingAdvantages" data-parent="#accordion">
						<div class="card-body">
							<div>
								<p><strong>Advantages</strong></p>
								{!! $item->advantages !!}
							</div>
							<div>
								<p><strong>Disadvantages</strong></p> 
								{!! $item->disadvantages!!}
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="headingReferences">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#referencesData" aria-expanded="false" aria-controls="referencesData">
								References, Notes, &amp; Assumptions
							</button>
						</h5>
					</div>
					<div class="collapse " id="referencesData" data-parent="#accordion">
						<div class="card-body">
							<div>
								<p><strong>References, Notes, Assumptions</strong></p>
								{!! $item->references_notes_assumptions !!}
							</div>
						</div>

					</div>
				</div>
				<div class="card">
						<div class="card-header" id="headingRegulatory">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#regulatoryData" aria-expanded="false" aria-controls="regulatoryData">
									Regulatory Comments and Certainty
								</button>
							</h5>
						</div>
						<div class="collapse " id="regulatoryData" data-parent="#accordion">
							<div class="card-body">
								<div>
									<p><strong>Regulatory Comments and Certainty</strong></p>
									{!! $item->regulatory_comments !!}
								</div>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header" id="headingMonitoring">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#monitoring" aria-expanded="false" aria-controls="monitoring">
								Monitoring
							</button>
						</h5>
					</div>

					<div id="monitoring" class="collapse " aria-labelledby="headingMonitoring" data-parent="#accordion">
						<div class="card-body">
							 <div>
								<p><strong>Evaluation Monitoring</strong></p>
								<ul>
									@forelse($item->evaluation_monitoring as $each)
										<li>{{$each->monitoring}}</li>
									@empty
										<li>No Evaluation Monitoring Assigned yet.</li>
									@endforelse
								</ul>
							</div> 					
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="headingOther">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#otherData" aria-expanded="false" aria-controls="otherData">
								Other Characteristics
							</button>
						</h5>
					</div>
					<div class="collapse " id="otherData" data-parent="#accordion">
						<div class="card-body">
							<div>
								<p><strong>EcoSystem Services</strong></p>
								<ul>
									@forelse($item->ecosystem_services as $each)
										<li>{{$each->ecosystem_service}}</li>
									@empty
										<li>No Ecosystem Services Assigned.</li>
									@endforelse
								</ul>
								<p><strong>Permitting Agencies</strong></p>
								<ul>
									@forelse($item->permitting_agencies as $each)
										<li>{{$each->potential_agency}}</li>
									@empty	
										<li>No Permitting Agencies Assigned.</li>
									@endforelse
								</ul>
								<p><strong>Siting Requirements</strong></p>
								<ul>
									@forelse($item->siting_requirements as $each)
									<li>{{$each->siting_requirement}}</li>
									@empty
										No siting requirements identified.
									@endforelse
								</ul>
								<p><strong>Influent Sources</strong></p>
								<ul>
									@forelse($item->influent_sources as $each)
										<li>{{$each->influent_source}}</li>
									@empty
										<li>No Influent Sources Assigned.</li>
									@endforelse
								</ul>
								<p><strong>Pollutants Treated</strong></p>
								<ul>
									@forelse($item->pollutants as $each)
										<li>{{$each->pollutant}}</li>
									@empty
										<li>No Pollutants Assigned.</li>
									@endforelse				
								</ul>
								<p><strong>System Design Considerations</strong></p>
								<ul>
									@forelse($item->system_design_considerations as $each)
										<li>{{$each->infrastructure_to_consider}}</li>
									@empty
										<li>
											No System Design Considerations Assigned.
										</li>
									@endforelse
								</ul>
								<p><strong>Time to Improve Estuary Water (Years)</strong>
								</p>
								<ul>
									@forelse($item->time_to_improve_estuary as $each)
										<li>{{$each->length_of_time}}</li>
									@empty
										<li>
											No Time to Improve Estuary Water range assigned.
										</li>
									@endforelse
								</ul> 
								<p><strong>Pilot Study Findings</strong></p>
								<div>{!! $item->pilot_study_findings !!}</div>
							</div>
						</div>
					</div>
				</div>				
			</div>
			<p><img src="{{env('APP_URL')}}/images/{{$item->image}}"></p>

		</div>
	</div>
</div>
@endsection

@section('scripts')

@endsection