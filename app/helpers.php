<?php

	function striphtml($value)
	{
			$value = str_replace('</p>\n<p>', '<br /><br />', $value);
			$value = str_replace('<p>', '\n\n', $value);
			$value = str_replace('</p>', '', $value);		
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