<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Katalog_Skolan extends Controller_Katalog_SuperController {

	public function action_index($edit = false)
	{
		if(isset($_POST) && !empty($_POST)){
			Model::factory('dynamic')->update_by_name('katalog.skolan', $_POST['ckedit']);
			$this->request->redirect('/katalog/skolan');
		}
		$this->content = View::factory('dynamic');
		$this->content->dynamic = 'katalog.skolan';
		$this->content->edit = $edit;
	}
} // End Welcome
