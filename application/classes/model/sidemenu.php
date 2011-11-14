<?php defined('SYSPATH') OR die('No Direct Script Access');

Class Model_Sidemenu extends Model
{
	public function get_sidemenu($controller = false){
		$query = DB::select_array(array('sidemenu.*'))
			->from('sidemenu');
		
		if ($controller) $query->where('controller','=',$controller);
		
		$query->order_by('id', 'asc');
			
		return $query->execute()
			->as_array();
	}
	
	public function delete($id)
	{
		DB::delete('sidemenu')
			->where('id', '=', $id)
			->execute();
	}
	
}