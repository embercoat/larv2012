<?php
/**
 * 
 * @author Kristian Nordman <kristian.nordman@scripter.se>
 * @author Stefan Sundin <stefan@stefansundin.com>
 * @author Alexandra Tsampikakis <alexandra.tsampikakis@gmail.com>
 */

class Controller_Admin_data extends Controller_Admin_SuperController{
	function before(){
		$this->js[] = '/js/admin/data.js';
        parent::before();
	}
	
	public function action_index(){
		$this->content = 'data';
	}
	
	public function action_program(){
	    $programs = DB::select('*')
                        ->from('program')
                        ->order_by('name', 'asc')
                        ->execute()
                        ->as_array();
        $this->content = View::Factory('admin/data/programs');
        $this->content->programs = $programs;
	}
	
	public function action_delProgram($pid){
	    DB::delete('program')
	        ->where('id', '=', $pid)
	        ->limit(1)
	        ->execute();
	    DB::update('user')
            ->set(array('programId' => 37))
            ->where('programId','=', $pid)
            ->execute();

	    $this->request->redirect('/admin/data/program');
	}
	
	public function action_editProgram(){
	    if($_POST['program_id'] !== 'new'){
	        if($_POST['oldname'] == $_POST['newname']){
	        } else {
		        DB::update('program')
			        ->set(array('name' => $_POST['newname'], 'url' => $_POST['newurl']))
			        ->where('id', '=', $_POST['program_id'])
			        ->execute();
	        }
	    } else {
	        DB::insert('program', array('name', 'url'))
	            ->values(array('name' => $_POST['newname'], 'url' => $_POST['newurl']))
	            ->execute();
	    }
        $this->request->redirect('/admin/data/program');
	}
	
	
	/* Sidemenu */
	public function action_sidemenu(){
		$controllers = array();
		foreach(scandir(APPPATH.'classes/controller/') as $file){
			if(substr($file, -4) == '.php')
				$controllers[substr($file, 0, -4)] = substr($file, 0, -4);
		}
		$this->content = View::Factory('admin/data/sidemenu');
		$this->content->controllers = $controllers;
	}
	
	public function action_editSidemenu() {
		if (!empty($_POST['oldid'])) {
			DB::update('sidemenu')
				->set(array(
					'id' => $_POST['id'],
					'controller' => $_POST['controller'],
					'text' => $_POST['text'],
					'action' => $_POST['action']))
				->where('id', '=', $_POST['oldid'])
				->execute();
	    }
	    else {
			DB::insert('sidemenu')
				->values(array($_POST['id'], $_POST['controller'], $_POST['text'], $_POST['action']))
	            ->execute();
		}
   	 	$this->request->redirect('/admin/data/sidemenu');
	}
	
	public function action_delSidemenu($id){
	    DB::delete('sidemenu')
	        ->where('id', '=', $id)
	        ->limit(1)
	        ->execute();

	    $this->request->redirect('/admin/data/sidemenu');
	}

}
			



?>
