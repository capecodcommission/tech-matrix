<?php

	function striphtml($value)
	{
		$value = str_replace('<ul>', '', $value);
		$value = str_replace('<li>', '', $value);
		$value = str_replace('</li>', '\n', $value);
		return $value;
	}