<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_katexport extends Controller_Admin_SuperController {

	public function action_index()
	{
		$this->content = "katexport";
	}
	public function action_pregen(){
	    $this->css[] = '/css/admin/katexport.css';
	    $this->js[] = '/js/admin/katexport.js';
	    $this->content = View::factory('admin/katexport/pregen');
	}

} // End Welcome
