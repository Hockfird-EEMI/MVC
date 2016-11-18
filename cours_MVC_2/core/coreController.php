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
	}

}