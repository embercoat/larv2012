<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Katalog_booth extends Kohana_controller {

	public function action_index($id)
	{
	    if(substr($id, -4) == '.jpg'){
	        $id = substr($id, 0, -4);
	    }
		list($booth) = Model::factory('company')->get_company_booth($id);
		$exist = Kohana::find_file('../images', 'booth/'.$booth['place'], 'jpg');
		$this->response->headers('Content-Type', 'image/jpeg');
		
		if(!$exist)
		    Model::factory('booth')->render_booth($id);
		    
		echo file_get_contents(Kohana::find_file('../images', 'booth/'.$booth['place'], 'jpg'));
	}

} // End Welcome
