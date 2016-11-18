<?php

class Model extends appModel {


	public function postList($offset, $limite) {

		try {
			// On constitue la requête	
			$query = $this->_pdo->prepare('SELECT * FROM blog_posts
											ORDER BY post_date ASC LIMIT :offset, :limite');
			// On initialise les paramètres
			$query->bindParam(':offset', $offset, PDO::PARAM_INT);
			$query->bindParam(':limite', $limite, PDO::PARAM_INT);
			// On execute la requête
			$query->execute();
			// On récupère tous les résultats
			$posts = $query->fetchAll();
			// Supprime le curseur
			$query->closeCursor();
			// On retourne tous les articles sélectionnés
			return $posts;
		} catch (Exception $e) {
			return false;
		}
	}


	public function postRead($id) {

		try {
			// On constitue la requête	
			$query = $this->_pdo->prepare('SELECT * FROM blog_posts
											WHERE post_ID = :id');
			// On initialise les paramètres
			$query->bindParam(':id', $id, PDO::PARAM_INT);
			// On execute la requête
			$query->execute();
			// On récupère tous les résultats
			$posts = $query->fetchAll();
			// Supprime le curseur
			$query->closeCursor();
			// On retourne tous les articles sélectionnés
			return $posts;
		} catch (Exception $e) {
			return false;
		}
	}
}


// 	function postList($offset, $limite) {
// 		return "La liste des postes";
// 		// return false;
// 	}
// }
