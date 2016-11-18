<?php
class coreView extends core
{
	function view( $module, $view, $data = null ) 
	{
		include 'app/view/' . $module . '/' . $view;
	}
}