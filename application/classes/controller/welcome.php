<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_SuperController {

	public function action_index()
	{
		$this->content = View::factory('news');
	}

} // End Welcome
