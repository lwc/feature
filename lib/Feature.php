<?php

class Feature
{
	private static $strategies;
	private static $default = false;
	private static $features;

	public static function create($name, $description, $default = null)
	{
		self::$features[$name] = new \Feature\Definition($name, $description, $default);
	}

	public static function enabled($name)
	{
		$feature = self::$features[$name];
		foreach (self::$strategies as $strategy)
		{
			if ($strategy->knows($feature))
			{
				return $strategy->on($feature);
			}
		}
		return self::$default;
	}

	public static function set_default($default)
	{
		self::$default = $default;
	}

	public static function strategies($strategies)
	{
		self::$strategies = $strategies;
	}
}