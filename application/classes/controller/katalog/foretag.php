<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Katalog_Foretag extends Controller_Katalog_SuperController {

	public function action_index($id)
	{
		$this->content = View::factory('katalog/foretagsinfo');
		$this->content->company = Model::factory('company')->get_company_details($id);
		$this->content->branches = Model::factory('company')->get_company_branches($id);
		$this->content->programs = Model::factory('company')->get_company_programs($id);
		$this->content->offers = Model::factory('company')->get_company_offers($id);
	}

} // End Welcome
