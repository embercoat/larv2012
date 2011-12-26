<?php defined('SYSPATH') OR die('No Direct Script Access');

Class Model_Data extends Model
{
	function quote($data){
		return "'".$data."'";
	}
	function get_program($id = false){
		$sql = DB::select_array(array('id', 'name'))
				->from('program')
				->order_by('name', 'ASC');
		if($id !== false){
			$sql->where('id', '=', $id);
		}
		return $sql->execute()->as_array();
	}
	function format_for_select($input){
		$return = array();
		$keys = array_keys($input[0]);
		foreach($input as $i){
			$return[$i[$keys[0]]] = $i[$keys[1]];
		}
		return $return;
	}
	function get_city($id = false){
	    $cities = DB::select('*')
	                ->from('city')
	                ->order_by('name');
	    if($id !== false)
	            $cities->where('id', '=', $id);
	    $cities = $cities
	                ->execute()
	                ->as_array();
	    $return = array();
	    foreach($cities as $c){
	        $return[$c['id']] = $c['name'];
	    }
	    return $return;
	}
	function get_country($id = false){
	    $countries = DB::select('*')
	                ->from('country')
	                ->order_by('name');
	    if($id !== false)
	            $countries->where('id', '=', $id);
	    $countries = $countries
	                ->execute()
	                ->as_array();
	    $return = array();
	    foreach($countries as $c){
	        $return[$c['id']] = $c['name'];
	    }
	    return $return;
	}
	function get_branch($id = false){
	    $branch = DB::select('*')
	                ->from('branch')
	                ->order_by('branch');
	    if($id !== false)
	            $branch->where('id', '=', $id);
	    $branch = $branch
	                ->execute()
	                ->as_array();
	    $return = array();
	    foreach($branch as $c){
	        $return[$c['branch_id']] = $c['branch'];
	    }
	    return $return;
	}
	function get_educationtype($id = false){
	    $branch = DB::select('*')
	                ->from('educationType')
	                ->order_by('name');
	    if($id !== false)
	            $branch->where('id', '=', $id);
	    $branch = $branch
	                ->execute()
	                ->as_array();
	    $return = array();
	    foreach($branch as $c){
	        $return[$c['id']] = $c['name'];
	    }
	    return $return;
	}
	function get_offer($id = false){
	    $offer = DB::select('*')
	                ->from('offer')
	                ->order_by('name');
	    if($id !== false)
	            $offer->where('offer_id', '=', $id);
	    $offer = $offer
	                ->execute()
	                ->as_array();
	    $return = array();
	    foreach($offer as $o){
	        $return[$o['offer_id']] = $o['name'];
	    }
	    return $return;
	}
	function get_random_profilepicture(){
		$rand = scandir('upload/random_profiles');
		$clean = array();
		foreach($rand as $r)
			if($r[0] !== '.')
				$clean[] = $r;
		
		return $clean[rand(0, count($clean)-1)];
	}
}