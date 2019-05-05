<?php
namespace App\Table;

class Article {

	public function __get($get) {
		var_dump($get);
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