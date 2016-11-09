<?php
class Load 
{
	function view( $module, $view, $data = null ) 
	{
		include 'app/view/' . $module . '/' . $view;
	}
}