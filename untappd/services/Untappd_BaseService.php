<?php 
namespace Craft;

class Untappd_BaseService extends BaseApplicationComponent
{
	protected $clientId;
	protected $clientSecret;
	public $cacheDuration;

	public function init()
	{
		$settings = craft()->plugins->getPlugin('untappd')->getSettings();

		$this->clientId = $settings->clientId;
		$this->clientSecret = $settings->clientSecret;
		$this->cacheDuration = $settings->cacheDuration;
	}

	protected function _makeRequest($url)
	{
		try {
			$cached = craft()->cache->get($url);
			if ($cached) {
				return $cached;
			} else {
				$client = new \Guzzle\Http\Client();
				$request = $client->get($url);
				$response = $request->send();
				if (!$response->issuccessful()){
					return;
				}
				$output = $response->json();
				craft()->cache->set($url, $output, $this->cacheDuration);
				return $output;
			}
		} catch(\Exception $e) {
			throw $e;
		}
	}

	protected function _buildUntappdUrl($endpoint)
	{
		return 'https://api.untappd.com/v4/' . $endpoint . '?';
	}

	protected function _getIdFromOptions(&$options)
	{
		return $this->pullFromArray($options, 'id');
	}

  protected function _get($endpoint, $options)
  {
  	$options['client_id'] = $this->clientId;
  	$options['client_secret'] = $this->clientSecret;

    $query = http_build_query($options);
    $url = $this->_buildUntappdUrl($endpoint) . $query;
    $response = $this->_makeRequest($url);
    return $response;
  }

	public function pullFromArray(&$array, $key, $default = null)
	{
		if (array_key_exists($key, $array)) {
			$val = $array[$key];
			unset($array[$key]);
			return $val;
		} else {
			return $default;
		}
	}
}
