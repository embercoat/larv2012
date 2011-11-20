<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Feed extends Kohana_Controller {
	
	public function action_index($arg1 = false, $arg2 = false) {
		$this->request->headers('Content-Type', 'application/rss+xml');
		$this->response->body(View::factory('feed'));
	}

}
