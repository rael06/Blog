<?php
namespace App\Table;

use App\App;

class Article extends TableData {

	public static function getLast() {
		return App::getDb()->db_query(
			"SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie 
			FROM articles 
			LEFT JOIN categories 
				ON category_id = categories.id
			", __CLASS__);
	}

	public function __get($key) {
		$method = "get" . ucfirst($key);
		$this->key = $this->$method();
		return $this->key;
	}

	public static function lastByCategory($category_id) {
		return self::table_query(
			"SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie 
			FROM articles 
			LEFT JOIN categories 
				ON category_id = categories.id
			WHERE category_id = ?
			", [$category_id]);
	}

	public function getURL() {
		return "index.php?page=article&id=" . $this->id;
	}

	public function getExtrait() {
		$html = "<p>" . substr($this->contenu, 0, 20) . "...</p>";
		$html .= "<p><a href='" . $this->getURL() . "'>Voir la suite</a></p>";
		return $html;
	}
	
}
?>