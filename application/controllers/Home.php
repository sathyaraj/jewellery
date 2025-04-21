<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()                                                         
    {
  	 parent::__construct();
        $this->load->database();
        $this->load->model(array('admin_model','user_model'));
		$this->load->library('session');
    }

	public function index()
	{
		 if ($this->session->userdata('logged_in')) {
			 redirect(base_url('Product/index'));
         }else
		 {
			$where2['where'] = array('status ='=>'A');
     	$data["product_details"]=$this->user_model->getvalues("product","*",$where2);
	   $this->load->view('user_dash_view',$data);
		 }
	}

	 public function admin_login(){
 		if ($this->session->userdata('logged_in')) {
			 redirect(base_url('admin'));
         }else
		 {
		$this->load->view('user_login_view');
		 }
    }

	    public function admin_login_check(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');

		if($this->form_validation->run()==true){

			$username=$this->input->post('username');
			$password=$this->input->post('password');

			$result=$this->admin_model->admin_login_check($username,$password);
		 if($result == 'success')
        {
            $note = 'You have successfully';
        }
		 else 
        {
            $note = 'Error! Login Failed: RCO is incorrect';
        }
		
        header("Content-type: application/json");
        $response = array('response'=>$result,'note' => $note);  
        echo json_encode($response);
        exit();


				}
	else{
		redirect(base_url());
		}
	}

public function logout(){
		$this->load->library('session');
		session_destroy();
		$this->session->unset_userdata('username');  
		$this->session->unset_userdata('password');  
       redirect(base_url('home'));
	}

	 public function user_login(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');

		if($this->form_validation->run()==true){

			$result=$this->user_model->user_login();

			if($result == 'success'){
            $note = 'Your action has been completed';
             $next = true;
           }
        else{
            $note = 'Your action can not be completed';
            $next = true;
        }
        header("Content-type: application/json");
       $response = array('response'=>$result,'note'=> $note);  
        if($next)
       {
          echo json_encode($response);
       }
       exit(); 
	}
	}

	public function logoutuser(){
		$this->load->library('session');
		session_destroy();
		$this->session->unset_userdata('usernme');  
		$this->session->unset_userdata('passwrd');  
       redirect(base_url('home'));
	}


}
