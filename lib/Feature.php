<?php

class Feature
{
	private static $instance;
	private static $callback;

	public static function __callStatic($method, $params)
	{
		if (!isset(self::$instance))
			self::$instance = new \Feature\Instance();

		if (isset(self::$callback))
			self::$instance->init(self::$callback);

		return call_user_func_array(
			array(self::$instance, $method), $params
		);
	}

	public function onInit($callback)
	{
		self::$callback = $callback;
	}

	public static function reset()
	{
		self::$instance = null;
	}

}