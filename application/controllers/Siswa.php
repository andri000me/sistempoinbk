<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller{
  function __construct(){
    parent::__construct();
  }
  function index(){
    if(!$this->session->userdata('loggedIN') || $this->session->userdata('role') != "siswa"){
      redirect("user");
    }
    else {
      $data['nama'] = $this->session->userdata("nama");
      if($this->session->userdata("role") == "siswa"){
        $data['role'] = "Siswa SMAN 13 Jakarta";
      }
      else {
        redirect("user");
      }
      $this->load->model('getData');
      $data['data'] = $this->getData->getInfoSiswa($this->session->userdata('ni'));
      $no_induk = $this->session->userdata('ni');
      $dat = $this->getData->checkName($no_induk);
      $data['point'] = 0;
      foreach ($dat as $key) {
        $data['nama_siswa'] = $key->nama;
      }
      $point = $this->getData->getPoin($no_induk);
      if($point != ""){
        $data['list_point'] = $this->getData->getPoints($no_induk);
        if($data['list_point'] == ""){
          echo $data['list_point'];
        }

        foreach ($point as $key) {
          $nilai = $this->getData->getNilaiPoint($key->no_tb);
          foreach ($nilai as $k) {
            $data['point'] = $data['point']+$k->point;
          }
        }
      }
      else {
        $data['list_point'] = "";
        $data['point'] = 0;
      }
      $this->load->view('sidebarsiswa.php', $data);
      $this->load->view('userPage/index.php', $data);
    }
  }

  function TataTertib(){
    $data['nama'] = $this->session->userdata("nama");
    if($this->session->userdata("role") == "siswa"){
      $data['role'] = "Siswa SMAN 13 Jakarta";
    }
    else {
      redirect("user");
    }
    $this->load->model('getData');
    $data['kerapihan'] = $this->getData->getDataTB('Kerapihan');
    $data['kerajinan'] = $this->getData->getDataTB('Kerajinan');
    $data['kelakuan'] = $this->getData->getDataTB('Kelakuan');
    $data['akademik'] = $this->getData->getDataTB('Prestasi Akademik');
    $data['non_akademik'] = $this->getData->getDataTB('Prestasi Non-Akademik');
    $this->load->view('sidebarsiswa.php', $data);
    $this->load->view('userPage/tatatertib.php', $data);
  }

  function hukuman(){
    $data['nama'] = $this->session->userdata("nama");
    if($this->session->userdata("role") == "siswa"){
      $data['role'] = "Siswa SMAN 13 Jakarta";
    }
    else {
      redirect("user");
    }
    $this->load->model('getData');
    $data['hukuman'] = $this->getData->getHukuman();
    $this->load->view('sidebarsiswa.php', $data);
    $this->load->view('userPage/hukuman.php', $data);
  }

  function changePassword(){
    $data['nama'] = $this->session->userdata("nama");
    if($this->session->userdata("role") == "siswa"){
      $data['role'] = "Siswa SMAN 13 Jakarta";
    }
    else {
      redirect("user");
    }
    $this->load->view('sidebarsiswa.php',$data);
    $this->load->view('userPage/changepassword.php',$data);
  }

  function dochangepassword(){
    $pass = md5($this->input->post('oldpass'));
    $ni = $this->session->userdata('ni');
    $this->load->model('login');
    $cek = $this->login->checkLogin($ni,$pass);
    if($cek != 0) {
      $newpass = md5($this->input->post('newpass'));
      $this->login->changepassword($ni,$newpass);
      redirect('user');
    }
    else {
      redirect('siswa/changepassword');
    }
  }
}
?>
