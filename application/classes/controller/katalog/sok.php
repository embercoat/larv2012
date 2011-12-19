<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Katalog_Sok extends Controller_Katalog_SuperController {

	public function action_index($edit = false)
	{
		$this->content = View::factory('/katalog/sok');
		$this->content->companies = Model::factory('company')->get_companies();
	}

} // End Welcome
