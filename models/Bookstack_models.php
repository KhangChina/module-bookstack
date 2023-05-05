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
        $this->db->select('staff_id');
        $this->db->where('staff_id',$staff_id);
        $tracking = $this->db->get(db_prefix().'bookstack')->row();
        if($tracking)
        {
            return $this->db->update('bookstack', $data,array('staff_id' => $staff_id));
        }
        return $this->db->insert('bookstack', $data);
    }
    public function getEmail($staff_id)
    {
        $this->db->select('email');
        $this->db->where('staffid', $staff_id);
        $tracking = $this->db->get(db_prefix().'staff')->row();
        return $tracking->email;
    }

    public function getDataLogin($staff_id)
    {
        $this->db->select('email','password');
        $this->db->where('staff_id', $staff_id);
        $tracking = $this->db->get(db_prefix().'bookstack')->row();
        return $tracking;
    }
    
}
