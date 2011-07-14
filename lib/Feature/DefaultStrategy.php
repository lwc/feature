<?php

namespace Feature;

class DefaultStrategy extends AbstractStrategy
{
	public function description()
	{
		return 'The default status for each feature';
	}

	public function knows($feature)
	{
		return $feature->default !== null;
	}

	public function on($feature)
	{
		return $feature->default;
	}
}