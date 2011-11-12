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
				'content' => 'Sida 2',
				'attributes' => array(
					'href' => '/student/page2/'
				)
			)
			);
		$this->sideContent = View::factory('sidemenu')->set('alternatives', $sidemenu);
		parent::before();
	}
} // End Welcome
