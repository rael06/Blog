<?php
namespace App\Table;

class Article {

	public function __get($key) {
		$method = "get" . ucfirst($key);
		$this->key = $this->$method();
		return $this->key;
	}

	public function getURL() {
		return "index.php?page=article&id=" . $this->id;
	}

	public function getExtrait() {
		$html = "<p>" . substr($this->contenu,0 , 20) . "...</p>";
		$html .= "<p><a href='" . $this->getURL() . "'>Voir la suite</a></p>";
		return $html;
	}
	
}
?>