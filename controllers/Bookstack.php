<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Bookstack Controller
 */
class Bookstack extends AdminController
{
     /**
     * Controler __construct function to initialize options
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('bookstack_models');
    }

    //Chức năng chuyển trang
    public function index()
    { 
        //Get data from db
        
       
           return $this->load->view('index');
        
        
        //truyền data qa views

    }
    public function save_user(){
        $postData = $this->input->post();
        //Get id user login
        $staff_id = get_staff_user_id();
        $email = $postData["email"];
        $password = $postData["password"];
        $res = $this->bookstack_models->insert_login_bookstack($staff_id ,$email,$password);
        var_dump($res)
    }
    public function connect_document()
    {
        $data['username'] = "";
        $data['password'] = "";
        return $this->load->view('connect',$data);
    }

}