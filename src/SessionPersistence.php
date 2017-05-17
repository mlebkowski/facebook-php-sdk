<?php
/**
 * User: Maciej Łebkowski
 * Date: 24.09.2012 12:54
 */
class SessionPersistence implements FacebookPersistenceInterface
{
	protected $sessionKey;

	public function init(BaseFacebook $facebook)
	{
		$this->sessionKey = 'fbsdk_' . $facebook->getAppId();
	}

	public function clearAllPersistentData()
	{
		unset($_SESSION[$this->sessionKey]);
	}

	public function setPersistentData($key, $value)
	{
		$_SESSION[$this->sessionKey][$key] = $value;
	}

	public function getPersistentData($key, $default = false)
	{
		if (isset($_SESSION[$this->sessionKey][$key])) {
			return $_SESSION[$this->sessionKey][$key];
		}
		return $default;
	}

	public function clearPersistentData($key)
	{
		unset($_SESSION[$this->sessionKey][$key]);
	}

}
