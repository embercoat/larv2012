<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Admin extends Controller_Admin_SuperController {

	public function action_index()
	{
		$this->content = View::factory('/admin/welcome');
	}

} // End Welcome
