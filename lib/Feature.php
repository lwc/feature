<?php

class Feature
{
	private static $instance;

	public static function __callStatic($method, $params)
	{
		if (!isset(self::$instance))
			self::$instance = new \Feature\Instance();

		return call_user_func_array(
			array(self::$instance, $method), $params
		);
	}

}