<?php
/**
 * 
 * @author draco
 * This is the supercontroller that all the other controllers inherit from.
 * Contains the things that are common for all the controllers
 *
 */
class Controller_Katalog_SuperController extends Kohana_Controller {
    protected $mainView;
    protected $db;
    protected $user;
    protected $content;
    private $starttime;
    private $stats = array();
    protected $css = array();
	protected $js = array();
	protected $session;
	/**
	 * This function is run before the controller. 
	 * Useful for preparing the environment
	 * 
	 */
    public function before(){
        Model::Factory('counter')->record();
    	$this->session = Session::instance();
    	if($this->session->get('user') === NULL){
    		$this->session->set('user', user::instance());
    	}
//        if(!$this->session->get('user')->isAdmin() && $this->request->controller() != 'login') {
//    		$this->request->redirect('/login/redirect/'.str_replace('/', '_', $this->request->uri()));
//    	}
    }
    /**
     * Runs after everything else.
     * Used here to render the menu and then send the collected response to the client
     */
    public function after(){
        $this->mainView = View::factory('katalog/main');
    	$this->mainView->content = $this->content;
		
        $this->mainView->css = $this->css;
        $this->mainView->js = $this->js;
        
        $this->response->body($this->mainView);
    }

}

?>