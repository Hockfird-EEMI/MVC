<?php 

// Chargement du model
include_once('app/model/post.php');

class Controller 
{
	public $load;
	public $model;

	function __construct()
	{
		$this->load = new Load();
		$this->model = new Model();
		// var_dump($this);


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
		$data = $this->model->postList($limite, $offset);
		if ($data) {
			define("PAGE_TITLE", "Listes articles");
			$this->load->view('posts', 'index.php', $data);
		} else {
			$this->load->view('layouts', 'error.php');
		}
	}

	function view($id) {

	}

	function page404() {
		// $this->load->view('404.php');
		echo "l echo de l erreur 404 !!";
	}
}