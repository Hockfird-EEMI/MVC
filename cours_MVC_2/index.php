<?php 

	// Chargement des paramètres
	include_once('app/config/dev_test_prod.php');
	include_once('app/config/config.inc.php');

	// Paramètrage des erreurs 
	if (defined('DEBUG') && DEBUG) {
		ini_set('display_errors',1);
		error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
	} else {
		ini_set('display_errors',0);
		error_reporting(0);
	}

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