<?php defined('SYSPATH') OR die('No Direct Script Access');

Class Model_Company extends Model
{
	function create_company($company){
		$id = DB::insert('company', array('name'))
					->values(array($company))
					->execute();
		return $id[0];
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
		DB::delete('company_data')
			->where('company_id', '=', $company_id)
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