<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Company extends Controller_Admin_SuperController {

    public function after(){
        $this->js[] = '/js/all_scripts.js';
        $this->js[] = '/js/admin/company.js';
        $this->content .= View::factory('progress');
        parent::after();
    }

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
		$sql = DB::select_array(array(array('user.user_id', 'userid'), 'user.fname', 'user.lname'))
				->from('user')
				->order_by('user.lname', 'ASC')
				->order_by('user.fname', 'ASC');

		$hosts = $sql->execute()->as_array();
		$this->content->hosts = array();
		foreach($hosts as $h){
			$this->content->hosts[$h['userid']] = (empty($h['lname']) ? $h['fname'] : $h['fname'] .' '. $h['lname']);
		}
	}

	public function action_detailsEvent($id, $edit = false){
		if(!$edit)
			$this->content = View::factory('/admin/company/detailsEvent');
		else
			$this->content = View::factory('/admin/company/editDetailsEvent');

		$this->content->company = Model::factory('company')->get_company_details($id);
	}

	public function action_detailsInterview($id, $edit = false){
	    if(isset($_POST) && !empty($_POST)){
			unset($_POST['submit']);
			$_POST['interview_offer'] = (isset($_POST['interview_offer']) ? $_POST['interview_offer'] : 'Nej, no');
			$_POST['interview_contact_same'] = (isset($_POST['interview_contact_same']) ? $_POST['interview_contact_same'] : 'Nej, no');
			Model::factory('company')->set_data($id, $_POST);
		}
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
			$_POST['catalogue_company_eng_head'] = (isset($_POST['catalogue_company_eng_head']) ? $_POST['catalogue_company_eng_head'] : 0);
			$_POST['catalogue_contact_same'] = (isset($_POST['catalogue_contact_same']) ? $_POST['catalogue_contact_same'] : 'Nej, no');
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
	public function action_cities($id){
	    if(isset($_POST) && !empty($_POST)){
	        DB::delete('company_city')->where('company_id', '=', $id)->execute();
	        $insert = DB::insert('company_city', array('company_id', 'city_id'));
	        foreach($_POST['city'] as $city){
	            $insert->values(array($id, $city));
	        }
	        $insert->execute();
	    }
	    $this->content = View::factory('/admin/company/cities');
	    $this->content->company_cities = Model::factory('company')->get_company_cities($id);
	    $this->content->cities = Model::factory('data')->get_city();
	    $this->content->company = Model::factory('company')->get_company_details($id);
	}
	public function action_countries($id){
	    if(isset($_POST) && !empty($_POST)){
	        DB::delete('company_countries')->where('company_id', '=', $id)->execute();
	        if(!empty($_POST['country'])){
    	        $insert = DB::insert('company_countries', array('company_id', 'country_id'));
    	        foreach($_POST['country'] as $city){
    	            $insert->values(array($id, $city));
    	        }
    	        $insert->execute();
	        }
	    }
	    $this->content = View::factory('/admin/company/countries');
	    $this->content->company_countries = Model::factory('company')->get_company_countries($id);
	    $this->content->countries = Model::factory('data')->get_country();
	    $this->content->company = Model::factory('company')->get_company_details($id);
	}
	public function action_branches($id){
	    if(isset($_POST) && !empty($_POST)){
	        DB::delete('company_branch')->where('company_id', '=', $id)->execute();
	        if(!empty($_POST['branch'])){
    	        $insert = DB::insert('company_branch', array('company_id', 'branch_id'));
    	        foreach($_POST['branch'] as $branch){
    	            $insert->values(array($id, $branch));
    	        }
    	        $insert->execute();
	        }
	    }
	    $this->content = View::factory('/admin/company/branches');
	    $this->content->company_branches = Model::factory('company')->get_company_branches($id);
	    $this->content->branches = Model::factory('data')->get_branch();
	    $this->content->company = Model::factory('company')->get_company_details($id);
	}
	public function action_educationtypes($id){
	    if(isset($_POST) && !empty($_POST)){
	        DB::delete('company_educationType')->where('company_id', '=', $id)->execute();
	        if(!empty($_POST['educationtype'])){
    	        $insert = DB::insert('company_educationType', array('company_id', 'educationtype_id'));
    	        foreach($_POST['educationtype'] as $et){
    	            $insert->values(array($id, $et));
    	        }
    	        $insert->execute();
	        }
	    }
	    $this->content = View::factory('/admin/company/educationTypes');
	    $this->content->company_educationtypes = Model::factory('company')->get_company_educationtypes($id);
	    $this->content->educationtypes = Model::factory('data')->get_educationtype();
	    $this->content->company = Model::factory('company')->get_company_details($id);
	}
	public function action_offers($id){
	    if(isset($_POST) && !empty($_POST)){
	        DB::delete('company_offer')->where('company_id', '=', $id)->execute();
	        if(!empty($_POST['offer'])){
    	        $insert = DB::insert('company_offer', array('company_id', 'offer_id'));
    	        foreach($_POST['offer'] as $et){
    	            $insert->values(array($id, $et));
    	        }
    	        $insert->execute();
	        }
	    }
	    $this->content = View::factory('/admin/company/offer');
	    $this->content->company_offers = Model::factory('company')->get_company_offers($id);
	    $this->content->offers = Model::factory('data')->get_offer();
	    $this->content->company = Model::factory('company')->get_company_details($id);
	}
	public function action_programs($id){
	    if(isset($_POST) && !empty($_POST)){
	        DB::delete('company_program')->where('company_id', '=', $id)->execute();
	        if(!empty($_POST['program'])){
    	        $insert = DB::insert('company_program', array('company_id', 'program_id'));
    	        foreach($_POST['program'] as $et){
    	            $insert->values(array($id, $et));
    	        }
    	        $insert->execute();
	        }
	    }
	    $this->content = View::factory('/admin/company/programs');
	    $this->content->company_programs = Model::factory('company')->get_company_programs($id);
	    $this->content->programs = Model::factory('data')->format_for_select(Model::factory('data')->get_program());
	    $this->content->company = Model::factory('company')->get_company_details($id);
	}
	public function action_boothMaps(){
	    Model::factory('booth')->render_boothmaps();
	    $this->content = View::factory('admin/company/boothmaps');
	}
} // End Welcome
