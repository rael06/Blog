<?php
namespace App\Table;

use App\App;

class Categorie extends TableData {

	protected static $tableName = "categories";

	public function getURL() {
		return "index.php?page=categorie&id=" . $this->id;
	}
}
?>