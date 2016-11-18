<?php
class coreModel extends core
{

	protected $_pdo;

	function __construct()
	{
		try {
			$dns = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
			// Options de connexion

			$options = array(
							PDO ::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
							PDO ::ATTR_ERRMODE => PDO ::ERRMODE_EXCEPTION);

			$this->_pdo = new PDO( $dns, DB_USER, DB_PASSWORD, $options );
			// var_dump($this->pdo);
		} catch (Exception $e) {
			die("Database error :". $e->getMessage());
		}
	}

}