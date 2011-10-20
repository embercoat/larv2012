<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Foretag extends Controller_SuperController {
	private $name = 'foretag';

	public function action_index()
	{
		$this->content = View::factory('dynamic');
		$this->content->dynamic = $this->name;
		$this->content->edit = false;
	}
	public function action_edit(){
		if(isset($_POST) && !empty($_POST)){
			Model::factory('dynamic')->update_by_name($this->name, $_POST['ckedit']);
		}
		
		$this->content = View::factory('dynamic');
		$this->content->edit = true;
		$this->content->dynamic = $this->name;
	}

} // End Welcome
