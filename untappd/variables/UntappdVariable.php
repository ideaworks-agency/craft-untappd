<?php
namespace Craft;

class UntappdVariable
{
	public function __call($name, $arguments)
	{
		$className = 'Craft\Untappd_' . ucfirst($name) . 'Variable';
		return (class_exists($className)) ? new $className() : 'null';
	}
}