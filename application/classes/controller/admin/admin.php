<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Admin extends Controller_Admin_SuperController {

    /*
     * CREATE  TABLE `larv2012`.`status` (
      `sid` INT NOT NULL AUTO_INCREMENT ,
      `key` VARCHAR(45) NULL ,
      `value` VARCHAR(100) NULL ,
      `description` TEXT NULL ,
      PRIMARY KEY (`sid`) );
     */
	public function action_index()
	{
	    $status = View::factory('/admin/status');
        $messages = array();
        $file = Model::factory('file');
        $this->css[] = '/css/admin/sysstat.css';
        $folders = array(
                    '/'       => 550,
                    '/pdf'    => 150,
                    '/upload' => 200,
                    '/images' => 200
               );
        foreach($folders as $folder => $limit){
            if($file->dirsize(DOCROOT.$folder)/1024/1024 > $limit){
                $messages['error'][] = 'Folder '.$folder.' has grown above its limit('.$limit.' mb)';
            } else {
                $messages['green'][] = 'Folder '.$folder.' is within limits ('.$limit.' mb)';
            }
        }
        $nonempty = array(
                '/pdf/katalog',
                '/images/booth'
                );
        foreach($nonempty as $folder){
            if(count($file->get_files(DOCROOT.$folder)) > 0){
                $messages['green'][] = 'Folder '.$folder.' has contents. All good ('.count($file->get_files(DOCROOT.$folder)).' files)';
            } else {
                $messages['error'][] = 'Folder '.$folder.' is empty. It shouldn\'t be. Take action now';
            }
        }
        $statuses = array(
                'lastboothimport' => 7,
                'lastimport'      => 7,
                'lastpregen'      => 14
                );
        $statusModel = Model::factory('status');
        foreach($statuses as $s => $limit){
            $data = $statusModel->get($s);
            if($data['value'] < ($limit *86400)){
                $messages['error'][] = (!empty($data['name']) ? $data['name'] : $data['key']).' has a not been run for a while ('.$limit.' days limit)';
            } else {
                $messages['green'][] = (!empty($data['name']) ? $data['name'] : $data['key']).'. No problems ('.$limit.' days limit)';
            }
        }
        $status->messages = $messages;

		$this->content = View::factory('/admin/welcome').$status;
	}

} // End Welcome
