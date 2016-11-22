<?php 
class Controller extends appController{

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

	function index($offset, $limite) {
		$data = $this->model->postList($offset, $limite);
		if ($data) {
			define("PAGE_TITLE", "Listes articles");
			$this->load->view('posts', 'index.php', $data);
		} else {
			$this->load->view('layouts', 'error.php');
		}
	}

	function view($id) {
		$data = $this->model->postRead($id);
		if ($data) {
			define("PAGE_TITLE", "Détail articles");
			$this->load->view('posts', 'view.php', $data[0]);
		} else {
			$this->load->view('layouts', 'error.php');
		}		

	}

	function page404() {
		echo "DEBUG = " . DEBUG . "<br>";
		echo "RUN = " . RUN . "<br>";
		echo "GA = " . GA . "<br>";
		// $this->load->view('404.php');
		echo "echo ERREUR 404 !";
	}
}