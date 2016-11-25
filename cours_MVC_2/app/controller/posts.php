<?php 
class Controller extends appController{

	function index() {

		// Traitement des paramètres 
		if (isset ($_GET["page"])) {
			$page = $_GET["page"];			
		} else {
			$page = 1;
		}

		// Variable calculées 
		$offset = ($page - 1) * PAGINATION;

		// Appel du model
		$data = $this->model->coreList("posts", array(
								//"wherecolumn" => "post_category",
								//"wherevalue" => 2,
								"orderbycolumn" => "post_date",
								"orderway" => "DESC",
								"limit" => PAGINATION,
								"offset" => $offset));
		if ($data) {
			// Appel de la vue	
			define("PAGE_TITLE", "Listes articles");
			$this->load->view('posts', 'index.php', $data);
		} else {
			// Appel de la vue	
			$this->load->view('layouts', 'error.php');
		}
	}


	function view() {

		// Traitement des paramètres 
		if (isset ($_GET["id"])) {
			$id = $_GET["id"];			

			// Appel du model
			$data = $this->model->coreRead("posts", 
									array(	"wherecolumn" => "post_ID", 
											"wherevalue" => $id));
			if ($data) {
				define("PAGE_TITLE", "Détail articles");
				$this->load->view('posts', 'view.php', $data);
			} else {
				$this->load->view('layouts', 'error.php');
			}
		} else {
			die("Paramètre manquant !");
		}		
	}
}