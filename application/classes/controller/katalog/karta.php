<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Katalog_Karta extends Controller_Katalog_SuperController {

	public function action_index()
	{
		$this->content = View::factory('katalog/foretagsinfo');
	}

} // End Welcome
