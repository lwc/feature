<?php

namespace Feature;

class Instance
{
	private $strategies = array();
	private $default = false;
	private $features;
	private $callback;

	public function create($name, $description, $default = null)
	{
		$this->features[$name] = new \Feature\Definition($name, $description, $default);
	}

	public function enabled($name)
	{
		$feature = $this->features[$name];
		foreach ($this->strategies as $strategy)
		{
			if ($strategy->knows($feature))
			{
				return $strategy->on($feature);
			}
		}
		return $this->default;
	}

	public function set_default($default)
	{
		$this->default = $default;
	}

	public function strategies($strategies)
	{
		$this->strategies = $strategies;
	}

	public function init($callback)
	{
		$callback($this);
	}
}