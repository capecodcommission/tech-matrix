@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <p><a href="{{route('technologies.index')}}">Back to List</a></p>

			<h2>{{$item->technology_strategy}}</h2>
			
			<p><strong>Technology Strategy</strong>: {{$item->technology_strategy}}</p>
			<p><strong>Technology ID</strong>: {{$item->technology_id}}</p>
			<div><strong>Technology Description</strong><br />{!! $item->technology_description !!}</div>
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
            <div><p><strong>Advantages</strong></p>
            {!! $item->advantages !!}</div>
            <div><p><strong>Disadvantages</strong></p> 
            {!! $item->disadvantages!!}</div>
			<p>{{$item->image}}</p>
			<p><strong>Display in Tech Matrix</strong>: {{$item->show_on_Matrix}}</p>
			<p><strong>Technology System Type</strong>: {{$item->technology_system_type}}</p>
			<p><strong>Display in wMVP</strong>: {{$item->show_in_wMVP}}</p>
			<p><strong>Type of Cost Spread</strong>: {{$item->type_of_cost_spread}}</p>
        </div>
    </div>
</div>
@endsection