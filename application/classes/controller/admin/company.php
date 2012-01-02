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
//		echo $sql;
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
	    $houses = array(
    			'b' => array(
                    'base' => 'booth/karta-b',
	                'house_id' => 1,
	                'scale' => 0.094,
	                'base_offset' => array('x' => -5, 'y' => 33),
	                'out' => 'b_huset.jpg'
                ),
    			'c' => array(
                    'base' => 'booth/karta-c',
	                'house_id' => 2,
	                'scale' => 0.0952,
	                'base_offset' => array('x' => 61, 'y' => -27),
	                'out' => 'c_huset.jpg'                
                )
            );
        foreach($houses as $h){
    	    $filename = Kohana::find_file('../images', $h['base'], 'jpg');
    	    $base = imagecreatefromjpeg($filename);
    	    $booths = DB::select_array(array('booth.*'))
    	                ->from('booth')
    	                ->where('house', '=', $h['house_id'])
    	                ->execute()
    	                ->as_array();
    
    	    $scale = $h['scale']; //10px/100cm
    	    $base_offset = $h['base_offset'];
    	    $black = imagecolorallocate($base, 0,0,0);
    	    $grey = imagecolorallocate($base, 178,9,51);
    	    $white = imagecolorallocate($base, 255,255,255);
    	    $rotated = imagerotate($base, 90, $white);
    	    foreach($booths as $b){
    	        $mon_depth = (($b['depth'])*$scale)-2;
    	        $mon_width = (($b['width'])*$scale)-2;
    	        
    	        $offset_y = -round($b['y']*$scale)+$base_offset['y'];
    	        $offset_x = round($b['x']*$scale)+$base_offset['x'];
    	        
    	        if($b['rotation'] == 90){
    	            $x2 = $offset_x + $mon_depth;
    	            $y2 = $offset_y + $mon_width;
    	            imagefilledrectangle($rotated, $offset_x, $offset_y, $x2, $y2, $grey);
    	            imagettftext($rotated, 10, 90, $offset_x+14, $offset_y+25, $white, APPPATH.'../images/booth/Arial_Bold.ttf', $b['place']);
    	        } else {
    	            $x2 = $offset_x + $mon_width;
    	            $y2 = $offset_y + $mon_depth;
    	            imagefilledrectangle($rotated, $offset_x, $offset_y, $x2, $y2, $grey);
    	            imagettftext($rotated, 10, 0, $offset_x+2, $offset_y+14, $white, APPPATH.'../images/booth/Arial_Bold.ttf', $b['place']);
    	        }
    	        
    	    }
    	    $output = APPPATH.'../images/booth/'.$h['out'];
    	    imagejpeg(imagerotate($rotated, -90, $white), $output, 100);
        }
	    
	    
	    
	    $this->content = View::factory('admin/company/boothmaps');
	    
	    
	}
} // End Welcome
