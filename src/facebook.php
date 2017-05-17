<?php

use \Symfony\Component\HttpFoundation\Request;

/**
 * Extends the BaseFacebook class with the intent of using
 * abstract FacebookPersistenceInterface to store user ids and
 * access tokens.
 */
class Facebook extends BaseFacebook
{
	/**
	 * @var FacebookPersistenceInterface
	 */
	protected $persistence;

	/**
	 * @param Request                      $request
	 * @param FacebookPersistenceInterface $persistence
	 * @param array                        $config
	 */
	public function __construct(Request $request, FacebookPersistenceInterface $persistence = null, $config)
	{
		$this->setAppId($config['appId']);
		if ($persistence)
		{
			$this->persistence = $persistence;
			$this->persistence->init($this);
		}
		parent::__construct($request, $config);
	}

	protected function setPersistentData($key, $value)
	{
		if ($this->persistence)
		{
			$this->persistence->setPersistentData($key, $value);
		}
	}

	protected function getPersistentData($key, $default = false)
	{
		if ($this->persistence)
		{
			return $this->persistence->getPersistentData($key, $default);
		}
		return $default;
	}

	protected function clearPersistentData($key)
	{
		if ($this->persistence)
		{
			$this->persistence->clearPersistentData($key);
		}
	}

	protected function clearAllPersistentData()
	{
		if ($this->persistence)
		{
			$this->persistence->clearAllPersistentData();
		}
	}

}
