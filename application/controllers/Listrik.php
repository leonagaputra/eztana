<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
  created by: Leo Naga
 */
//include_once('My_Controller.php');
include_once('Main.php');

class Listrik extends Main {

    //put your code here
    var $admin_bill;

    public function __construct() {
        parent::__construct();

    }

    public function index() {
        // cek login
        $this->cek_user_login();
        $this->entry();
    }    
    
    public function entry() {
        //cek login
        $this->cek_user_login();
        //cek prev transaksi --> tidak bisa melakukan transaksi jika masih ada transaksi menggantung dalam 24 jam
        
        
        $this->data['page'] = 'page_listrik_entry.php';
        $this->load->view('page', $this->data);
    }
    
    public function confirm(){
        //cek login
        $this->cek_user_login();
        $this->admin_bill = 10000;
        
        $listrik_bill = $this->get_input('listrik_bill');
        
        //insert ke global transaksi
        
        //munculkan no transaksi
        
        if($listrik_bill){
            $this->data['listrik_bill'] = $listrik_bill;
            $this->data['admin_bill'] = $this->admin_bill;
            
            $this->data['page'] = 'page_listrik_confirm.php';
            $this->load->view('page', $this->data);
        } 
        else {
            $this->entry();
        }              
    }
    
    public function last(){
        //cek login
        $this->cek_user_login(); 
        $this->admin_bill = 10000;        
        
        $listrik_bill = $this->get_input('listrik_bill');
        $total_bill = $this->get_input('total_bill');                
        
        if($listrik_bill){
            $this->data['listrik_bill'] = $listrik_bill;
            $this->data['admin_bill'] = $this->admin_bill;
            
            $this->data['page'] = 'page_listrik_last.php';
            $this->load->view('page', $this->data);
        } 
        else {
            $this->entry();
        }              
    }
    
    public function confirm_json() {
        //cek login
        $this->cek_user_login();
        $biaya_admin = 10000;
        //get about_us data        
        $id = $this->get_input('listrik_bill');       
        
        $msg = array(
            'biaya_admin' => $biaya_admin
        );
        
        $this->set_json($msg);
    }   

}
