<?php

// Constantes générales
define("DB_CHARSET", "utf8");

	if (SERVER === "DEV") {

		// Paramètre de la base de données
		define("DB_HOST", "myhost1");
		define("DB_NAME", "mydbname1");
		define("DB_USER", "mylogin1");
		define("DB_PASSWORD", "mypassword1");
		define("PREFIXE", "pre1_");	


	} else if (SERVER === "TEST") {

		// Paramètre de la base de données
		define("DB_HOST", "myhost2");
		define("DB_NAME", "mydbname2");
		define("DB_USER", "mylogin2");
		define("DB_PASSWORD", "mypassword2");	
		define("PREFIXE", "pre2_");			


	} else if (SERVER === "PROD") {

		// Paramètre de la base de données
		define("DB_HOST", "myhost3");
		define("DB_NAME", "mydbname3");
		define("DB_USER", "mylogin3");
		define("DB_PASSWORD", "mypassword3");			
		define("PREFIXE", "pre3_");			

	}
