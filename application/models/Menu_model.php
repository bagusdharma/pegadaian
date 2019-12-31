<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model 
{
    public function getSubMenu()
    {

        $query = "SELECT `user_menu`.`menu`, `user_sub_menu`.`title_menu`, `user_sub_menu`.`url`, `user_sub_menu`.`icon`, `user_sub_menu`.`is_active` FROM `user_sub_menu` JOIN`user_menu` 
        ON `user_sub_menu`.`menu_id` = `user_menu`.`id` 
         ";

        return $this->db->query($query)->result_array();
    }
}
