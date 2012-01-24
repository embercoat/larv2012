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
	public function action_schema(){
	    //ALTER TABLE `larv2012`.`interview_interest` ADD COLUMN `room` INT NULL  AFTER `company_request` , ADD COLUMN `period` INT NULL  AFTER `room` ;
	    $this->css[] = '/css/admin/ps.css';
	    $this->content = View::factory('/admin/ps/schedule');
	    $sql = DB::select_array(array(
	    			'user.fname',
	    			'user.lname',
            	    'user.programId',
            	    'user.user_id',
            	    'interview_interest.company_request',
            	    'company.name',
            	    'interview_interest.room',
	                'interview_interest.period'
        	    ))
	            ->from('user')
	            ->join('interview_interest')
	            ->on('user.user_id', '=', 'interview_interest.user')
	            ->join('company')
	            ->on('interview_interest.company', '=', 'company.company_id')
	            ->where('interview_interest.company_request', 'in', DB::expr('(1,2)'))
	            ->order_by('company_request', 'asc')
	            ->order_by('company.name', 'ASC');
	    $users = 
	            $sql->execute()
	            ->as_array();
	    $timetable = array();
	    foreach($users as $u){
	        $timetable[$u['period']][$u['room']] = $u;
	    }
	    $this->content->timetable = $timetable;
	    $this->content->rooms = DB::select('*')
	                            ->from('room')
	                            ->order_by('name', 'asc')
	                            ->execute()
	                            ->as_array();
	    $this->content->periods = DB::select('*')
	                            ->from('period')
	                            ->order_by('start', 'asc')
	                            ->execute()
	                            ->as_array();
	}
	public function action_schemaForetag(){
	    //ALTER TABLE `larv2012`.`interview_interest` ADD COLUMN `room` INT NULL  AFTER `company_request` , ADD COLUMN `period` INT NULL  AFTER `room` ;
	    $this->css[] = '/css/admin/ps.css';
	    $this->content = View::factory('/admin/ps/scheduleForetag');
	    $sql = DB::select_array(array(
	    			'user.fname',
	    			'user.lname',
	                'user.phone',
            	    'user.programId',
            	    'user.user_id',
            	    'interview_interest.company_request',
            	    'company.name',
	                'company.company_id',
            	    'interview_interest.room',
	                'interview_interest.period'
        	    ))
	            ->from('user')
	            ->join('interview_interest')
	            ->on('user.user_id', '=', 'interview_interest.user')
	            ->join('company')
	            ->on('interview_interest.company', '=', 'company.company_id')
	            ->where('interview_interest.company_request', 'in', DB::expr('(1,2)'))
	            ->order_by('company.name', 'ASC')
	            ->order_by('company_request', 'asc');
	    $users = 
	            $sql->execute()
	            ->as_array();
	    $timetable = array();
	    foreach($users as $u){
	        $timetable[$u['period']][$u['company_id']] = $u;
	    }
	    $this->content->timetable = $timetable;
	    $this->content->foretag = DB::select('*')
	                            ->from('company')
	                            ->order_by('name', 'asc')
	                            ->where('company_id', 'IN', DB::select('company_id')
	                                ->from('company_data')
	                                ->where('company_data.field', '=', 'interview_offer')
	                                ->where('company_data.data', '=', 'Ja, Yes')
	                                )
	                            ->execute()
	                            ->as_array();
	    $this->content->rooms = DB::select('*')
	                            ->from('room')
	                            ->order_by('name', 'asc')
	                            ->execute()
	                            ->as_array();
	    $this->content->rooms = Model::factory('data')->format_for_select($this->content->rooms);
	    $this->content->periods = DB::select('*')
	                            ->from('period')
	                            ->order_by('start', 'asc')
	                            ->execute()
	                            ->as_array();
	}
	public function action_selected(){
  	    $this->js[] = '/js/admin/ps.js';
  	    $this->js[] = '/js/datatables/media/js/jquery.dataTables.min.js';
	    $this->content = View::factory('/admin/ps/selected');
	    $sql = DB::select_array(array(
	    			'user.fname',
	    			'user.lname',
            	    'user.programId',
            	    'user.user_id',
            	    'interview_interest.company_request',
	    			'interview_interest.room',
	                'interview_interest.company',
	    			'interview_interest.period',
            	    'company.name'
        	    ))
	            ->from('user')
	            ->join('interview_interest')
	            ->on('user.user_id', '=', 'interview_interest.user')
	            ->join('company')
	            ->on('interview_interest.company', '=', 'company.company_id')
	            ->where('interview_interest.company_request', 'in', DB::expr('(1,2)'))
	            ->order_by('company_request', 'asc')
	            ->order_by('user.lname', 'ASC');
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
	    $this->content->rooms[0] = 'Inget Rum';
	    ksort($this->content->rooms);
        $this->content->periods = array();
        foreach($periods as $p){
            $this->content->periods[$p['period_id']] = $p['start'].' - '.$p['end'];
        }
        $this->content->periods[0] = 'Ingen Tid';
        ksort($this->content->periods);
	    $this->content->users = 
	            $sql->execute()
	            ->as_array();
	}
	public function action_editInterview(){
	    if(isset($_POST) && !empty($_POST)){
	        list($count) = DB::select(DB::expr('count(1) as c'))
	                        ->from('interview_interest')
	                        ->where('room', '=', $_POST['newroom'])
	                        ->where('period', '=', $_POST['newperiod'])
	                        ->execute()
	                        ->as_array();
            list($count_user) = DB::select(DB::expr('count(1) as c'))
	                        ->from('interview_interest')
	                        ->where('user', '=', $_POST['user_id'])
	                        ->where('period', '=', $_POST['newperiod'])
	                        ->execute()
	                        ->as_array();
	        
	        if(($count['c'] == 0 && $count_user['c'] == 0) || ($_POST['newperiod'] == 0 && $_POST['newroom'] == 0)){
    	        DB::update('interview_interest')
    	            ->set(array(
    	                'room' => $_POST['newroom'],
    	                'period' => $_POST['newperiod']
    	            ))
    	            ->where('user', '=', $_POST['user_id'])
    	            ->where('company', '=', $_POST['company_id'])
    	            ->execute();
    	       $_SESSION['message']['success'][] = 'Bokningen Godkänd';
	        } else {
	            if($count['c'])
	                $_SESSION['message']['fail'][] = 'Rum-Tid kombinationen är redan upptagen.';
	            if($count_user['c'])
	                $_SESSION['message']['fail'][] = 'Studenten är redan bokad på den tiden.';
	            
	        }
	    }
	    $this->request->redirect('/admin/ps/selected');
	}
    public function action_room(){
	    $this->js[] = '/js/admin/ps.js';
	    $this->content = View::factory('admin/ps/rooms');
	    $this->content->rooms = DB::select('*')
	                                ->from('room')
	                                ->order_by('name')
	                                ->execute()
	                                ->as_array();
	}
	public function action_editRoom(){
	    if($_POST['room_id'] !== 'new'){
            $sql = DB::update('room')
		        ->set(array(
		        	'name' => $_POST['newname']
		        ))
		        ->where('room_id', '=', $_POST['room_id']);
		        $sql->execute();
	    } else {
	        DB::insert('room', array('name'))
	            ->values(array('name' => $_POST['newname']))
	            ->execute();
	    }
        $this->request->redirect('/admin/ps/room');
	}
    public function action_delRoom($id){
	    DB::delete('room')
	        ->where('room_id', '=', $id)
	        ->limit(1)
	        ->execute();

	    $this->request->redirect('/admin/ps/room');
	}
    public function action_period(){
	    $this->js[] = '/js/admin/ps.js';
	    $this->content = View::factory('admin/ps/periods');
	    $this->content->periods = DB::select('*')
	                                ->from('period')
	                                ->order_by('start', 'asc')
	                                ->execute()
	                                ->as_array();
	}
	public function action_editPeriod(){
	    if($_POST['period_id'] !== 'new'){
            $sql = DB::update('period')
		        ->set(array(
		        	'start' => $_POST['newstart'],
		        	'end' => $_POST['newend']
		        ))
		        ->where('period_id', '=', $_POST['period_id']);
		        $sql->execute();
	    } else {
	        DB::insert('period', array('start','end'))
	            ->values(array(
	            	'start' => $_POST['newstart'],
	                'end' => $_POST['newend']
	            ))
	            
	            ->execute();
	    }
        $this->request->redirect('/admin/ps/period');
	}
    public function action_delPeriod($id){
	    DB::delete('period')
	        ->where('period_id', '=', $id)
	        ->limit(1)
	        ->execute();

	    $this->request->redirect('/admin/ps/period');
	}
} // End Welcome
