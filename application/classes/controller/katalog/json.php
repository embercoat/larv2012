<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Katalog_json extends Kohana_Controller {

	public function action_index()
	{
		$this->response->body('This is the JSON-backend for larv.org');
	}
	public function action_getCompany(){
	    if(is_numeric($_POST['cid'])){
	        list($company) = Model::factory('company')->get_companies_catalogue_name($_POST['cid']);
	        $this->response->body(json_encode($company));
	    }
	}

} // End Welcome
