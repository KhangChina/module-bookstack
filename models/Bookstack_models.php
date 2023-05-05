<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Bookstack_models extends App_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        return "Hello Word By Models";
    }
    public function insert_login_bookstack($staff_id,$email,$password)
    {
        $data = [
            'email'   => $email,
            'password'    => $password,
            'staff_id' => $staff_id,
        ];

        $check = $this->db->where('staff_id', $staff_id);
        if($check)
        {
           return $this->db->update('bookstack', $data, array('staff_id' => $staff_id));
        }
       return $this->db->insert('bookstack', $data);
    }
}
