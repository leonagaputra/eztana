<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
  created by: Leo Naga
 */
include_once('My_Controller.php');

class Main extends My_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
//        $this->load->model('pages_model', 'pm');
//        $this->load->model('user_model', 'um');
        $this->load->helper('url');
        $this->load->library('session');
        $this->data['title_maxlength'] = 100;
    }

    public function index() {
        // cek login

        $this->cek_user_login();

        $this->homepage();
    }

    public function login() {
        $this->load->view('login', $this->data);
    }

    public function do_login() {
        $data = array();
        $data['VUSERNAME'] = $this->security($this->input->post('username', TRUE));
        $data['VPASSWORD'] = $this->security($this->input->post('password', TRUE));

        if ($result = $this->um->login($data)) {
            $this->data['username'] = strtoupper($data['VUSERNAME']);
            //echo "here";exit;
            //print_r((array)$result);exit;
            $this->session->set_userdata((array) $result);
            //header('location:'.$this->data['base_url'] .'index.php/backend/about_us');
            //redirect($this->data['base_url'] .'index.php/backend/about_us', 'refresh');
        }
        $this->index();
    }

    public function homepage() {
        //cek login
        $this->cek_user_login();
        //get about_us data
        $this->data['page'] = 'homepage.php';
        $this->load->view('page', $this->data);
    }
    
    public function listrik_entry() {
        //cek login
        $this->cek_user_login();
        //get about_us data
        $this->data['page'] = 'page_listrik_entry.php';
        $this->load->view('page', $this->data);
    }

    public function cek_user_login() {
        /*
          if(!$this->session->userdata('VUSERNAME')){
          header('location:'.$this->data['base_url']."index.php/backend/login");
          }
          $this->data['username'] = strtoupper($this->session->userdata('VUSERNAME'));
         */
    }

    public function logout() {
        $this->session->sess_destroy();
        header('location:' . $this->data['base_url'] . 'index.php/backend/login');
    }

}
