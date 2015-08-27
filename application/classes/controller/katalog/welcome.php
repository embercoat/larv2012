<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Katalog_Welcome extends Controller_Katalog_SuperController {

	public function action_index($edit = false)
	{
		if(isset($_POST) && !empty($_POST)){
			Model::factory('dynamic')->update_by_name('katalog.welcome', $_POST['ckedit']);
			$this->request->redirect('/katalog');
		}
		$this->content = View::factory('dynamic');
		$this->content->dynamic = 'katalog.welcome';
		$this->content->edit = $edit;
	}

} // End Welcome
