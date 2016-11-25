<?php
class Controller extends appController {
	
	function index() {
		$data = $this->model->coreList("users", array(
								//"orderbycolumn" => "post_date",
								//"orderway" => "DESC",
								//"limit" => PAGINATION,
								//"offset" => $offset 
								));

		if ($data) {
			var_dump($data);
		} else {
			// Appel de la vue	
			$this->load->view('layouts', 'error.php');
		}
	}
}