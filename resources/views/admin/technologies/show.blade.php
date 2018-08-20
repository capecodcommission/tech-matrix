@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p><a href="{{route('technologies.index')}}">Back to List</a></p>
			<?php $item->calc = $item->calculated(); ?>
			
			<h2>{{$item->technology_strategy}} 
				<span class="subtitle">(<a href="{{route('technologies.edit', $item->id)}}">Edit</a>)</span>
			</h2>
			<p><span style="display:inline-block; background-color:#52a9df"><img src="{{config('app.url')}}/icons/{{$item->icon}}" height="45" width="45" /></span></p>
			<p><strong>Technology Strategy</strong>: {{$item->technology_strategy}}</p>
			<p><strong>Technology ID</strong>: {{$item->technology_id}}</p>
			<p><strong>Scale</strong>: @forelse($item->scales as $each){{$each->scale}} @empty -- @endforelse</p>
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
							<p><strong>Current Construction Cost (low)</strong>: {{number_format($item->current_construction_cost_low, 0, '.', ',')}}</p>
							<p><strong>Current Construction Cost (high)</strong>: {{number_format($item->current_construction_cost_high, 0, '.', ',')}}</p>
							<p><strong>Current Construction Cost (avg)</strong>: {{number_format(($item->current_construction_cost_high + $item->current_construction_cost_low)/2, 0, '.', ',')}}</p>
							<p><strong>Current Construction Cost Percent Labor</strong>: {{$item->current_construction_cost_percent_labor*100}}%</p>
							<p><strong>Current Project Cost (low)</strong>: {{number_format($item->current_project_cost_low, 0, '.', ',')}}</p>
							<p><strong>Current Project Cost (high)</strong>: {{number_format($item->current_project_cost_high, 0, '.', ',')}}</p>
							<p><strong>Current Annual OM Cost (low)</strong>: {{number_format($item->current_annual_o_m_cost_low, 0, '.', ',')}}</p>
							<p><strong>Current Annual OM Cost (high)</strong>: {{number_format($item->current_annual_o_m_cost_high, 0, '.', ',')}}</p>
							<p><strong>Current Annual OM Cost (avg)</strong>: {{number_format(($item->current_annual_o_m_cost_high + $item->current_annual_o_m_cost_low)/2, 0, '.', ',')}}</p>
							<p><strong>Current Annual OM Cost Percent Labor</strong>: {{$item->current_annual_o_m_cost_percent_labor}}</p>
							<p><strong>Useful Life (Years)</strong>: {{$item->useful_life_years}}</p>
							<p><strong>Replacement Cost</strong>: {{number_format($item->replacement_cost, 0, '.', ',')}}</p>
													    <div class="accordion-content" >
								<div class="row">
									<table class="stack large-10 large-offset-1 columns">
										<thead>
											<tr>
												<th colspan="2"><h5>Construction Costs</h5></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Current Construction Cost (avg)</td>
												<td class="text-right"> ${{technology.current_construction_cost_avg}}</td>
											</tr>
											<tr>
												<td>Construction Cost Percent Labor</td>
												<td class="text-right">{{technology.current_construction_cost_percent_labor}}%</td>
											</tr>
											<tr>
												<td>Land Cost (per acre)</td>
												<td class="text-right">${{$item->calc->land_cost}}</td>
											</tr>
										</tbody>
									</table>
									<table class="stack large-10 large-offset-1 columns">
										<thead>
											<tr>
												<th colspan="2"><h5>Project Costs</h5></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Current Project Cost (avg)</td>
												<td class="text-right"> ${{$item->calc->current_project_cost_low + $item->calc->current_project_cost_high/2}}</td>
											</tr>
											<tr>
												<td>Project Cost Adjustment Factor</td>
												<td class="text-right">{{$item->calc->adjustment_factor_project_cost * 100}}%</td>
											</tr>
											<tr>
												<td>Adjusted Project Cost (avg)</td>
												<td class="text-right">${{$item->calc->adj_project_cost_avg}}</td>
											</tr>
											<tr>
												<td>Project Cost (PV)</td>
												<td class="text-right">${{$item->calc->project_cost_pv}}</td>
											</tr>
										</tbody>
									</table>
									<table class="stack large-10 large-offset-1 columns">
										<thead>
											<tr>
												<th colspan="2"><h5>Replacement Costs</h5></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Replacement Cost</td>
												<td class="text-right">${{$item->calc->replacement_cost}}</td>
											</tr>
											<tr>
												<td>Replacement Cost Factor</td>
												<td class="text-right">{{$item->calc->replacement_cost_factor}}%</td>
											</tr>
											<tr>
												<td>Total Replacement Cost</td>
												<td class="text-right">${{$item->calc->total_replacement_cost}}</td>
											</tr>
										</tbody>
									</table>
									<table class="stack large-10 large-offset-1 columns">
										<thead>
											<tr>
												<th colspan="2"><h5>Annual OM Costs</h5></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Current Annual OM Cost (avg)</td>
												<td class="text-right">${{$item->calc->current_annual_o_m_cost_low + $item->calc->current_annual_o_m_cost_high/2}}</td>
											</tr>
											<tr>
												<td>OM Cost Adjustment Factor</td>
												<td class="text-right">{{$item->calc->adjustment_factor_o_m_cost}}</td>
											</tr>
											<tr>
												<td>Adjusted OM Cost (avg)</td>
												<td class="text-right">${{$item->calc->adj_o_m_cost_avg}}</td>
											</tr>
										</tbody>
									</table>
									<table class="stack large-10 large-offset-1 columns">
										<thead>
											<tr>
												<th colspan="2"><h5>Costs per Kg Nitrogen Removed</h5></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Project Cost (avg)</td>
												<td class="text-right">${{$item->calc->cost_per_kg_avg_project_cost_n}}</td>
											</tr>
											<tr>
												<td>OM Cost (avg)</td>
												<td class="text-right">${{$item->calc->cost_per_kg_avg_om_cost_n}}</td>
											</tr>
											<tr>
												<td>Lifecycle Cost (avg)</td>
												<td class="text-right">${{$item->calc->cost_per_kg_avg_lifecycle_cost_n}}</td>
											</tr>
										</tbody>
									</table>
									<table class="stack large-10  large-offset-1 columns end">
										<thead>	
											<tr>
												<th colspan="2"><h5>Costs per Kg Phosphorus Removed</h5></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Project Cost (avg)</td>
												<td class="text-right">${{$item->calc->cost_per_kg_avg_project_cost_p}}</td>
											</tr>
											<tr>
												<td>OM Cost (avg)</td>
												<td class="text-right">${{$item->calc->cost_per_kg_avg_om_cost_p}}</td>
											</tr>
											<tr>
												<td>Lifecycle Cost (avg)</td>
												<td class="text-right">${{number_format($item->calc->cost_per_kg_avg_lifecycle_cost_p, 0)}}</td>
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
							{{-- <div>
								<p><strong>Estimated Annual Evaluation Monitoring Cost</strong></p>
								<p>
									{{$item->evaluation_monitoring_cost->est_annual_cost}}
								</p>
							</div>  
							<div>
								<p><strong>Longterm Monitoring</strong></p>
								<ul>
									@forelse($item->longterm_monitoring as $each)
										<li>{{$each->monitoring}}</li>
									@empty
										<li>No Long Term Monitoring Assigned yet.</li>
									@endforelse
								</ul>
							</div> 
							<div>
								<p><strong>Estimated Annual Longterm Monitoring Cost</strong></p>
								<p>
									{{$item->longterm_monitoring_cost->est_annual_cost}}
								</p>
							</div> 		--}}					
						</div>
					</div>
				</div>
			</div>
			<p><strong>Unit Metric</strong>: {{$item->unit_metric->unit_metric}}</p>
			<p><strong>Flow GPD</strong>: {{$item->flow_gpd}}</p>
			<p>	<strong>Nitrogen Percent Reduction (Low)</strong>: {{$item->n_percent_reduction_low}}%</p>
 			<p>	<strong>Nitrogen Percent Reduction (High)</strong>: {{$item->n_percent_reduction_high}}%</p>
           	<p>	<strong>Phosphorus Percent Reduction (Low)</strong>: {{$item->p_percent_reduction_low}}%</p>
			<p>	<strong>Phosphorus Percent Reduction (High)</strong>: {{$item->p_percent_reduction_high}}%</p>

			
			{{-- <p><strong>Display in Tech Matrix</strong>: {{$item->show_on_Matrix}}</p> --}}
			<p><strong>Technology System Type</strong>: {{$item->technology_system_type}}</p>
			{{-- <p><strong>Display in wMVP</strong>: {{$item->show_in_wMVP}}</p>
			<p><strong>Type of Cost Spread</strong>: {{$item->type_of_cost_spread}}</p> --}}
			
			
			<div>
				<p><strong>EcoSystem Services</strong></p>
				<ul>
					@forelse($item->ecosystem_services as $each)
						<li>{{$each->ecosystem_service}}</li>
					@empty
						<li>No Ecosystem Services Assigned.</li>
					@endforelse
			</div>
			<div>
				<p><strong>Permitting Agencies</strong></p>
				<ul>
					@forelse($item->permitting_agencies as $each)
						<li>{{$each->potential_agency}}</li>
					@empty	
						<li>No Permitting Agencies Assigned.</li>
					@endforelse
				</ul>
			</div>
			<div><p><strong>Siting Requirements</strong></p>
				<ul>
					@forelse($item->siting_requirements as $each)
					<li>{{$each->siting_requirement}}</li>
					@empty
						No siting requirements identified.
					@endforelse
				</ul>
			</div>
			<div>
				<p><strong>Influent Sources</strong></p>
				<ul>
					@forelse($item->influent_sources as $each)
						<li>{{$each->influent_source}}</li>
					@empty
						<li>No Influent Sources Assigned.</li>
					@endforelse
				</ul>
			</div>

			<div>
				<p><strong>Pollutants Treated</strong></p>
				<ul>
					@forelse($item->pollutants as $each)
						<li>{{$each->pollutant}}</li>
					@empty
						<li>No Pollutants Assigned.</li>
					@endforelse				
				</ul>						
			</div>
			<div class="form-group">
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
			</div>
			<div>
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
			</div>
			<div><p><strong>Pilot Study Findings</strong></p>
				<div>{!! $item->pilot_study_findings !!}</div>
			</div>
			<div>
				<h3>Calculated Values</h3>
				
				<p><strong>Phosphorus Removed (low)</strong>: {{ $item->calc->n_removed_low }}</p>
				<p><strong>Phosphorus Removed (high)</strong>: {{ $item->calc->n_removed_high }}</p>
				
			</div>
			<p><img src="/images/{{$item->image}}"></p>

        </div>
    </div>
</div>
@endsection

@section('scripts')
	<script>
$(function () {
  $('button').popover({
	container: 'body',
	trigger: 'focus',
	html: true,
	placement: "right" 
  })
})
	</script>
@endsection