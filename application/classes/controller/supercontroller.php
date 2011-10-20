<?php
/**
 * 
 * @author draco
 * This is the supercontroller that all the other controllers inherit from.
 * Contains the things that are common for all the controllers
 *
 */
class Controller_SuperController extends Kohana_Controller {
    protected $mainView;
    protected $db;
    protected $user;
    protected $content;
    private $starttime;
    private $stats = array();
    protected $css = array();
	protected $js = array();
	/**
	 * This function is run before the controller. 
	 * Useful for preparing the environment
	 * 
	 */
    public function before(){
        $this->session = Session::instance();
    	if($this->session->get('user') === NULL){
    		$this->session->set('user', user::instance());
    	}
        Session::instance();
    }
    /**
     * Runs after everything else.
     * Used here to render the menu and then send the collected response to the client
     */
    public function after(){
    	$this->mainView = View::factory('main');
        $this->mainView->content = $this->content;

        $this->mainView->css = $this->css;
        $this->mainView->js = $this->js;
        
        $this->response->body($this->mainView);
    }

}

?>