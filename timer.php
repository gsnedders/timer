<?php

class timer
{

	var $start_time;
	var $stop_time;

	function microtime_float()
	{
		$time = microtime(true);
		if (!is_float($time))
		{
			list($user, $sec) = explode(' ', $time);
			return ((float) $user + (float) $sec);
		}
		else
		{
			return $time;
		}
	}

	function start()
	{
		$this->start_time = $this->microtime_float();
	}

	function stop()
	{
		$this->stop_time = $this->microtime_float();
	}

	function show($decimals = 3)
	{
		if ($decimals > ini_get('precision'))
		{
			$decimals = ini_get('precision');
		}
		return number_format($this->stop_time - $this->start_time, $decimals);
	}

	function stop_show($decimals = 3)
	{
		$this->stop();
		return $this->show($decimals);
	}

}

?>