<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model{
  function __construct(){
    parent::__construct();
  }
  function checkLogin($ni, $pass){
    $query = $this->db->query("SELECT * FROM user WHERE no_induk='$ni' and pass='$pass'");
    return $query->num_rows();
  }
  function doLogin($ni, $pass){
    $query = $this->db->query("SELECT * FROM user WHERE no_induk='$ni' and pass='$pass'");
    return $query->result();
  }
  function changepassword($ni, $pass){
    $query = $this->db->query("UPDATE user SET pass='$pass' where no_induk='$ni'");
  }
}
?>
