<?php
defined('BASEPATH') OR exit('No Direct Access Allowed!');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Halaman BK</title>
    <link href="<?php echo base_url()?>public/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>public/css/bkPage.css" rel="stylesheet">
    <link href="<?php echo base_url()?>public/css/font-awesome.min.css" rel="stylesheet">
  </head>
  <body data-bgcolor="#f4f4f4">
    <div id="wrapper">

      <div id="right-content">
        <div class="navbar" data-bgcolor="#ffffff" style="justify-content:space-between">
          <div class="some-menu">
            SMAN 13 Jakarta
          </div>
          <div class="profile-info">
            <div class="round-image img-profile" data-img="<?php echo base_url()?>public/img/admin.png" data-width="30px" data-height="30px"></div>
            <?php echo $nama ?>&nbsp;<i class="fa fa-angle-down"></i>
            <div class="profile-info-collapse">
              <div class="header-profile-info-collapse">
                <div class="corner-image img-profile-big" data-img="<?php echo base_url()?>public/img/admin.png" data-width="75px" data-height="75px"></div>
                <div class="profile-info-detail">
                  <div class="profile-name"><?php echo $nama; ?></div>
                  <div class="profile-role"><?php echo $role; ?></div>
                </div>
              </div>
              <div class="body-profile-info-collapse">
                <ul>
                  <li data-link="<?php echo base_url()?>bk/changepassword"><i class="fa fa-cog fa-fw"></i> Edit Password</li>
                </ul>
              </div>
              <div class="footer-profile-info-collapse">
                <button class="btn" data-bgcolor="#607d8b" data-hover="#37474f" data-color="#ffffff" data-link="<?php echo base_url()?>user/logout"><i class="fa fa-power-off"></i> Logout</button>
              </div>
            </div>
          </div>
        </div>

        <div id="real-right-content">

          <div class="content col-3">
            <h2>Daftar Surat</h2>
            <p>Disini anda dapat melihat daftar surat yang harus diberikan kepada wali murid yang bersangkutan.</p>
          </div>

          <div class="content col-3">
            <?php if($surat == "") echo "<h1>Tidak ada Surat</h1>";
            else {?>
            <table>
              <tr align="center">
                <th>No. Surat</th>
                <th>Jenis Surat</th>
                <th>Nama</th>
                <th>No. Aksi</th>
                <th colspan="2">Aksi</th>
              </tr>
              <?php
              foreach($surat as $key){
                echo "<tr align='center'>";
                echo "<td>$key->no_surat</td>";
                echo "<td>".ucwords($key->jenis_surat)."</td>";
                echo "<td>$key->nama</td>";
                echo "<td>$key->no_aksi</td>";
                if($key->jenis_surat == "pemanggilan")
                  echo "<td><a class='belum' href='".base_url()."bk/pemanggilan/$key->no_surat'>Cetak</a></td>";
                if($key->jenis_surat == "pernyataan")
                  echo "<td><a class='belum' href='".base_url()."bk/pernyataan/$key->no_surat'>Cetak</a></td>";
                if($key->jenis_surat == "skorsing")
                  echo "<td><a class='belum' href='".base_url()."bk/skorsing/$key->no_surat'>Cetak</a></td>";
                if($key->jenis_surat == "dropout")
                  echo "<td><a class='belum' href='".base_url()."bk/dropout/$key->no_surat'>Cetak</a></td>";
                echo "<td><a class='belum hapus' href='.".base_url()."bk/deletesurat/$key->no_surat'>Hapus</a></td>";
                echo "</tr>";
              }
              ?>
            </table>
            <?php } ?>
          </div>

        </div>
      </div>
    </div>

    <script src="<?php echo base_url()?>public/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>public/js/common.js"></script>
    <script src="<?php echo base_url()?>public/js/img.js"></script>
    <script>
    $(document).ready(function(){
      $(".hapus").click(function(){
        if(confirm("Anda yakin ingin menghapus?"))
          return true;
        else {
          return false;
        }
      });
    });
    </script>
  </body>
</html>
