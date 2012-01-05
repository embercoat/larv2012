<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Katalog_export extends Kohana_controller {

    public function before(){
        Model::Factory('counter')->record();
    }
	public function action_index()
	{
	}
	public function action_katalog(){	   
	    require Kohana::find_file('vendor', 'dompdf/dompdf_config.inc', 'php');
	    $pdf = new DOMPDF;
	    $template = View::factory('katalog/minkatalog');
	    $companies = array();
	    $booths = array();
	    foreach(json_decode($_COOKIE['catalogue']) as $cid){
	        $company = Model::factory('company')->get_company_details($cid);
	        list($company['booth']) = Model::factory('company')->get_company_booth($cid);
	        $company['branches']             = Model::factory('company')->get_company_branches($cid);
   	        $company['programs']             = Model::factory('company')->get_company_programs($cid);
	        $company['offers']               = Model::factory('company')->get_company_offers($cid);
	        $company['cities']               = Model::factory('company')->get_company_cities($cid);
	        $company['countries']            = Model::factory('company')->get_company_countries($cid);
	        $company['educationtypes']       = Model::factory('company')->get_company_educationtypes($cid);
	        $companies[] = $company;
	    }
	    $template->companies = $companies; 
	    $template->booths = $booths;
	    
	    file_put_contents('render.htm', $template);
	    
//	    $this->response->body($template);
	    $pdf->load_html($template);
	    $pdf->render();
	    $pdf->stream('my_catalogue.pdf');
	}
	public function action_ps(){
	    require Kohana::find_file('vendor', 'dompdf/dompdf_config.inc', 'php');
	    $pdf = new DOMPDF;
	    $template = View::factory('katalog/minkatalog');
	    $companies = array();
	    foreach(json_decode($_COOKIE['interview']) as $cid){
	        $companies[] = Model::factory('company')->get_company_details($cid);
	    }
	    $template->companies = $companies; 
	    $template->booth = Model::factory('company')->get_company_booth($cid);
	    $pdf->load_html($template, 'UTF-8');
	    $pdf->render();
	    $pdf->stream('my_catalogue.pdf');
	    
	}
} // End Welcome
