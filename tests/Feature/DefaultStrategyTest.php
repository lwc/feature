<?php

namespace Feature;

class DefaultStrategyTest extends \PHPUnit_Framework_TestCase
{
	public function testDefaultStrategy()
	{
		$strategy = new DefaultStrategy();

		$this->assertEquals('default', $strategy->name());
		$feature = new Definition('test-feature', 'Test feature!', false);

		$this->assertTrue($strategy->knows($feature));
		$this->assertFalse($strategy->on($feature));

		$feature = new Definition('test-feature', 'Test feature!', true);

		$this->assertTrue($strategy->knows($feature));
		$this->assertTrue($strategy->on($feature));

		$feature = new Definition('test-feature', 'Test feature!');

		$this->assertFalse($strategy->knows($feature));
	}
}