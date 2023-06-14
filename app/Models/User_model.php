<?php

namespace App\Models;

use CodeIgniter\Model;
class User_model extends Model {

    var $table = 'users';

    public function __construct() {
        parent::__construct();
        $db = \Config\Database::connect();
        $builder = $db->table('users');
    }

    //Get all users from db
    public function get_all_user() {
        $query = $this->db->query('select * from users');
        return $query->getResult();
    }

    //Get users based on user id from db
    public function get_by_id($id) {
      $sql = 'select * from users where user_id ='.$id ;
      $query =  $this->db->query($sql);
      return $query->getRow();
    }

    //Add Users 
    public function user_add($data) {
        $query = $this->db->table($this->table)->insert($data);
        return $this->db->insertID();
    }

    //Update Users
    public function user_update($where, $data) {
        $this->db->table($this->table)->update($data, $where);
        return $this->db->affectedRows();
    }

    //Delete Users
    public function delete_by_id($id) {
        $this->db->table($this->table)->delete(array('user_id' => $id)); 
    }

}