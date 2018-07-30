<?php

	function striphtml($value)
	{
		if(strpos($value, '<ul>'))
		{
			$value = str_replace('<ul>', '', $value);
			$value = str_replace('</ul>', '', $value);
			$value = str_replace('</li>', '', $value);
			$value = explode('<li>', $value);
		}
		elseif(strpos($value, '<p>'))
		{
			$value = str_replace('</p>', '', $value);
			$value = explode('<p>', $value);
		}
		
		// $value[0] = '';
		return $value;
	}

	function striplist($value)
	{
		$value = str_replace('<ul>', '', $value);
		$value = str_replace('</ul>', '', $value);
		$value = str_replace('</li>', '', $value);
		$value = explode('<li>', $value);

		return $value;
	}