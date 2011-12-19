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
}