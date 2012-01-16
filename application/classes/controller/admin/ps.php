<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Ps extends Controller_Admin_SuperController {

	public function action_index()
	{
		$this->content = View::factory('admin/ps/studentinterest');
		$interests = DB::select_array(array('interview_interest.*', 'user.fname', 'user.lname', 'company.name'))
		        ->from('interview_interest')
		        ->join('user')
		        ->on('interview_interest.user', '=', 'user.user_id')
		        ->join('company')
		        ->on('interview_interest.company', '=', 'company.company_id')
		        ->order_by('company.name');
		$this->content->interests = $interests->execute()->as_array();
	}
	public function action_selected(){
	    $this->content = View::factory('/admin/ps/selected');
	    $sql = DB::select_array(array(
	    			'user.fname',
	    			'user.lname',
            	    'user.programId',
            	    'user.user_id',
            	    'interview_interest.company_request',
            	    'company.name'
        	    ))
	            ->from('user')
	            ->join('interview_interest')
	            ->on('user.user_id', '=', 'interview_interest.user')
	            ->join('company')
	            ->on('interview_interest.company', '=', 'company.company_id')
	            ->where('interview_interest.company_request', 'in', DB::expr('(1,2)'))
	            ->order_by('company_request', 'asc')
	            ->order_by('company.name', 'ASC');
	            
	    $this->content->users = 
	            $sql->execute()
	            ->as_array();
	}

} // End Welcome
