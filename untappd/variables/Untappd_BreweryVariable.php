<?php
namespace Craft;

class Untappd_BreweryVariable
{
	protected $_serviceName = 'untappd_brewery';

  public function info($options = array())
  {
    return craft()->{$this->_serviceName}->getInfo($options);
  }

  public function photos($options = array())
  {
    return craft()->{$this->_serviceName}->getPhotos($options);
  }
}