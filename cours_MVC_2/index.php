<?php 

	// Paramètrage des erreurs 
	ini_set('display_errors',1);
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

	// Chargement des paramètres
	include_once('app/config/config.inc.php');

	// Charegement du core
	require_once('core/core.php');
	require_once('core/coreController.php');
	require_once('core/coreModel.php');
	require_once('core/coreView.php');

	// Charegement de l'application
	require_once('app/appController.php');
	require_once('app/appModel.php');

	// Lancement de l'application
	include_once('app/app.php');	