<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class getData extends CI_Model{
  function __construct(){
    parent::__construct();
  }
  function getDataTB($ket){
    $query = $this->db->query("SELECT * FROM tatatertib where keterangan = '$ket'");
    if($query->num_rows() != 0){
      return $query->result();
    }
  }
  function getHukuman(){
    $query = $this->db->query("SELECT * FROM hukuman");
    return $query->result();
  }
  function getSiswa($kelas) {
    $query=$this->db->query("SELECT * FROM user WHERE kelas LIKE '$kelas%' ORDER BY kelas, nama ASC");
    return $query->result();
  }
  function getSiswaPoint(){
    $query=$this->db->query("select user.nama, user.no_induk, user.kelas ,sum(point) as sum from tatatertib join point on point.no_tb = tatatertib.no_tb join user on user.no_induk = point.no_induk group by point.no_induk having sum > 0 order by sum desc");
    if($query->num_rows() > 0)
      return $query->result();
    else
      return "";
  }
  function getAksi($val){
    $query=$this->db->query("SELECT user.nama, user.no_induk, user.kelas, hukuman.hukuman, aksi.aksi, aksi.no_aksi FROM aksi join user on user.no_induk=aksi.no_induk join hukuman on hukuman.no_hukuman=aksi.no_hukuman where aksi='$val' order by date desc");
    if($query->num_rows() > 0)
      return $query->result();
    else
      return "";
  }
  function doAksi($val){
    $query=$this->db->query("UPDATE aksi SET aksi='sudah' WHERE no_aksi='$val'");
  }

  function checkName($val){
    $query = $this->db->query("SELECT * FROM user WHERE nama LIKE '%$val%' OR no_induk LIKE '%$val%' AND role='siswa' ORDER by nama ASC LIMIT 10");
    return $query->result();
  }
  function checkPelanggaran($val){
    $query = $this->db->query("SELECT * FROM tatatertib WHERE nama LIKE '%$val%' AND keterangan<>'Prestasi Akademik' AND keterangan<>'Prestasi Non-Akademik' ORDER by nama ASC LIMIT 10");
    return $query->result();
  }
  function checkPenghargaan($val){
    $query = $this->db->query("SELECT * FROM tatatertib WHERE nama LIKE '%$val%' AND (keterangan='Prestasi Akademik' OR keterangan='Prestasi Non-Akademik') ORDER by nama ASC LIMIT 10");
    return $query->result();
  }
  function checkLogin($ni, $pass){
    $query = $this->db->query("SELECT * FROM user WHERE no_induk='$ni' and pass='$pass'");
    return $query->num_rows();
  }
  function doLogin($ni, $pass){
    $query = $this->db->query("SELECT * FROM user WHERE no_induk='$ni' and pass='$pass'");
    return $query->result();
  }

  function insertPoint($no_induk, $no_tb){
    date_default_timezone_set('Asia/Jakara');
    $date = date("Y-m-d H:i:s");
    $query = $this->db->query("INSERT INTO point VALUES(NULL, '$no_induk', '$no_tb', '$date')");
  }

  function getPoin($val){
    $query = $this->db->query("SELECT * FROM point WHERE no_induk='$val'");
    if($query->num_rows() == 0)
      return "";
    else
      return $query->result();
  }
  function getNilaiPoint($val){
    $query = $this->db->query("SELECT point FROM tatatertib WHERE no_tb='$val'");
    return $query->result();
  }
  function getPoints($val){
    $query = $this->db->query("SELECT * FROM point, tatatertib WHERE no_induk='$val' AND tatatertib.no_tb = point.no_tb ORDER BY point.date DESC");
    if($query->num_rows() == 0){
      return "";
    }
    else {
      return $query->result();
    }
  }

  function insertAksi($val){
    $query = $this->db->query("SELECT SUM(point) as poin FROM tatatertib, point WHERE no_induk='$val' AND tatatertib.no_tb=point.no_tb");
    $c = $query->result();
    foreach ($c as $key) {
      if($key->poin != NULL) {
        $q = $this->db->query("SELECT * FROM hukuman WHERE point_hukuman < '$key->poin' ORDER BY point_hukuman DESC LIMIT 1");
        if($q->num_rows() != 0){
          $d = $q->result();
          foreach($d as $keys){
            $u = $this->db->query("SELECT * FROM aksi WHERE no_induk='$val' AND no_hukuman='$keys->no_hukuman'");
            if($u->num_rows == 0){
              date_default_timezone_set('Asia/Jakara');
              $date = date("Y-m-d H:i:s");
              $z = $this->db->query("INSERT INTO aksi(no_induk, no_hukuman, date) VALUES('$val', '$keys->no_hukuman', '$date')");
              $q = $this->db->query("SELECT * FROM aksi WHERE date='$date' and no_induk='$val'");
              $q = $q->result();
              foreach($q as $k){
                if($keys->no_hukuman == "1"){
                  $this->db->query("INSERT INTO surat VALUES(NULL, '$val', '$k->no_aksi', 'pemanggilan', '$date')");
                }
                else if($keys->no_hukuman == "2"){
                  $this->db->query("INSERT INTO surat VALUES(NULL, '$val', '$k->no_aksi', 'pemanggilan', '$date')");
                  $this->db->query("INSERT INTO surat VALUES(NULL, '$val', '$k->no_aksi', 'pernyataan', '$date')");
                }
                else if($keys->no_hukuman == "3"){
                  $this->db->query("INSERT INTO surat VALUES(NULL, '$val', '$k->no_aksi', 'pemanggilan', '$date')");
                  $this->db->query("INSERT INTO surat VALUES(NULL, '$val', '$k->no_aksi', 'pernyataan', '$date')");
                  $this->db->query("INSERT INTO surat VALUES(NULL, '$val', '$k->no_aksi', 'skorsing', '$date')");
                }
                else if($keys->no_hukuman == "4"){
                  $this->db->query("INSERT INTO surat VALUES(NULL, '$val', '$k->no_aksi', 'pemanggilan', '$date')");
                  $this->db->query("INSERT INTO surat VALUES(NULL, '$val', '$k->no_aksi', 'pernyataan', '$date')");
                  $this->db->query("INSERT INTO surat VALUES(NULL, '$val', '$k->no_aksi', 'skorsing', '$date')");
                }
                else if($keys->no_hukuman == "5"){
                  $this->db->query("INSERT INTO surat VALUES(NULL, '$val', '$k->no_aksi', 'pemanggilan', '$date')");
                  $this->db->query("INSERT INTO surat VALUES(NULL, '$val', '$k->no_aksi', 'pernyataan', '$date')");
                  $this->db->query("INSERT INTO surat VALUES(NULL, '$val', '$k->no_aksi', 'skorsing', '$date')");
                }
                else if($keys->no_hukuman == "6"){
                  $this->db->query("INSERT INTO surat VALUES(NULL, '$val', '$k->no_aksi', 'pemanggilan', '$date')");
                  $this->db->query("INSERT INTO surat VALUES(NULL, '$val', '$k->no_aksi', 'dropout', '$date')");
                }
              }
            }
          }
        }
      }
    }
  }
  function cekAksi($val){
    $query = $this->db->query("SELECT * FROM aksi,hukuman WHERE no_induk='$val' AND aksi='belum' AND aksi.no_hukuman=hukuman.no_hukuman");
    if($query->num_rows() != 0)
      return $query->result();
    else {
      return "";
    }
  }

  function harian($val) {
    $query=$this->db->query("select user.nama, user.kelas, user.no_induk, tatatertib.nama as nama_tb, tatatertib.point from user join point on user.no_induk=point.no_induk join tatatertib on tatatertib.no_tb=point.no_tb where date LIKE '$val%' order by point.date desc");
    if($query->num_rows() > 0)
      return $query->result();
    else
      return "";
  }
  function graphHarian($val) {
    $query=$this->db->query("select tatatertib.nama, tatatertib.no_tb, count(point.no_induk) as poin, sum(tatatertib.point) as tot from tatatertib join point on point.no_tb = tatatertib.no_tb where date like '$val%' group by point.no_tb order by count(point.no_induk) desc");
    if($query->num_rows() > 0)
      return $query->result();
    else
      return "";
  }
  function harianTotal($val){
    $query=$this->db->query("select count(point.no_induk) as total from tatatertib join point on tatatertib.no_tb=point.no_tb where date like '$val%'");
    return $query->result();
  }
  function harianTotalPoint($val){
    $query=$this->db->query("select sum(tatatertib.point) as total from tatatertib join point on tatatertib.no_tb=point.no_tb where date like '$val%'");
    return $query->result();
  }
  function mingguanTotal($val){
    $query=$this->db->query("select count(point.no_induk) as total from tatatertib join point on tatatertib.no_tb=point.no_tb where week(date)=week('$val')");
    return $query->result();
  }
  function mingguanTotalPoint($val){
    $query=$this->db->query("select sum(tatatertib.point) as total from tatatertib join point on tatatertib.no_tb=point.no_tb where week(date)=week('$val')");
    return $query->result();
  }
  function bulananTotal($val){
    $query=$this->db->query("select count(point.no_induk) as total from tatatertib join point on tatatertib.no_tb=point.no_tb where month(date)=month('$val') and year(date)=year('$val')");
    return $query->result();
  }
  function bulananTotalPoint($val){
    $query=$this->db->query("select sum(tatatertib.point) as total from tatatertib join point on tatatertib.no_tb=point.no_tb where month(date)=month('$val') and year(date)=year('$val')");
    return $query->result();
  }

  function getInfoSiswa($val){
    $query=$this->db->query("SELECT * FROM user WHERE no_induk='$val'");
    return $query->result();
  }

  function infoSurat($no) {
    $query=$this->db->query("SELECT *, user.no_induk as ni, surat.date as tanggal FROM surat join aksi on aksi.no_aksi=surat.no_aksi join user on user.no_induk=aksi.no_induk where surat.no_surat='$no'");
    return $query->result();
  }

  function getSurat($val){
    if($val == "")
      $query = $this->db->query("SELECT * FROM surat, user WHERE surat.no_induk=user.no_induk ORDER BY date DESC");
    else
      $query = $this->db->query("SELECT * FROM surat, user WHERE surat.no_induk=user.no_induk and no_aksi='$val'");
    if($query->num_rows() == 0)
    return "";
    else
    return $query->result();
  }

  function deletesurat($val){
    if($val!="") {
      $query = $this->db->query("DELETE FROM surat WHERE no_surat='$val'");
    }
    return "";
  }
}
?>
