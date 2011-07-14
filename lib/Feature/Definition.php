<?php

namespace Feature;

class Definition
{
	public $name, $description, $default;

	public function __construct($name, $description, $default = null)
	{
		$this->name = $name;
		$this->description = $description;
		$this->default = $default;
	}
}