<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_SuperController {
	public function before(){
		parent::before();
		if(isset($_SESSION['user']) && $_SESSION['user']->logged_in()){
			
		} else {
			$this->request->redirect('/');
		}	
	}
	public function action_details(){
		if(isset($_POST) && !empty($_POST)){
			unset($_POST['submit']);
			user::change_user_details($_SESSION['user']->getId(), $_POST);
		}
		$this->content = View::factory('userDetails');
		$this->content->user = user::get_user_data($_SESSION['user']->getId());
	}
	public function action_crew(){
		$this->content = View::factory('userCrew');
		$this->content->crew = DB::select('*')
								->from('crew')
								->where('userid', '=', $_SESSION['user']->getId())
								->execute()
								->as_array();
	}
	public function action_ps(){
		$this->content = View::factory('user/ps');
		$this->content->interest = DB::select('*')
								->from('interview_interest')
								->where('user', '=', $_SESSION['user']->getId())
								->join('company')
								->on('interview_interest.company', '=', 'company.company_id')
								->execute()
								->as_array();
	}
	public function action_cv(){
		if(isset($_POST) && !empty($_POST)){
		    $debug = $_SESSION['user']->getId().': '.var_export($_FILES, true);
//		    file_put_contents('cv.debug.log', $debug, FILE_APPEND);
		    if(is_file($_FILES['cv']['tmp_name']) && substr(file_get_contents($_FILES['cv']['tmp_name']), 0, 4) == '%PDF') {
				move_uploaded_file($_FILES['cv']['tmp_name'], user::$upload['cv'].$_SESSION['user']->getId().'.pdf');
				$_SESSION['message']['success'][] = 'Uppladdat och klart';
			} else {
				$_SESSION['message']['fail'][] = 'Du måste ladda upp en pdf';
			}
		}
		$this->content = View::factory('/user/cv');
		
	}
	public function action_image(){
		if(isset($_POST) && !empty($_POST)){
			if(array_search($_FILES['image']['type'], user::$imagetypes)) {
				move_uploaded_file($_FILES['image']['tmp_name'], user::$upload['image'].$_SESSION['user']->getId().'.'.array_search($_FILES['image']['type'], user::$imagetypes));
				$_SESSION['message']['success'][] = 'Uppladdat och klart';
			} else {
				$_SESSION['message']['fail'][] = 'Du måste ladda upp en bild, antingen jpg eller png.';
			}
		}
		$this->content = View::factory('/user/image');
		
	}
    public function action_booked(){
        $this->css[] = '/css/katalog/ps.css';
	    $this->content = View::factory('/user/booked');
	    $this->content->programs = Model::factory('data')->format_for_select(Model::factory('data')->get_program());
	    $this->content->users = 
	        DB::select_array(array('user.fname', 'user.lname', 'user.programId', 'user.user_id', 'interview_interest.*', array('company.name', 'companyname')))
	            ->from('user')
	            ->join('interview_interest')
	            ->on('user.user_id', '=', 'interview_interest.user')
	            ->join('company')
	            ->on('interview_interest.company', '=', 'company.company_id')
	            ->join('period')
	            ->on('interview_interest.period', '=', 'period.period_id')
	            ->where('interview_interest.user', '=', $_SESSION['user']->getId())
	            ->where('interview_interest.company_request', 'in', DB::expr('(1,2)'))
	            ->where('interview_interest.room', '>', '0')
	            ->where('interview_interest.period', '>', '0')
	            ->order_by('period.start', 'asc')
	            ->execute()
	            ->as_array();
	    $this->content->rooms = DB::select('*')
	                            ->from('room')
	                            ->order_by('name', 'asc')
	                            ->execute()
	                            ->as_array();
        $this->content->rooms = Model::factory('data')->format_for_select($this->content->rooms);
	    $periods = DB::select('*')
	                            ->from('period')
	                            ->order_by('start', 'asc')
	                            ->execute()
	                            ->as_array();
        $this->content->periods = array();
        foreach($periods as $p){
            $this->content->periods[$p['period_id']] = $p['start'].' - '.$p['end'];
        }
	}

} // End Welcome
