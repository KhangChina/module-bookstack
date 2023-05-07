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
        $staff_id = get_staff_user_id(); 
        //Step 1: Check data bookstack
        $res = $this->bookstack_models->getDataLogin($staff_id);
        if($res->email && $res->password)
        {
            $data['email'] =$res->email;
            $data['check'] = true;
            return $this->load->view('index', $data);
        }
        //Step 2: Get data portal
        $data['check'] = false;
        $email = $this->bookstack_models->getEmail($staff_id);
        $data['email'] = $email;
        return $this->load->view('index', $data);
    }
    public function save_user()
    {
        $postData = $this->input->post();
        //Get id user login
        $staff_id = get_staff_user_id();
        $email = $postData["email"];
        $password = $postData["password"];
        $this->bookstack_models->insert_login_bookstack($staff_id, $email, $password);
        $this->index();
    }
    public function connect_document()
    {
        $staff_id = get_staff_user_id();
        $res = $this->bookstack_models->getDataLogin($staff_id);
        $email = $res->email;
        $password = $res->password;
        if ($email && $password) {
            $data['username'] = $email;
            $data['password'] = $password;
            return $this->load->view('connect', $data);
        }
        $this->index(); 
    }
}
