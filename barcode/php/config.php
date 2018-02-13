<?php 




/**
* 
*/
class Connection extends PDO
{
	public static $instance=null;
	public function __construct()
	{
		parent::__construct("mysql:host=localhost;dbname=barcode", "root", "");
		
	}
	public static function getInstance()
	{
		if (!self::$instance) {
				self::$instance  = new Connection();
		}
		return self::$instance;
	}
}





?>