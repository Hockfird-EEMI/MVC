<?php

	if (SERVER === "DEV") {
		/**
		* Constantes spécifiques pour config serveur de DEV
		*/
		define('DEBUG', true);
		define('RUN', 'NORMAL');
		define('GA', true);


	} else if (SERVER === "TEST") {
		/**
		* Constantes spécifiques pour config serveur de TEST
		*/
		define('DEBUG', true);
		define('RUN', 'NORMAL');
		define('GA', false);


	} else if (SERVER === "PROD") {
		/**
		* Constantes spécifiques pour config serveur de PROD
		*/
		define('DEBUG', false);
		define('RUN', 'WAIT');
		define('GA', true);
	}


	define("DEFAULT_MODULE", "post");