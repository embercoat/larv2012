<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Katalog_export extends Kohana_controller {

	public function action_index()
	{
	}
	public function action_katalog(){	   
	    require Kohana::find_file('vendor', 'dompdf/dompdf_config.inc', 'php');
	    $pdf = new DOMPDF;
	    $template = View::factory('katalog/minkatalog');
	    $companies = array();
	    foreach(json_decode($_COOKIE['catalogue']) as $cid){
	        $companies[] = Model::factory('company')->get_company_details($cid);
	    }
	    $template->companies = $companies; 
	    $pdf->load_html($template, 'iso-8859-1');
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
	    $pdf->load_html($template, 'UTF-8');
	    $pdf->render();
	    $pdf->stream('my_catalogue.pdf');
	    
	}
} // End Welcome
