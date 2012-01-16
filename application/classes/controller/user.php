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

} // End Welcome
