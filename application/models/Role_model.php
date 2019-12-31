<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model extends CI_Model 
{
    public function getRoleUser()
    {
        $query = "SELECT `user`.`id`, `user`.`name`, `user`.`NIK`, `user`.`role_id`, `user_role`.`role`, `user`.`is_active` FROM `user`  
                    JOIN `user_role` ON `user`.`role_id` = `user_role`.`id`
                    AND `user`.`role_id` < 3
                 ";
        
        //  $data = $this->db->query($query)->result_array();
        // echo json_encode($data);
        // die;
        return $this->db->query($query)->result_array(); 
        //  var_dump($data);
        //  die;
    }

    public function getRole()
    {
        $query = "SELECT `user_role`.`id`, `user_role`.`role` FROM `user_role`  
                    WHERE `user_role`.`id` < 3
                 ";
        
        //  $data = $this->db->query($query)->result_array();
        // echo json_encode($data);
        // die;
        return $this->db->query($query)->result_array(); 
        //  var_dump($data);
        //  die;
    }

    public function getDataUser()
    {
        $query = "SELECT `user`.`id`, `user`.`name`, `user`.`NIK`, `user`.`role_id`, `user_role`.`role`, `user`.`is_active` FROM `user`  
                    JOIN `user_role` ON `user`.`role_id` = `user_role`.`id`
                    AND `user`.`role_id` < 3
                 ";
        
        //  $data = $this->db->query($query)->result_array();
        // echo json_encode($data);
        // die;
        return $this->db->query($query)->result_array(); 
        //  var_dump($data);
        //  die;
    }

    public function setUser()
    {
        $data = [
            'role_id' => $this->input->post('role_id', true),
            'is_active' => $this->input->post('is_active', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }
}