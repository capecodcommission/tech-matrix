<?php

	function striphtml($value)
	{
		$value = str_replace('<ul>', '', $value);
		$value = str_replace('</ul>', '', $value);
		$value = str_replace('</li>', '', $value);
		$value = explode('<li>', $value);
		return $value;
	}