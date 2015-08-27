<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Email extends Controller_Admin_SuperController {

	public function action_index()
	{
		$this->content = "email";
    }
    public function action_psStudent($send = false){
        $students = DB::select_array(array(
        					'interview_interest.*',
                            'user.fname',
                            'user.lname',
                            'user.email',
        					array('room.name', 'roomname'), 
                            'period.start', 
                            'period.end', 
                            array('company.name', 'companyname'),
                            'user.user_id'
                        ))
                        ->from('interview_interest')
                        ->join('company')
                        ->on('interview_interest.company', '=', 'company.company_id')
                        ->join('room')
                        ->on('interview_interest.room', '=', 'room.room_id')
                        ->join('period')
                        ->on('interview_interest.period', '=', 'period.period_id')
                        ->join('user')
                        ->on('interview_interest.user', '=', 'user.user_id')
                        ->order_by('period.start', 'asc')
                        ->execute()
                        ->as_array();
        $mailingList = array();
        foreach($students as $s){
            $mailingList[$s['user_id']][] = $s;
        }
        $mails = array();
        $mailTemplate = View::factory('admin/ps/mailTemplate');
        foreach($mailingList as $ml){
            $mailTemplate->list = $ml;
            $mails[$ml[0]['email']] = (string)$mailTemplate; 
        }
        $this->content = View::factory('admin/ps/mailPreview');
        $this->content->mails = $mails;
        $headers = 'Content-type: text/plain; charset=utf-8' . "\r\n";
        $headers .= 'From: Reception <reception@larv.org>' . "\r\n";
    	$subject = 'Personliga Samtal';
        if($send){
            foreach($mails as $adress => $m){
                mail($adress, $subject, $m, $headers);
            }
            $_SESSION['message']['success'][] = 'Skickat och klart.';
            echo "sending";
        } else {
            echo "not sending";
        }
        
    }
} // End Welcome
