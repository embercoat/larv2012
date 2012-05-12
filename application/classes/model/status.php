<?php
class model_status extends Model {
    function update_to($thing, $value){
        $exist = DB::select('key')
                    ->from('status')
                    ->where('key', '=', $thing)
                    ->execute()
                    ->as_array();
        if(count($exist) > 0){
            DB::update('status')
                ->set(array('value' =>$value))
                ->where('key', '=', $thing)
                ->execute();
        } else {
            DB::insert('status', array('key', 'value'))
                ->values(array($thing, $value))
                ->execute();
        }
    }
    function update_to_now($thing){
        $this->update_to($thing, time());
    }
    function get($thing){
        $get = DB::select('*')
            ->from('status')
            ->where('key', '=', $thing)
            ->execute()
            ->as_array();
        if(count($get) > 0){
            return $get[0];
        } else {
            return false;
        }
    }
}