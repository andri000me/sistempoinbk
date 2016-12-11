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
            <h2>Daftar Aksi</h2>
            <p>Disini anda dapat melihat daftar aksi terhadap siswa yang bermasalah.</p>
          </div>

          <div class="content col-3">
            <table>
              <tr align="center">
                <th>No.</th>
                <th>Nama</th>
                <th>No. Induk</th>
                <th>Kelas</th>
                <th>Hukuman</th>
                <th>Surat</th>
                <th>Aksi</th>
              </tr>
              <?php
              $i = 1;
              foreach($belum as $key){
                echo "<tr>";
                echo "<td align='center'>$i</td>";
                echo "<td>$key->nama</td>";
                echo "<td align='center'>$key->no_induk</td>";
                echo "<td align='center'>$key->kelas</td>";
                echo "<td><ul>";
                $hukum = explode("|",$key->hukuman);
                for($ii = 0; $ii<count($hukum); $ii++){
                  echo "<li>$hukum[$ii]</li>";
                }
                echo "</ul></td>";
                echo "<td align='center'><a class='sudah' href='".base_url()."bk/surat/$key->no_aksi'>Surat</a></td>";
                echo "<td align='center'><a class='belum' href='".base_url()."bk/doAksi/$key->no_aksi'>".ucwords($key->aksi)."</a></td>";
                echo "</tr>";
                $i++;
              }
              foreach($sudah as $key){
                echo "<tr>";
                echo "<td align='center'>$i</td>";
                echo "<td>$key->nama</td>";
                echo "<td align='center'>$key->no_induk</td>";
                echo "<td align='center'>$key->kelas</td>";
                echo "<td><ul>";
                $hukum = explode("|",$key->hukuman);
                for($ii = 0; $ii<count($hukum); $ii++){
                  echo "<li>$hukum[$ii]</li>";
                }
                echo "</ul></td>";
                echo "<td align='center'><a class='sudah' href='".base_url()."bk/surat/$key->no_aksi'>Surat</a></td>";
                echo "<td align='center'><a class='sudah'>".ucwords($key->aksi)."</a></td>";
                echo "</tr>";
                $i++;
              }
              ?>
            </table>
          </div>

        </div>
      </div>
    </div>

    <script src="<?php echo base_url()?>public/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>public/js/common.js"></script>
    <script src="<?php echo base_url()?>public/js/img.js"></script>
    <script>
    $(document).ready(function(){
      $(".belum").click(function(){
        if(confirm("Anda yakin sudah menerapkan hukuman dan ingin mengubah status?"))
          return true;
        else {
          return false;
        }
      });
    });
    </script>
  </body>
</html>
