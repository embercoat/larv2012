<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Katalog_ps extends Controller_Katalog_SuperController {

	public function action_index($edit = false)
	{
		$companies = array();
		foreach(json_decode($_COOKIE['interview']) as $cid){
		    $companies[] = Model::factory('company')->get_company_details($cid);
		}
		$this->content = View::factory('katalog/ps/main');
		$this->content->companies= $companies;
	}
	public function action_complete(){
	    if(strlen($_POST['motivation']) >= 1000){
	        $_SESSION['message']['fail'][] = 'Du får ha högst 1000 tecken i din motivation.';
	        $this->request->redirect('/katalog/ps/');
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
