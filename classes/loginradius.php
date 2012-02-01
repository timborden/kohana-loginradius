<?php defined('SYSPATH') OR die('No direct access allowed.');

class LoginRadius {

	protected $_config;

	protected static $_instance;

	public static function instance()
	{
		if ( ! isset(LoginRadius::$_instance))
		{
			$config = Kohana::$config->load('loginradius');
			
            LoginRadius::$_instance = new LoginRadius($config);
		}
		
		return LoginRadius::$_instance;
	}
	
	private function __construct($config)
	{
		$this->_config = $config;

        if ( ! class_exists('LoginRadiusSDK', FALSE))
		{
			require_once Kohana::find_file('vendor', 'LoginRadiusSDK');
		}
	}

    public function response()
    {
        return new LoginRadiusSDK($this->_config['secret']);
    }

    public function key()
    {
        return $this->_config['key'];
    }

}