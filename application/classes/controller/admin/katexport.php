<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_katexport extends Controller_Admin_SuperController {

	public function action_index()
	{
		$this->content = "katexport";
	}
	public function action_pregen(){
	    $this->css[] = '/css/admin/katexport.css';
	    $this->css[] = 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css';
	    $this->js[] = '/js/admin/katexport.js';
	    $this->js[] = '/js/jquery.ui.js';
	    $this->js[] = '/js/all_scripts.js';
	    $this->content = View::factory('admin/katexport/pregen');
	}

} // End Welcome
