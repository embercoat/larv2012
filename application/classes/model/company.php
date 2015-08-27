<?php defined('SYSPATH') OR die('No Direct Script Access');

Class Model_Company extends Model
{
	function create_company($company){
		$id = DB::insert('company', array('name'))
					->values(array($company))
					->execute();
		return $id[0];
	}
	function get_company($id){
	    return DB::select('*')
	                ->from('company')
	                ->where('company_id', '=', $id)
	                ->execute()
	                ->as_array();
	}
	function get_companies(){
		return DB::select('*')
				->from('company')
				->order_by('name', 'ASC')
				->execute()
				->as_array();
	}
	function get_companies_catalogue_name($cid = false){
		$sql = DB::select('*')
				->from('company')
				->order_by('name', 'ASC')
				->join('company_data')
				->on('company.company_id', '=', 'company_data.company_id')
				->where('company_data.field', '=', 'catalogue_company_name');
		if($cid !== false)
		    $sql->where('company.company_id', '=', $cid);

		return $sql->execute()
				->as_array();
	}
	function get_company_booth($id = false, $house = false, $sort = false){
	    $sql = DB::select('*')
				->from('company')
				->join('booth')
				->on('company.company_id', '=', 'booth.company_id');
		if($id !== false)
				$sql->where('company.company_id', '=', $id);
		if($house !== false)
		        $sql->where('booth.house', '=', $house);
		if($sort !== false)
		$sql->order_by($sort, 'asc');

		return $sql->execute()->as_array();
	}
	function get_company_details($id){
		$fields = DB::select_array(array('field', 'data'))
					->from('company_data')
					->where('company_id', '=', $id)
					->execute()
					->as_array();
		$return = array();
		$return['company_id'] = $id;
		foreach($fields as $f)
			$return[$f['field']] = $f['data'];

		return $return;
	}
	function get_company_branches($id){
		$branches = DB::select_array(array('branch.branch', 'branch.branch_id'))
						->from('branch')
						->join('company_branch')
						->on('branch.branch_id', '=', 'company_branch.branch_id')
						->where('company_branch.company_id', '=', $id)
						->order_by('branch.branch', 'ASC')
						->execute()
						->as_array();
		return $branches;
	}
	function get_company_educationtypes($id){
		$educationtypes = DB::select_array(array('educationType.shortname', 'educationType.id'))
						->from('educationType')
						->join('company_educationType')
						->on('educationType.id', '=', 'company_educationType.educationtype_id')
						->where('company_educationType.company_id', '=', $id)
						->order_by('educationType.shortname', 'ASC')
						->execute()
						->as_array();
		return $educationtypes;
	}

	function get_company_programs($id){
		$programs = DB::select_array(array('program.shortname', 'program.id'))
						->from('program')
						->join('company_program')
						->on('program.id', '=', 'company_program.program_id')
						->where('company_program.company_id', '=', $id)
						->order_by('program.shortname', 'ASC')
						->execute()
						->as_array();
		return $programs;
	}
	function get_company_offers($id){
		$offers = DB::select_array(array('offer.name', 'offer.offer_id'))
						->from('offer')
						->join('company_offer')
						->on('company_offer.offer_id', '=', 'offer.offer_id')
						->where('company_offer.company_id', '=', $id)
						->order_by('offer.name', 'ASC')
						->execute()
						->as_array();
		return $offers;

	}
	function get_company_cities($id){
		$cities = DB::select_array(array('city.name', 'city.id'))
						->from('company_city')
						->join('city')
						->on('company_city.city_id', '=', 'city.id')
						->where('company_city.company_id', '=', $id)
						->order_by('city.name', 'ASC')
						->execute()
						->as_array();
		return $cities;

	}
	function get_company_countries($id){
		$cities = DB::select_array(array('country.name', 'country.id'))
						->from('company_countries')
						->join('country')
						->on('company_countries.country_id', '=', 'country.id')
						->where('company_countries.company_id', '=', $id)
						->order_by('country.name', 'ASC')
						->execute()
						->as_array();
		return $cities;

	}

	function set_programs($company_id, $programs){
		DB::delete('company_program')
			->where('company_id', '=', $company_id)
			->execute();
		$insert = DB::insert('company_program', array('company_id', 'program_id'));
		foreach($programs as $p){
			$insert->values(array($company_id, $p));
		}
		$insert->execute();
	}
	function set_educationtypes($company_id, $educationtypes){
	    DB::delete('company_educationType')
	    ->where('company_id', '=', $company_id)
	    ->execute();
	    $insert = DB::insert('company_educationType', array('company_id', 'educationType_id'));
	    foreach($educationtypes as $et){
	        $insert->values(array($company_id, $et));
	    }
	    $insert->execute();
	}

	function set_offers($company_id, $offers){
		DB::delete('company_offer')
			->where('company_id', '=', $company_id)
			->execute();
		$insert = DB::insert('company_offer', array('company_id', 'offer_id'));
		foreach($offers as $o){
			$insert->values(array($company_id, $o));
		}
		$insert->execute();
	}
	function set_branches($company_id, $branches){
		DB::delete('company_branch')
			->where('company_id', '=', $company_id)
			->execute();
		$insert = DB::insert('company_branch', array('company_id', 'branch_id'));
		foreach($branches as $b){
			$insert->values(array($company_id, $b));
		}
		$insert->execute();
	}
	function set_data($company_id, $data){
		$del = DB::delete('company_data')
			->where('company_id', '=', $company_id)
			->and_where('field', 'in', DB::expr('('.implode(',', array_map(array(Model::factory('data'), 'quote'), array_keys($data))).')'))
			->execute();
		$insert = DB::insert('company_data', array('company_id', 'field', 'data'));
		foreach($data as $field => $d){
			$insert->values(array($company_id, $field, $d));
		}
		$insert->execute();
	}

	function create_branch($branch){
		$exists = DB::select('branch_id')
					->from('branch')
					->where('branch', '=', $branch)
					->execute()
					->as_array();
		if(count($exists) == 0){
			$insert = DB::insert('branch', array('branch'))
						->values(array($branch))
						->execute();
			return $insert[0];
		} else {
			return $exists[0]['branch_id'];
		}
	}
	function create_offer($offer){
		$exists = DB::select('offer_id')
					->from('offer')
					->where('name', '=', $offer)
					->execute()
					->as_array();
		if(count($exists) == 0){
			$insert = DB::insert('offer', array('name'))
						->values(array($offer))
						->execute();
			return $insert[0];
		} else {
			return $exists[0]['offer_id'];
		}
	}
	function create_field($field){
		$exists = DB::select('field_id')
					->from('company_fields')
					->where('field_name', '=', $field)
					->execute()
					->as_array();
		if(count($exists) == 0){
			$insert = DB::insert('company_fields', array('field_name'))
						->values(array($field))
						->execute();
			return $insert[0];
		} else {
			return $exists[0]['field_id'];
		}
	}
}