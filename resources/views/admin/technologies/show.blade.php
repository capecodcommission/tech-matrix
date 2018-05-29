@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p><a href="{{route('technologies.index')}}">Back to List</a></p>

			<h2>{{$item->technology_strategy}} 
				<span class="subtitle">(<a href="{{route('technologies.edit', $item->id)}}">Edit</a>)</span>
			</h2>
			
			<p><strong>Technology Strategy</strong>: {{$item->technology_strategy}}</p>
			<p><strong>Technology ID</strong>: {{$item->technology_id}}</p>
			<div class="accordion" id="accordion">
				<div class="card">
					<div class="card-header" id="headingDescription">
						<h5 class="mb-0">
							<button class="btn btn-link" data-toggle="collapse" data-target="#description" aria-expanded="false" aria-controls="description">
								Technology Description
							</button>
						</h5>
					</div>
					<div id="description" class="collapse show" aria-labelledby="headingDescription" data-parent="#accordion">
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
							<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#costData" aria-expanded="false" aria-controls="costData">
								Cost Data
							</button>
						</h5>
					</div>

					<div id="costData" class="collapse show" aria-labelledby="headingCosts" data-parent="#accordion">
						<div class="card-body">
							<p><strong>Current Construction Cost (low)</strong>: {{$item->current_construction_cost_low}}</p>
							<p><strong>Current Construction Cost (high)</strong>: {{$item->current_construction_cost_high}}</p>
							<p><strong>Current Construction Cost (avg)</strong>: {{($item->current_construction_cost_high + $item->current_construction_cost_low)/2}}</p>
							<p><strong>Current Construction Cost Percent Labor</strong>: {{$item->current_construction_cost_percent_labor}}</p>
							<p><strong>Current Project Cost (low)</strong>: {{$item->current_project_cost_low}}</p>
							<p><strong>Current Project Cost (high)</strong>: {{$item->current_project_cost_high}}</p>
							<p><strong>Current Annual OM Cost (low)</strong>: {{$item->current_annual_o_m_cost_low}}</p>
							<p><strong>Current Annual OM Cost (high)</strong>: {{$item->current_annual_o_m_cost_high}}</p>
							<p><strong>Current Annual OM Cost (avg)</strong>: {{($item->current_annual_o_m_cost_high + $item->current_annual_o_m_cost_low)/2}}</p>
							<p><strong>Current Annual OM Cost Percent Labor</strong>: {{$item->current_annual_o_m_cost_percent_labor}}</p>
							<p><strong>Useful Life (Years)</strong>: {{$item->useful_life_years}}</p>
							<p><strong>Replacement Cost</strong>: {{$item->replacement_cost}}</p>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="headingAdvantages">
						<h5 class="mb-0">
							<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#advData" aria-expanded="false" aria-controls="advData">
							Advantages &amp; Disadvantages
							</button>
						</h5>
					</div>

					<div id="advData" class="collapse show" aria-labelledby="headingAdvantages" data-parent="#accordion">
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
							<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#referencesData" aria-expanded="false" aria-controls="referencesData">
								References, Notes, &amp; Assumptions
							</button>
						</h5>
					</div>
					<div class="collapse show" id="referencesData" data-parent="#accordion">
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
								<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#regulatoryData" aria-expanded="false" aria-controls="regulatoryData">
									Regulatory Comments and Certainty
								</button>
							</h5>
						</div>
						<div class="collapse show" id="regulatoryData" data-parent="#accordion">
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
							<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#monitoring" aria-expanded="false" aria-controls="monitoring">
								Monitoring
							</button>
						</h5>
					</div>

					<div id="monitoring" class="collapse show" aria-labelledby="headingMonitoring" data-parent="#accordion">
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
						</div>
					</div>
				</div>
			</div>
			
            
			<p>{{$item->image}}</p>
			<p><strong>Display in Tech Matrix</strong>: {{$item->show_on_Matrix}}</p>
			<p><strong>Technology System Type</strong>: {{$item->technology_system_type}}</p>
			<p><strong>Display in wMVP</strong>: {{$item->show_in_wMVP}}</p>
			<p><strong>Type of Cost Spread</strong>: {{$item->type_of_cost_spread}}</p>
			
			
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
        </div>
    </div>
</div>
@endsection