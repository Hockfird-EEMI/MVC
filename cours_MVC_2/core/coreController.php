<?php
	class coreController extends core
	{
		public $load;
		public $model;

		function __construct($module)
		{
			$this->load = new coreView();

			// Chargement du model
			include_once('app/model/' . $module . '.php');
			$this->model = new Model();

			if (isset($_GET["action"])) {
				$action = $_GET["action"];
				if (method_exists($this, $action)) {
					$this->$action();
				} else {
					$this->page404();
				}
			} else {
				$this->index(0, 5);
			}
		}
	}


/*
function __construct($module)
	{
		parent::__construct($module);

		// Récupération des paramètres de l'URL
		if (isset($_GET['action'])) {
			if ($_GET['action']=='view') {
				if (isset($_GET['id'])) {
					// Action view
					$this->view($_GET['id']);
				} else {
					$this->page404();
				}
			} else {
				$this->page404();
			}
		} else {
			// Action index
				$this->index(0, 5);
		}
	} 
*/