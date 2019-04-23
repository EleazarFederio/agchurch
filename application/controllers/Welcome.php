<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		$this->load->view('templates/header');
        $this->load->view('pages/home');
        $this->load->view('templates/footer');
	}

	public function login(){
        $this->load->view('templates/login_header');
        $this->load->view('auth/login');
        $this->load->view('templates/footer');
    }

    public function loginAuthentication(){
	    //echo $this->input->post('username');
	    $this->load->library('form_validation');
	    $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()){
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            echo $username .' '. $password.'<br>';
            $this->load->model('Auth_Model');

            if($this->Auth_Model->checkAuth($username, $password)){
                $session_data = array(
                  'username' => $username,
                );
                $this->session->set_userdata($session_data);
                redirect(base_url());
            }else{
                $this->session->set_flashdata('error', 'Invalid Username or Password!');
                redirect(base_url().'login');
            }
        }else{
            redirect(base_url().'login');
        }
    }

    public function canEnter(){
	    if ($this->session->userdata('username') != ''){
            redirect(base_url().'welcome/index');
        }else{
	        redirect(base_url().'login');
        }
    }
}
