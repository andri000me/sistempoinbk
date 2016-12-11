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
    <link href="<?php echo base_url()?>public/css/morris.css" rel="Stylesheet">
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
            <h2>Statistik Harian</h2>
            <p>Disini anda dapat melihat statistik pelanggaran atau penghargaan yang dilakukan dalam sehari.</p>
          </div>

          <div class="content col-3" style="display:flex; flex-wrap:wrap">
            <?php
              foreach($total as $key) {
                if($key->total <= 0) {
                  echo "<h1>Tidak ada pelanggaran atau penghargaan pada Hari Ini</h1>";
                }
                else { ?>
            <div class="content col-1">
              <div id="donut-example"></div>
            </div>
            <div class="content col-2">
              <h2>Kode Tata Tertib</h2>
              <table>
                <tr>
                  <th>Kode</th>
                  <th>Nama Tata Tertib</th>
                  <th>Jumlah</th>
                </tr>
                <?php
                  foreach($graph as $key){
                    echo "<tr>";
                    echo "<td align='center'>$key->no_tb</td>";
                    echo "<td>$key->nama</td>";
                    echo "<td align='center'>$key->poin</td>";
                    echo "</tr>";
                  }
                ?>
                <tr>
                  <td colspan="2" align="right">Jumlah</td>
                  <td align="center">
                    <?php foreach ($total as $key) {
                      echo $key->total;
                    }?>
                  </td>
                </tr>
              </table>
            </div>

            <div class="content col-3">
              <table>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>No. Induk</th>
                  <th>Kelas</th>
                  <th>Nama Pelanggaran</th>
                  <th>Point</th>
                </tr>
                <?php
                $i = 1;
                foreach ($data as $key) {
                  echo "<tr>";
                  echo "<td>$i</td>";
                  echo "<td>$key->nama</td>";
                  echo "<td>$key->no_induk</td>";
                  echo "<td>$key->kelas</td>";
                  echo "<td>$key->nama_tb</td>";
                  echo "<td align='center'>$key->point</td>";
                  echo "</tr>";
                  $i++;
                }
                echo "<tr><td colspan='5' align='right'>Jumlah</td><td align='center'>";
                foreach($totalpoint as $key){
                  echo $key->total;
                }
                echo "</td></tr>";
                ?>
              </table>
            </div>

            <?php } } ?>

          </div>

        </div>
      </div>
    </div>

    <script src="<?php echo base_url()?>public/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>public/js/common.js"></script>
    <script src="<?php echo base_url()?>public/js/img.js"></script>
    <script src="<?php echo base_url()?>public/js/raphael.min.js"></script>
    <script src="<?php echo base_url()?>public/js/morris.min.js"></script>
    <script>
    Morris.Donut({
  element: 'donut-example',
  data: [
    <?php
    foreach($graph as $key){
      echo "{label: 'KODE : $key->no_tb', value: $key->poin},";
    }?>
  ]
});
</script>
  </body>
</html>
