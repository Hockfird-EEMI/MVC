<?php
class coreModel extends core
{
	protected $_pdo;

	function __construct() {
		try {
			$dns = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME;
			// Options de connexion

			$options = array(
							PDO ::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . DB_CHARSET,
							PDO ::ATTR_ERRMODE => PDO ::ERRMODE_EXCEPTION);

			$this->_pdo = new PDO( $dns, DB_USER, DB_PASSWORD, $options );
			// var_dump($this->pdo);
		} catch (Exception $e) {
			die("Database error :". $e->getMessage());
		}
	}

	protected function coreDbError($e) {
		if (defined('DEBUG') && DEBUG) {
			$message = SITE_NAME . " dit : Erreur Mysql : " . $e->getMessage();
		} else {
			$message = SITE_NAME . " dit : Désolé, erreur technique du serveur !";
		}
		echo $message;
		exit;
	}

	public function coreRead($table, $options = array())
	{
		var_dump($options);
		try {
			// On constitue la requête	
			$sql = 'SELECT * FROM ' . PREFIXE . $table . 
					' WHERE ' . $options["wherecolumn"] . ' = :wherevalue';
			//var_dump($sql);					
			$query = $this->_pdo->prepare($sql);
			// On initialise les paramètres
			$query->bindParam(':wherevalue', $options["wherevalue"], PDO::PARAM_INT);
			// On execute la requête
			$query->execute();
			// On récupère tous les résultats
			$data = $query->fetch();
			// Supprime le curseur
			$query->closeCursor();
			// On retourne tous les articles sélectionnés
			return $data;
		} catch (Exception $e) {
			return false;
		}
	}

	public function coreList($table, $options = array()) 
	{
		try {
			// On constitue la requête
			$sql = 'SELECT * FROM ' . PREFIXE . $table;

			if ((isset($options["wherecolumn"]))&&(isset($options["wherevalue"]))) {
				$sql .= ' WHERE ' . $options["wherecolumn"] . '=:wherevalue';
			}

			if (isset($options["orderbycolumn"])) {
				$sql .= ' ORDER BY ' . $options["orderbycolumn"];
			}			

			if (isset($options["orderway"])) {
				$sql .= ' ' . $options["orderway"];
			}

			if (isset($options["limit"])) {
				$sql .= ' LIMIT ';
				if (isset($options["offset"])) {
					$sql .= ':offset, ';
				}
				$sql .=':limit';
			}


			$query = $this->_pdo->prepare($sql);

			// On initialise les paramètres
			if ((isset($options["wherecolumn"]))&&(isset($options["wherevalue"]))) {
				$query->bindParam(':wherevalue', $options["wherevalue"], PDO::PARAM_INT);
			}
			if (isset($options["limit"])) {
				if (isset($options["offset"])) {
					$query->bindParam(':offset', $options[offset], PDO::PARAM_INT);			
				}
				$query->bindParam(':limit', $options[limit], PDO::PARAM_INT);						
			}			

			// On execute la requête
			$query->execute();
			// On récupère tous les résultats
			$data = $query->fetchAll();
			// Supprime le curseur
			$query->closeCursor();
			// On retourne tous les articles sélectionnés
			return $data;
		} catch (Exception $e) {
			return false;
		}
	}


}