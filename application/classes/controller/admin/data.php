<?php
/**
 * 
 * @author Kristian Nordman <kristian.nordman@scripter.se>
 *
 */
class Controller_Admin_data extends Controller_Admin_SuperController{
	function before(){
        parent::before();
	}
	public function action_index(){
		$this->content = 'data';
	}
	public function action_program(){
		$this->js[] = '/js/admin/data.js';
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
}
			



?>