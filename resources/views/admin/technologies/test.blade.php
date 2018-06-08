@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p><a href="{{route('technologies.index')}}">Back to List</a></p>

			<h2>{{$item->technology_strategy}}			</h2>
			
			<p><strong>Technology Strategy</strong>: {{$item->technology_strategy}}</p>
			<p><strong>Technology ID</strong>: {{$item->technology_id}}</p>
			<?php 
				echo $formula->formula . " before <br />";
				$eval = str_replace('$N_High', 85, $formula->formula); 
				$eval = str_replace('$N_Low', 65, $eval); 
				$eval = str_replace('$N_Per_Years', $input->input_value, $eval);
				echo $eval . " after <br />";
				$result = eval("return " . $eval . ";");
				echo $result . "<br />";
				$result = ((85+65)/2)*20;
				echo $result;

			?>
        </div>
    </div>
</div>
@endsection