<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Export extends Controller {
    
    private $filename;
    private $contenttype;
    
    public function before(){
        $this->contenttype = 'application/vnd.ms-excel';
        $this->filename = $this->request->controller(). '_' .$this->request->action().'_'.date('Ymdhi').'.xls';
    }
    
	public function action_index()
	{
	}
	public function action_crew(){
        $crew = 
			DB::select_array(array('crew.*', 'user.fname', 'user.lname', 'user.phone', 'user.email', 'user.username'))
				->from('crew')
				->join('user')
				->on('crew.userid', '=', 'user.user_id')
				->order_by('crew.role', 'ASC')
				->order_by('user.lname', 'ASC')
				->order_by('user.fname', 'ASC')
				->order_by('crew.date', 'DESC')
				->execute()
				->as_array();
        $this->content = View::factory('admin/export/crew');
        $this->content->crew = $crew;
	}
    public function after() {
        $this->response->headers('Content-Type', $this->contenttype);
        $this->response->headers('Content-Disposition', 'attachment; filename="'.$this->filename.'"');
        $this->response->body($this->content);
    }
} // End Welcome
