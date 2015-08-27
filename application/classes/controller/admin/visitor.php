<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Visitor extends Controller_Admin_SuperController {

	public function action_index()
	{
		$this->content = "<p>Välj en vy till Vänster</p>";
	}
	public function action_browsers(){
	    $this->content = View::factory('admin/visitor/table');
	    $this->content->list = DB::select_array(array(array(DB::expr('count(1)'), 'counter'), 'browser', 'version'))
	            ->from('visitor')
	            ->group_by('browser')
	            ->group_by('version')
	            ->order_by('counter', 'DESC')
	            ->execute()
	            ->as_array();
	    $this->content->list_heads = array('counter', 'browser', 'version');
	}
	public function action_pages(){
	    $this->content = View::factory('admin/visitor/table');
	    $this->content->list = DB::select_array(array(array(DB::expr('count(1)'), 'counter'), 'url'))
	            ->from('visitor')
	            ->group_by('url')
	            ->order_by('counter', 'DESC')
	            ->execute()
	            ->as_array();
	    $this->content->list_heads = array('counter', 'url');
	}
	public function action_mobile(){
	    $this->content = View::factory('admin/visitor/table');
	    $this->content->list = DB::select_array(array(array(DB::expr('count(1)'), 'counter'), 'mobile'))
	            ->from('visitor')
	            ->group_by('mobile')
	            ->order_by('counter', 'DESC')
	            ->execute()
	            ->as_array();
	    $this->content->list_heads = array('counter', 'mobile');
	    
	}

} // End Welcome
