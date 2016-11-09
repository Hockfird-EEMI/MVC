<?php

	// Chargement du moteur d'affichage
	include_once('core/load.php');

	// Récupération des paramètres de l'URL
	if (!isset($_GET['module'])){
		$module = DEFAULT_MODULE;
	} else {
		$module = $_GET['module'];
	}

	// Appel du controller du module demandé
	$controller = 'app/controller/' . $module. '.php';
	if (file_exists($controller)) {
		include_once($controller);
		// Instanciation du controller 
		new Controller();
	} else {
		include_once('app/view/layouts/404.php');
	}