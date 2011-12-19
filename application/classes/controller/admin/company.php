<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Company extends Controller_Admin_SuperController {

	public function action_index()
	{
		$this->content = View::factory('/admin/company/main');
		$this->content->companies = Model::factory('company')->get_companies();
	}
	public function action_details($id, $edit = false){
		if(isset($_POST) && !empty($_POST)){
			unset($_POST['submit']);
			Model::factory('company')->set_data($id, $_POST);
		}
		
		if(!$edit)
			$this->content = View::factory('/admin/company/details');
		else 
			$this->content = View::factory('/admin/company/editDetails');
			
		$this->content->company = Model::factory('company')->get_company_details($id);
		$sql = DB::select_array(array('crew.userid', 'user.fname', 'user.lname'))
				->from('crew')
				->join('user')
				->on('crew.userid', '=', 'user.user_id')
				->where('crew.role', '=', 'foretagsvard')
				->or_where('crew.role', '=', 'ftv')
				->order_by('crew.role', 'ASC')
				->order_by('user.lname', 'ASC')
				->order_by('user.fname', 'ASC')
				->order_by('crew.date', 'DESC');
		$hosts = $sql->execute()->as_array();
		$this->content->hosts = array();
		foreach($hosts as $h){
			$this->content->hosts[$h['userid']] = (empty($h['lname']) ? $h['fname'] : $h['fname'] .' '. $h['lname']);
		}
		var_dump($this->content->hosts);
	}
	
	public function action_detailsEvent($id, $edit = false){
		if(!$edit)
			$this->content = View::factory('/admin/company/detailsEvent');
		else 
			$this->content = View::factory('/admin/company/editDetailsEvent');
			
		$this->content->company = Model::factory('company')->get_company_details($id);
	}
	
	public function action_detailsInterview($id, $edit = false){
		if(!$edit)
			$this->content = View::factory('/admin/company/detailsInterview');
		else 
			$this->content = View::factory('/admin/company/editDetailsInterview');
			
		$this->content->company = Model::factory('company')->get_company_details($id);
		
	}
	
	public function action_detailsGoods($id, $edit = false){
		if(!$edit)
			$this->content = View::factory('/admin/company/detailsGoods');
		else 
			$this->content = View::factory('/admin/company/editDetailsGoods');
			
		$this->content->company = Model::factory('company')->get_company_details($id);
		
	}
	
	public function action_detailsBooth($id, $edit = false){
		if(!$edit)
			$this->content = View::factory('/admin/company/detailsBooth');
		else 
			$this->content = View::factory('/admin/company/editDetailsBooth');
			
		$this->content->company = Model::factory('company')->get_company_details($id);
		
	}
	
	public function action_detailsCatalogue($id, $edit = false){
		if(isset($_POST) && !empty($_POST)){
			unset($_POST['submit']);
			Model::factory('company')->set_data($id, $_POST);
		}
		if(!$edit)
			$this->content = View::factory('/admin/company/detailsCatalogue');
		else 
			$this->content = View::factory('/admin/company/editDetailsCatalogue');
			
		$this->content->company = Model::factory('company')->get_company_details($id);
	}
	public function action_detailsFile($id){
		if(isset($_POST) && !empty($_POST)){
			$parts = explode('.', $_FILES['catalogue_file_ad_big']['name']);
			$filename = 'upload/ads/'.$id.'_big.'.array_pop($parts);
			move_uploaded_file($_FILES['catalogue_file_ad_big']['tmp_name'], $filename);
			$data['catalogue_file_ad_big'] = $filename;
			
			$parts = explode('.', $_FILES['catalogue_file_ad_small']['name']);
			$filename = 'upload/ads/'.$id.'_small.'.array_pop($parts);
			move_uploaded_file($_FILES['catalogue_file_ad_small']['tmp_name'], $filename);			
			$data['catalogue_file_ad_small'] = $filename;
			
			Model::factory('company')->set_data($id, $data);
		}
		$this->content = View::factory('/admin/company/detailsFile');
		$this->content->company = Model::factory('company')->get_company_details($id);
	}
	
} // End Welcome
