<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Katalog_export extends Kohana_controller {

    public function before(){
        Model::Factory('counter')->record();
        ini_set('memory_limit', '1024M');
    }
	public function action_index()
	{
	}
	public function action_katalog(){
	    error_reporting(E_ALL & ~E_STRICT);
	    if(empty($_COOKIE['catalogue']))
	        $_COOKIE['catalogue'] = json_encode(array(210));
	    require Kohana::find_file('vendor', 'PDFMerger/PDFMerger', 'php');
        $pdf = new PDFMerger;
        foreach(json_decode($_COOKIE['catalogue']) as $cid){
            if($cid != 286)
                $pdf->addPDF('pdf/katalog/'.$cid.'.pdf');        
        }
        $this->response->headers('Content-Type', 'application/pdf');
        $pdf->merge('download', 'my_catalogue.pdf');
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
