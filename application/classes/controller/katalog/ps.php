<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Katalog_ps extends Controller_Katalog_SuperController {

	public function action_index($edit = false)
	{
	    if(isset($_POST) && !empty($_POST)){
	        foreach($_POST['motivation'] as $cid => $m){
	            $special_arr = array('å', 'ä', 'ö', 'Å', 'Ä', 'Ö');
	            $offset = 0;
	            foreach($special_arr as $s){
	                $offset += substr_count($m, $s);
	            }
        	    if(strlen($m)-$offset > 1000){
        	        list($company) = Model::factory('company')->get_companies_catalogue_name($cid);
        	        $_SESSION['message']['fail'][] = 'Motivationen för '. $company['data'] .' är för lång. Max 1000 tecken';
        	    }
    	    }
    	    if(!isset($_SESSION['message']['fail'])){
        	    $in_db = DB::select('company')
        	                ->from('interview_interest')
        	                ->where('user', '=', $_SESSION['user']->getId())
        	                ->execute()
        	                ->as_array();
        	    $search_arr = array();
        	    
                foreach($in_db as $idb)
                    $search_arr[] = $idb['company'];
                    
                $insert = DB::insert('interview_interest', array('user', 'company', 'motivation', 'time'));
                $new = false;
                foreach(json_decode($_COOKIE['interview']) as $cid){
                    if(array_search($cid, $search_arr) === false){
                        $new = true;
                        $insert->values(array(
                            $_SESSION['user']->getId(),
                            $cid,
                            $_POST['motivation'][$cid],
                            time()
                        ));
                    }
                }
                
                if($new)
                    $insert->execute();
                $this->content = View::factory('katalog/ps/complete');
    	    } else {
        		$companies = array();
        		foreach(json_decode($_COOKIE['interview']) as $cid){
        		    $companies[] = Model::factory('company')->get_company_details($cid);
        		}
        		$this->js[] = '/js/katalog/ps.js';
        		$this->content = View::factory('katalog/ps/main');
        		$this->content->companies= $companies;
        		$this->content->preset = $_POST;
    	    }
	    } else {
    		$companies = array();
    		foreach(json_decode($_COOKIE['interview']) as $cid){
    		    $companies[] = Model::factory('company')->get_company_details($cid);
    		}
    		$this->js[] = '/js/katalog/ps.js';
    		$this->content = View::factory('katalog/ps/main');
    		$this->content->companies= $companies;
	    }
	}
	public function action_complete(){
	    foreach($_POST['motivation'] as $cid => $m){
    	    if(strlen($m) >= 1000){
    	        $company = Model::factory('company')->get_companies_catalogue_name($cid);
    	        $_SESSION['message']['fail'][] = 'Motivationen för '. $company['data'] .' är för lång. Max 1000 tecken';
    	    }
	    }
	    $in_db = DB::select('company')
	                ->from('interview_interest')
	                ->where('user', '=', $_SESSION['user']->getId())
	                ->execute()
	                ->as_array();
	    $search_arr = array();
	    
        foreach($in_db as $idb)
            $search_arr[] = $idb['company'];
            
        $insert = DB::insert('interview_interest', array('user', 'company', 'motivation', 'time'));
        $new = false;
        foreach(json_decode($_COOKIE['interview']) as $cid){
            if(array_search($cid, $search_arr) === false){
                $new = true;
                $insert->values(array(
                    $_SESSION['user']->getId(),
                    $cid,
                    $_POST['motivation'],
                    time()
                ));
            }
        }
        if($new)
            $insert->execute();
        $this->content = View::factory('katalog/ps/complete');
	}

} // End Welcome
