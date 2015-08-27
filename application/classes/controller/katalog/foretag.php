<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Katalog_Foretag extends Controller_Katalog_SuperController {

	public function action_index($id)
	{
		$this->content = View::factory('katalog/foretagsinfo');
		$this->content->company        = Model::factory('company')->get_company_details($id);
		$this->content->branches       = Model::factory('company')->get_company_branches($id);
		$this->content->programs       = Model::factory('company')->get_company_programs($id);
		$this->content->offers         = Model::factory('company')->get_company_offers($id);
		$this->content->cities         = Model::factory('company')->get_company_cities($id);
		$this->content->countries      = Model::factory('company')->get_company_countries($id);
		$this->content->educationtypes = Model::factory('company')->get_company_educationtypes($id);
        if(isset($this->content->company['company_host'])){
            $this->content->host = user::get_user_data($this->content->company['company_host']);
        } else {
            $this->content->host = false;
        }
		$booth = Model::factory('company')->get_company_booth($id);
		if(count($booth) > 0)
		    list($this->content->booth)    = $booth;
		else 
		    $this->content->booth = false;
		    
		$this->js[] = '/js/katalog/personligasamtal.js';
		
	}

} // End Welcome
