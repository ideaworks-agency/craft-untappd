<?php
namespace Craft;

class Untappd_BreweryService extends Untappd_BaseService
{
  public function getInfo($options = array())
  {
    if (!array_key_exists('compact', $options)) {
      $options['compact'] = 'true';
    }
    $id = $this->_getIdFromOptions($options);
    $response = $this->_get('beer/info/' . $id . '/', $options);
    return $response['response']['brewery'];
  }

  public function getPhotos($options = array())
  {
    $id = $this->_getIdFromOptions($options);
    $response = $this->_get('brewery/photos/' . $id . '/', $options);
    return $response['response']['media']['items'];
  }
}
