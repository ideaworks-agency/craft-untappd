<?php
namespace Craft;

class UntappdPlugin extends BasePlugin
{
	public function getName()
	{
		return Craft::t('Untappd');
	}

	public function getVersion()
	{
		return '1.0.0';
	}

	public function getDeveloper()
	{
		return 'Ideaworks, Inc.';
	}

	public function getDeveloperUrl()
	{
		return 'http://ideaworks.co';
	}

	public function getSettingsHtml()
	{
		return craft()->templates->render('untappd/_settings', array(
			'settings' => $this->getSettings()
		));
	}

	protected function defineSettings()
	{
		return array(
			'clientId' => array(AttributeType::String, 'label' => 'Client ID'),
			'clientSecret' => array(AttributeType::String, 'label' => 'Client Secret'),
			'cacheDuration' => array(AttributeType::Number, 'label' => 'Cache Duration', 'default' => 3600)
		);
	}
}