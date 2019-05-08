<?php
namespace App\Table;

use App\App;

class TableData {

	protected static $tableData;

	private static function getTableData() {
		if (static::$tableData === null) {
			$class_name = explode("\\", get_called_class());
			static::$tableData = strtolower(end($class_name)) . "s";
		}
		return static::$tableData;
	}

	public static function table_query($statement, $attributes = null, $one = false) {
		if ($attributes) {
			return App::getDb()->db_prepare($statement, $attributes, get_called_class(), $one);
		} else {
			return App::getDb()->db_query($statement, get_called_class(), $one);
		}
	}
	
	public static function all() {
		return App::getDb()->db_query( "SELECT * FROM " . static::getTableData(), get_called_class());
	}

	public function __get($key) {
		$method = "get" . ucfirst($key);
		$this->key = $this->$method();
		return $this->key;
	}
	
	public static function find($id) {
		return App::getDb()->db_prepare( "SELECT * FROM " . static::getTableData() . " WHERE id = ?", [$id], get_called_class(), true);
	}
}
?>