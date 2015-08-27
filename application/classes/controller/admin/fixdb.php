<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_FixDb extends Controller_Admin_SuperController {

	public function action_locations()
	{
		$this->content = View::factory('admin/fixdb/locationsStage1');
	}
	public function action_locationsStage2()
	{
		$this->content = View::factory('admin/fixdb/locationsStage2');

		$cities = DB::select('*')
		            ->from('company_data')
		            ->where('field', '=', 'catalogue_cities')
		            ->execute()
		            ->as_array();
		$extractedCities = array();
		foreach($cities  as $c)
		    foreach(preg_split("/(( och )|(m[. ]fl)|(bl a)|[,;.])/i", $c['data']) as $cPart)
		        if(!empty($cPart))
		            $extractedCities[] = trim($cPart);

		sort($extractedCities);
		$this->content->cities = array_unique($extractedCities);

	}
	public function action_locationsStage3(){
		$cities = DB::select('*')
		            ->from('company_data')
		            ->where('field', '=', 'catalogue_cities')
		            ->execute()
		            ->as_array();

		$insertCities = DB::insert('city', array('name'));
		foreach($_POST['city'] as $city){
		    $insertCities->values(array($city));
		}
		DB::delete('city')->execute();
		DB::delete('company_city')->execute();
		$insertCities->execute();
		$link = DB::insert('company_city', array('company_id', 'city_id'));
		foreach($cities as $c){
	        foreach(Model::factory('data')->get_city() as $id => $city)
	            if(strpos($c['data'], $city) !== false)
	                $link->values(array($c['company_id'], $id));
	    }
	    $link->execute();
	}

	public function action_countries()
	{
		$this->content = View::factory('admin/fixdb/countriesStage1');
	}
	public function action_countriesStage2()
	{
		$this->content = View::factory('admin/fixdb/countriesStage2');

		$cities = DB::select('*')
		            ->from('company_data')
		            ->where('field', '=', 'catalogue_countries')
		            ->execute()
		            ->as_array();
		$extractedCountries = array();
		foreach($cities  as $c)
		    foreach(preg_split("/(( och )|(m[. ]fl)|(bl a)|[,;.]|( and ))/i", $c['data']) as $cPart)
		        if(!empty($cPart))
		            $extractedCountries[] = trim($cPart);

		sort($extractedCountries);
		$this->content->countries = array_unique($extractedCountries);

	}
	public function action_countriesStage3(){
		$countries = DB::select('*')
		            ->from('company_data')
		            ->where('field', '=', 'catalogue_countries')
		            ->execute()
		            ->as_array();

		$insertCountries = DB::insert('country', array('name'));
		foreach($_POST['country'] as $country){
		    $insertCountries->values(array($country));
		}
//		DB::delete('country')->execute();
//		DB::delete('company_countries')->execute();
//		$insertCountries->execute();
		$link = DB::insert('company_countries', array('company_id', 'country_id'));
		foreach($countries as $c){
	        foreach(Model::factory('data')->get_country() as $id => $country){
	            if(strpos($c['data'], $country) !== false) {
	                $link->values(array($c['company_id'], $id));
	            }
	        }
	    }
	    $link->execute();
	}
	/*
	 * Obsolete. Import does this immediately
	public function action_fixInterestedIn(){
	    $programs = DB::select('*')
	                    ->from('company_program')
	                    ->where('program_id', 'in', DB::expr('(119, 120, 122, 123)'))
	                    ->execute()
	                    ->as_array();
	    $insert = DB::insert('company_educationType', array('company_id', 'educationtype_id'));
	    foreach($programs as $p){
	        switch($p['program_id']){
	            case "119":{
	                $newProgram = 1;
	                break;
	            }
	            case "120":{
	                $newProgram = 2;
	                break;
	            }
	            case "122":{
	                $newProgram = 3;
	                break;
	            }
	            case "123":{
	                $newProgram = 4;
	                break;
	            }
	        }
	        $insert->values(array($p['company_id'], $newProgram));
	    }
	    $insert->execute();
	    $del = DB::delete('company_program')
	        ->where('program_id', 'in', DB::expr('(119, 120, 122, 123)'));
	    $del->execute();
	    $this->content = 'All done. Carry on Soldier!';
	}
	*/
	public function before(){
	    parent::before();
	    if($_SESSION['user']->getId() != 265){
	        $this->content = View::factory('admin/fixdb/restricted');
	    }
	}

} // End Welcome
