<?php

class Model {

	function __construct()
	{
		try {
			$dns = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
			// Options de connexion

			$options = array(
							PDO ::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
							PDO ::ATTR_ERRMODE => PDO ::ERRMODE_EXCEPTION);

			$this->pdo = new PDO( $dns, DB_USER, DB_PASSWORD, $options );
		} catch (Exception $e) {
			die("Database error :". $e->getMessage());
		}
	}


	public function postList($offset, $limite) {

		try {
			// On constitue la requête	
			$query = $this->pdo->prepare('SELECT * FROM blog_posts
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
			$query = $this->pdo->prepare('SELECT * FROM blog_posts
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
