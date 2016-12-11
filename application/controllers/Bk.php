<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bk extends CI_Controller{
  function __construct(){
    parent::__construct();
  }
  function index(){
    if(!$this->session->userdata('loggedIN') || $this->session->userdata('role') != "bk"){
      redirect("user");
    }
    else {
      $data['nama'] = $this->session->userdata("nama");
      if($this->session->userdata("role") == "bk"){
        $data['role'] = "Guru Bimbingan Konseling";
      }
      else {
        redirect("user");
      }
      $this->load->view('sidebar.php', $data);
      $this->load->view('bkPage/index.php', $data);
    }
  }
  function inputPoin(){
    $data['nama'] = $this->session->userdata("nama");
    if($this->session->userdata("role") == "bk"){
      $data['role'] = "Guru Bimbingan Konseling";
    }
    else {
      redirect("user");
    }
    $this->load->view('sidebar.php', $data);
    $this->load->view('bkPage/inputpoin.php', $data);
  }

  function doInputPoin(){
    $no_induk = $this->input->post('no_induk');
    $pelanggaran = $this->input->post('pelanggaran');
    $penghargaan = $this->input->post('penghargaan');
    $this->load->model('getData');
    $pelanggaran = explode("|", $pelanggaran);
    $sizePelanggaran = count($pelanggaran) - 1;
    $i = 0;
    $penghargaan = explode("|", $penghargaan);
    $sizePenghargaan = count($penghargaan) - 1;
    $j = 0;
    while($i < $sizePelanggaran){
      $this->getData->insertPoint($no_induk,$pelanggaran[$i]);
      $i++;
    }
    while($j < $sizePenghargaan){
      $this->getData->insertPoint($no_induk,$penghargaan[$j]);
      $j++;
    }
    $this->getData->insertAksi($no_induk);
    redirect('bk/cariSiswa/'.$no_induk);
  }

  function checkName(){
    $this->load->model('getData');
    $dat = $this->getData->checkName($_POST['val']);
    $i = 1;
    foreach ($dat as $key) {
      echo "<li data-name='$key->nama' data-id='$key->no_induk' id='$i'>$key->nama ($key->no_induk)</li>";
      $i++;
    }
  }

  function checkPelanggaran(){
    $this->load->model('getData');
    $dat = $this->getData->checkPelanggaran($_POST['val']);
    $i = 1;
    foreach ($dat as $key) {
      echo "<li data-name='$key->nama' data-id='$key->no_tb' id='$i'>$key->nama (Poin $key->point)</li>";
      $i++;
    }
  }

  function checkPenghargaan(){
    $this->load->model('getData');
    $dat = $this->getData->checkPenghargaan($_POST['val']);
    $i = 1;
    foreach ($dat as $key) {
      echo "<li data-name='$key->nama' data-id='$key->no_tb' id='$i'>$key->nama (Poin $key->point)</li>";
      $i++;
    }
  }

  function TataTertib(){
    $data['nama'] = $this->session->userdata("nama");
    if($this->session->userdata("role") == "bk"){
      $data['role'] = "Guru Bimbingan Konseling";
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
    $this->load->view('sidebar.php', $data);
    $this->load->view('bkPage/tatatertib.php', $data);
  }

  function hukuman(){
    $data['nama'] = $this->session->userdata("nama");
    if($this->session->userdata("role") == "bk"){
      $data['role'] = "Guru Bimbingan Konseling";
    }
    else {
      redirect("user");
    }
    $this->load->model('getData');
    $data['hukuman'] = $this->getData->getHukuman();
    $this->load->view('sidebar.php', $data);
    $this->load->view('bkPage/hukuman.php', $data);
  }

  function siswa(){
    $data['nama'] = $this->session->userdata("nama");
    if($this->session->userdata("role") == "bk"){
      $data['role'] = "Guru Bimbingan Konseling";
    }
    else {
      redirect("user");
    }
    $this->load->model('getData');
    $data['kelas10'] = $this->getData->getSiswa('10');
    $data['kelas11'] = $this->getData->getSiswa('11');
    $data['kelas12'] = $this->getData->getSiswa('12');
    $this->load->view('sidebar.php', $data);
    $this->load->view('bkPage/siswa.php', $data);
  }

  function siswapoint(){
    $data['nama'] = $this->session->userdata("nama");
    if($this->session->userdata("role") == "bk"){
      $data['role'] = "Guru Bimbingan Konseling";
    }
    else {
      redirect("user");
    }
    $this->load->model('getData');
    $data['siswa'] = $this->getData->getSiswaPoint();
    $this->load->view('sidebar.php', $data);
    $this->load->view('bkPage/siswapoint.php', $data);
  }

  function aksi(){
    $data['nama'] = $this->session->userdata("nama");
    if($this->session->userdata("role") == "bk"){
      $data['role'] = "Guru Bimbingan Konseling";
    }
    else {
      redirect("user");
    }
    $this->load->model('getData');
    $data['belum'] = $this->getData->getAksi("belum");
    $data['sudah'] = $this->getData->getAksi("sudah");
    $this->load->view('sidebar.php', $data);
    $this->load->view('bkPage/aksi.php', $data);
  }

  function doAksi($val){
    $this->load->model('getData');
    $this->getData->doAksi($val);
    redirect('bk/aksi');
  }

  function cariSiswa($no_induk=""){
    $data['nama'] = $this->session->userdata("nama");
    $data['no_induk'] = $no_induk;
    $data['point'] = 0;
    if($no_induk != ""){
      $this->load->model('getData');
      $dat = $this->getData->checkName($no_induk);
      foreach ($dat as $key) {
        $data['nama_siswa'] = $key->nama;
      }
      $point = $this->getData->getPoin($no_induk);
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
    else $data['nama_siswa'] = "";
    if($this->session->userdata("role") == "bk"){
      $data['role'] = "Guru Bimbingan Konseling";
    }
    else {
      redirect("user");
    }
    if($no_induk == ""){
      $data['aksi'] = "";
    }
    else {
      $data['aksi'] = $this->getData->cekAksi($no_induk);
    }
    $this->load->view('sidebar.php', $data);
    $this->load->view('bkPage/carisiswa.php', $data);
  }
  function doCari(){
    $no_induk = $this->input->post('no_induk');
    redirect('bk/cariSiswa/'.$no_induk);
  }

  function harian($day=""){
    /* buat redirect kalo bukan bk */
    $data['nama'] = $this->session->userdata("nama");
    if($this->session->userdata("role") == "bk"){
      $data['role'] = "Guru Bimbingan Konseling";
    }
    else {
      redirect("user");
    }

    if($day == "")
      $date = date("Y-m-d");
    else
      $date = substr($day,0,4)."-".substr($day,4,2)."-".substr($day,6,2);
    $this->load->model('getData');
    $data['graph'] = $this->getData->graphHarian($date);
    $data['data'] = $this->getData->harian($date);
    $data['total'] = $this->getData->harianTotal($date);
    $data['totalpoint'] = $this->getData->harianTotalPoint($date);
    $this->load->view('sidebar.php', $data);
    $this->load->view('bkPage/harian.php', $data);
  }

  function mingguan($date = ""){
    $data['nama'] = $this->session->userdata("nama");
    if($this->session->userdata("role") == "bk"){
      $data['role'] = "Guru Bimbingan Konseling";
    }
    else {
      redirect("user");
    }

    if($date == "")
      $date = date("Y-m-d");
    else
      $date = substr($date,0,4)."-".substr($date,4,2)."-".substr($date,6,2);
    $mondate = new DateTime($date);
    $tuedate = new DateTime($date);
    $weddate = new DateTime($date);
    $thudate = new DateTime($date);
    $fridate = new DateTime($date);
    $day = date("w");
    $mon = $day-1; $tue = $day-2; $wed = $day-3; $thu = $day-4; $fri = $day-5;
    $this->load->model('getData');

    if($mon >= 0)
      $mondate->modify('-'.$mon.' day');
    else
      $mondate->modify('+'.abs($mon).' day');
    $mons = $mondate->format("Y-m-d");
    $mon = $this->getData->harianTotal($mons);
    $montot = $this->getData->harianTotalPoint($mons);
    foreach($mon as $key) $mon = $key->total;
    foreach($montot as $key) $montot = $key->total;

    if($tue >= 0)
      $tuedate->modify('-'.$tue.' day');
    else
      $tuedate->modify('+'.abs($tue).' day');
    $tues = $tuedate->format("Y-m-d");
    $tue = $this->getData->harianTotal($tues);
    $tuetot = $this->getData->harianTotalPoint($tues);
    foreach($tue as $key) $tue = $key->total;
    foreach($tuetot as $key) $tuetot = $key->total;

    if($wed >= 0)
      $weddate->modify('-'.$wed.' day');
    else
      $weddate->modify('+'.abs($wed).' day');
    $weds = $weddate->format("Y-m-d");
    $wed = $this->getData->harianTotal($weds);
    $wedtot = $this->getData->harianTotalPoint($weds);
    foreach($wed as $key) $wed = $key->total;
    foreach($wedtot as $key) $wedtot = $key->total;

    if($thu >= 0)
      $thudate->modify('-'.$thu.' day');
    else
      $thudate->modify('+'.abs($thu).' day');
    $thus = $thudate->format("Y-m-d");
    $thu = $this->getData->harianTotal($thus);
    $thutot = $this->getData->harianTotalPoint($thus);
    foreach($thu as $key) $thu = $key->total;
    foreach($thutot as $key) $thutot = $key->total;

    if($fri >= 0)
      $fridate->modify('-'.$fri.' day');
    else
      $fridate->modify('+'.abs($fri).' day');
    $fris = $fridate->format("Y-m-d");
    $fri = $this->getData->harianTotal($fris);
    $fritot = $this->getData->harianTotalPoint($fris);
    foreach ($fri as $key) $fri = $key->total;
    foreach ($fritot as $key) $fritot = $key->total;

    if($montot == "") $montot = 0;
    if($tuetot == "") $tuetot = 0;
    if($wedtot == "") $wedtot = 0;
    if($thutot == "") $thutot = 0;
    if($fritot == "") $fritot = 0;
    $data['mon'] = $mon; $data['tue'] = $tue; $data['wed'] = $wed; $data['thu'] = $thu; $data['fri'] = $fri;
    $data['montot'] = $montot; $data['tuetot'] = $tuetot; $data['wedtot'] = $wedtot; $data['thutot'] = $thutot; $data['fritot'] = $fritot;
    $data['tglmon'] = str_replace("-","",$mons);
    $data['tgltue'] = str_replace("-","",$tues);
    $data['tglwed'] = str_replace("-","",$weds);
    $data['tglthu'] = str_replace("-","",$thus);
    $data['tglfri'] = str_replace("-","",$fris);
    $mingguanTotal = $this->getData->mingguanTotal($date);
    foreach($mingguanTotal as $key) $data['mingguantotal'] = $key->total;
    $mingguanTotalPoint = $this->getData->mingguanTotalPoint($date);
    foreach($mingguanTotalPoint as $key) $data['mingguantotalpoint'] = $key->total;
    $this->load->view('sidebar.php', $data);
    $this->load->view('bkPage/mingguan.php', $data);
  }

  function bulanan($date=""){
    $data['nama'] = $this->session->userdata("nama");
    if($this->session->userdata("role") == "bk"){
      $data['role'] = "Guru Bimbingan Konseling";
    }
    else {
      redirect("user");
    }
    if($date == "")
      $date = date("Y-m-");
    else
      $date = substr($date,0,4)."-".substr($date,4,2)."-";
    $date = $date."01";

    $week[1] = $date;
    $week[2] = date( "Y-m-d" ,strtotime('next Monday', strtotime( $week[1] ) ) );
    $week[3] = date( "Y-m-d" ,strtotime('+1 week', strtotime( $week[2] ) ) );
    $week[4] = date( "Y-m-d" ,strtotime('+1 week', strtotime( $week[3] ) ) );
    $week[5] = date( "Y-m-d" ,strtotime('+1 week', strtotime( $week[4] ) ) );


    $this->load->model('getData');
    for($i=1; $i<=5; $i++){
      $mingguanTotal = $this->getData->mingguanTotal($week[$i]);
      foreach($mingguanTotal as $key) $data['mingguantotal'.$i] = $key->total;
      $mingguanTotalPoint = $this->getData->mingguanTotalPoint($week[$i]);
      foreach($mingguanTotalPoint as $key) $data['mingguantotalpoint'.$i] = $key->total;
      if($data['mingguantotalpoint'.$i] == "") $data['mingguantotalpoint'.$i] = 0;
      $data['week'.$i] = $week[$i];
      $data['week'.$i] = str_replace("-","",$data['week'.$i]);
    }
    $bulanantotal = $this->getData->bulananTotal($date);
    foreach($bulanantotal as $key) $data['bulanantotal'] = $key->total;
    $bulanantotalpoint = $this->getData->bulananTotalPoint($date);
    foreach($bulanantotalpoint as $key) $data['bulanantotalpoint'] = $key->total;
    $this->load->view('sidebar.php', $data);
    $this->load->view('bkPage/bulanan.php', $data);
  }

  function changePassword(){
    $data['nama'] = $this->session->userdata("nama");
    if($this->session->userdata("role") == "bk"){
      $data['role'] = "Guru Bimbingan Konseling";
    }
    else {
      redirect("user");
    }
    $this->load->view('sidebar.php',$data);
    $this->load->view('bkPage/changepassword.php',$data);
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
      redirect('bk/changepassword');
    }
  }

  function pemanggilan($no){
    $this->load->model('getData');
    $ambilinfosurat = $this->getData->infoSurat($no);
    foreach($ambilinfosurat as $key) {
      $data['nama'] = $key->nama;
      $data['no_induk'] = $key->ni;
      $data['kelas'] = $key->kelas;
      $data['no'] = $key->no_surat;
      $data['now'] = date("d-m-Y", strtotime($key->tanggal));
      $nextdate = new DateTime($key->tanggal);
      $nextdate->modify('+1 week');
      $data['nextdate'] = $nextdate->format("d-m-Y");
    }
    ob_start();
    $this->load->view('bkPage/suratpemanggilan', $data);
    $html = ob_get_contents();
    ob_end_clean();
    $html2pdf = new HTML2PDF('P', 'A4', 'en');
    $html2pdf->writeHTML($html);
    $html2pdf->Output('first_PDF_file.pdf');
  }

  function pernyataan($no=""){
    $this->load->model('getData');
    $ambilinfosurat = $this->getData->infoSurat($no);
    foreach($ambilinfosurat as $key) {
      $data['nama'] = $key->nama;
      $data['no_induk'] = $key->ni;
      $data['kelas'] = $key->kelas;
      $data['no'] = $key->no_surat;
      $data['now'] = date("d-m-Y", strtotime($key->tanggal));
      $nextdate = new DateTime($key->tanggal);
      $nextdate->modify('+1 week');
      $data['nextdate'] = $nextdate->format("d-m-Y");
    }
    ob_start();
    $this->load->view('bkPage/suratpernyataan', $data);
    $html = ob_get_contents();
    ob_end_clean();
    $html2pdf = new HTML2PDF('P', 'A4', 'en');
    $html2pdf->writeHTML($html);
    $html2pdf->Output('first_PDF_file.pdf');
  }

  function skorsing($no=""){
    $this->load->model('getData');
    $ambilinfosurat = $this->getData->infoSurat($no);
    foreach($ambilinfosurat as $key) {
      $data['nama'] = $key->nama;
      $data['no_induk'] = $key->ni;
      $data['kelas'] = $key->kelas;
      $data['no'] = $key->no_surat;
      $data['now'] = date("d-m-Y", strtotime($key->tanggal));
      $nextdate = new DateTime($key->tanggal);
      $nextdate->modify('+1 week');
      $data['nextdate'] = $nextdate->format("d-m-Y");
    }
    ob_start();
    $this->load->view('bkPage/suratskorsing', $data);
    $html = ob_get_contents();
    ob_end_clean();
    $html2pdf = new HTML2PDF('P', 'A4', 'en');
    $html2pdf->writeHTML($html);
    $html2pdf->Output('first_PDF_file.pdf');
  }

  function dropout($no=""){
    $this->load->model('getData');
    $ambilinfosurat = $this->getData->infoSurat($no);
    foreach($ambilinfosurat as $key) {
      $data['nama'] = $key->nama;
      $data['no_induk'] = $key->ni;
      $data['kelas'] = $key->kelas;
      $data['no'] = $key->no_surat;
      $data['now'] = date("d-m-Y", strtotime($key->tanggal));
      $nextdate = new DateTime($key->tanggal);
      $nextdate->modify('+1 week');
      $data['nextdate'] = $nextdate->format("d-m-Y");
    }
    ob_start();
    $this->load->view('bkPage/suratdo', $data);
    $html = ob_get_contents();
    ob_end_clean();
    $html2pdf = new HTML2PDF('P', 'A4', 'en');
    $html2pdf->writeHTML($html);
    $html2pdf->Output('first_PDF_file.pdf');
  }

  function surat($val=""){
    $data['nama'] = $this->session->userdata("nama");
    if($this->session->userdata("role") == "bk"){
      $data['role'] = "Guru Bimbingan Konseling";
    }
    else {
      redirect("user");
    }
    $this->load->model('getData');
    $data['surat'] = $this->getData->getSurat($val);
    $this->load->view('sidebar.php', $data);
    $this->load->view('bkPage/surat.php', $data);
  }
  function deletesurat($val=""){
    $this->load->model('getData');
    $this->getData->deleteSurat($val);
    redirect('bk/surat');
  }
}
?>
