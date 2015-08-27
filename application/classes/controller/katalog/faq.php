<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Katalog_faq extends Controller_Katalog_SuperController {

	public function action_index($edit = false)
	{
		if(isset($_POST) && !empty($_POST)){
			Model::factory('dynamic')->update_by_name('katalog.faq', $_POST['ckedit']);
			$this->request->redirect('/katalog/faq/');
		}
		$this->content = View::factory('dynamic');
		$this->content->dynamic = 'katalog.faq';
		$this->content->edit = $edit;
	}

} // End Welcome
