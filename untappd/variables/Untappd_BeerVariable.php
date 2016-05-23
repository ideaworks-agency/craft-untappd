<?php
namespace Craft;

class Untappd_BeerVariable
{
  protected $_serviceName = 'untappd_beer';

  public function info($options = array())
  {
    return craft()->{$this->_serviceName}->getInfo($options);
  }

  public function photos($options = array())
  {
    return craft()->{$this->_serviceName}->getPhotos($options);
  }
}