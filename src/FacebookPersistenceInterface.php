<?php
/**
 * User: Maciej Łebkowski
 * Date: 24.09.2012 12:50
 */
interface FacebookPersistenceInterface
{
	public function init(BaseFacebook $facebook);
	public function clearAllPersistentData();
	public function setPersistentData($key, $value);
	public function getPersistentData($key, $default = false);
	public function clearPersistentData($key);

}
