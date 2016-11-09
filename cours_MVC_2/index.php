<?php 

	// Paramètrage des erreurs 
	ini_set('display_errors',1);
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

	// Chargement des paramètres
	include_once('app/config/config.inc.php');

	// Lancement de l'application
	include_once('app/app.php');	