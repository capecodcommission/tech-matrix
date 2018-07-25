<?php

	function striplist($value)
	{
		$value = str_replace('<ul>', '', $value);
		$value = str_replace('</ul>', '', $value);
		$value = str_replace('</li>', '', $value);
		$value = explode('<li>', $value);
		// $value[0] = '';
		return $value;
	}