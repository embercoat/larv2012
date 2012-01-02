<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Katalog_Sok extends Controller_Katalog_SuperController {

	public function action_index($edit = false)
	{
		$this->content = View::factory('/katalog/sok');
		$this->js[] = '/js/katalog/sok.js';
		
		$companies = array();
		foreach(Model::factory('company')->get_companies_catalogue_name() as $c){
			$companies[$c['company_id']] = (!empty($c['data']) ? $c['data'] : $c['name']);
		}
		asort($companies);
		$this->content->companies = $companies;
	}

} // End Welcome
