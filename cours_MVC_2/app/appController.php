<?php
class appController extends coreController
{
	function page404() {
		echo "depuis app" . "<br>";
		echo "DEBUG = " . DEBUG . "<br>";
		echo "RUN = " . RUN . "<br>";
		echo "GA = " . GA . "<br>";
		// $this->load->view('404.php');
		echo "echo ERREUR 404 !";
	}


}