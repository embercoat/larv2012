<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Student extends Controller_SuperController {

	public function before(){
		parent::before();
	}
	
	public function action_crewregister(){
		if(isset($_POST) && !empty($_POST)){
			if(empty($_POST['role'])){
				$_SESSION['message']['fail'][] = 'Du måste ange en roll.';
			} else {
				if($_POST['role'] == 'chauffor' && !empty($_POST['extradata'])){
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
				$_SESSION['message']['success'][] = 'Du har nu anmält ditt intresse till LARV2012';
			}
		}
		$this->content = View::factory('crewregister');;	
	}
} // End Welcome
