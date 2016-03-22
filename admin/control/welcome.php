<?php

if (!@include(dirname(dirname(dirname(__FILE__))).'/global.php')) exit('global.php isn\'t find!');
define('BATH_PATH', str_replace('\\', '/', dirname(dirname(__FILE__))));

class WelcomeControl
{
	public function getPage()
	{	
		require(BATH_PATH.'/view/welcome.php');
	}
}
		