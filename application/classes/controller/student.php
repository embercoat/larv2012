<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Student extends Controller_SuperController {

	public function before(){
		$sidemenu = array(
			array(
				'content' => 'LARV Crew',
				'attributes' => array(
					'href' => '/student/crew/',
				)
			),
			array(
				'content' => 'Anmäl Intresse',
				'attributes' => array(
					'href' => '/student/crewregister/'
				)
			)
			);
		$this->sideContent = View::factory('sidemenu')->set('alternatives', $sidemenu);
		parent::before();
	}
	public function action_crewregister(){
		if(isset($_POST) && !empty($_POST)){
			if($_POST['role'] == 'chauffor'){
				$extradata = serialize($_POST['extradata']);
			} else {
				$extradata = '';
			}
			
			
			DB::insert('crew', array('userid', 'role', 'motivation', 'date', 'extradata'))
				->values(
					array(
						$_SESSION['user']->getId(),
						$_POST['role'],
						$_POST['motivation'],
						time(),
						$extradata
					) 
				)
				->execute();
		}
		$this->content = View::factory('crewregister');;
	}
} // End Welcome
