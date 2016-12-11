<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
    function __construct(){
        parent::__construct();
    }

    /* Waktu baru buka, diarahin ke sini, nah disini fungsinya buat ngarahin
    buat login, atau gak buat arahin ke halaman bk atau siswa, gitu bro. */
    function index(){
        if(!$this->session->userdata('loggedIN'))
            redirect('user/login');
          else {
            if($this->session->userdata('role') == "bk")
              redirect('bk');
            else
              redirect('siswa');
          }
    }

    /* Nah kalo yang ini buat nampilih halaman Login bro */
    function login(){
      if($this->session->userdata('loggedIN'))
          redirect('user');
        else
        $this->load->view('userEnter/login.php');
    }

    /* Kalo yang ini, ini fungsinya buat di halaman login itu kita ada pengecekkan
    pake ajax, disitu ngirim data untuk dicek apa ada, nah ini yang ngatur */
    function loginCheck(){
        $ni = $this->input->post('ni');
        $pass = $this->input->post('pass');
        $pass = md5($pass);
        $this->load->model("login");
        $cek = $this->login->checkLogin($ni,$pass);
        if($cek != 0) echo "true";
        else echo "false";
    }

    /* Nah kalo yang ini, abis ngelakuin pengecekkan, ya ini fungsinya buat bikin
    sessionnya bro */
    function doLogin(){
      $ni = $this->input->post('ni');
      $pass = $this->input->post('pass');
      $pass = md5($pass);
      $this->load->model("login");
      $cek = $this->login->doLogin($ni,$pass);
      foreach ($cek as $key) {
        $ni = $key->no_induk;
        $role = $key->role;
        $nama = $key->nama;
      }
      $sess = array(
        "loggedIN" => true,
        "ni" => $ni,
        "role" => $role,
        "nama" => $nama
      );
      $this->session->set_userdata($sess);
      redirect('user');
    }

    function logout(){
      if(!$this->session->userdata('loggedIN')){
        redirect('user');
      }
      else {
        $this->session->unset_userdata('loggedIN');
        $this->session->unset_userdata('ni');
        $this->session->unset_userdata('role');
        redirect('user');
      }
    }

}

?>
