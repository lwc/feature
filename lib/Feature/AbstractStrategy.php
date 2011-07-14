<?php

namespace Feature;

abstract class AbstractStrategy
{
	abstract public function description();
	abstract public function knows($feature);
	abstract public function on($feature);

	public function name()
	{
		return strtolower(preg_replace('#Strategy$#', '', array_pop(explode('\\', get_class($this)))));
	}

	public function switchable() { return false; }
	public function change($feature, $on) { throw new BadMethodCallException(); }
	public function delete($feature) { throw new BadMethodCallException(); }
}