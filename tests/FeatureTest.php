<?php

class FeatureTest extends \PHPUnit_Framework_TestCase
{
	public function setup()
	{
		Feature::strategies(array(
			new \Feature\DefaultStrategy,
		));

		Feature::set_default(false);

		Feature::create('enabled-feature', 'I default to enabled!', true);
		Feature::create('disabled-feature', 'I default to disabled!', false);
		Feature::create('no-default-feature', 'I have no default!');
	}

	public function testFeatureDefaults()
	{
		$this->assertTrue(Feature::enabled('enabled-feature'));
		$this->assertFalse(Feature::enabled('disabled-feature'));
		$this->assertFalse(Feature::enabled('no-default-feature'));
	}

	public function testStrategyLayering()
	{
		Feature::strategies(array(
			new DisabledFeatureStrategy,
			new \Feature\DefaultStrategy,
		));

		$this->assertTrue(Feature::enabled('enabled-feature'));
		$this->assertFalse(Feature::enabled('disabled-feature'));
		$this->assertFalse(Feature::enabled('no-default-feature'));
	}
}

class DisabledFeatureStrategy extends \Feature\AbstractStrategy
{
	public function description() { return ''; }
	public function knows($feature) { return $feature->name == 'disabled-feature'; }
	public function on($feature) { return false; }
}