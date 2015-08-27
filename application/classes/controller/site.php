<?php defined('SYSPATH') or die('No direct script access.');

class Controller_site extends Controller_SuperController {

	public function action_startsida(){
		$this->request->redirect('/');
	}
	
} // End Welcome
