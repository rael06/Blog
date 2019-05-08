<?php

namespace App;

class App {

	const DB_HOST = "localhost";
	const DB_NAME = "blog";
	const DB_USER = "root";
	const DB_PASS = "";
	private static $database;

	/**
	 * Get the value of database
	 */ 
	public static function getDb() {
		if (self::$database === null) {
			self::$database = new Database(self::DB_HOST, self::DB_NAME, self::DB_USER, self::DB_PASS);
			return self::$database;
		}
	}
}
?>