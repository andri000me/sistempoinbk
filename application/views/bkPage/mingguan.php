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
            <h2>Statistik Mingguan</h2>
            <p>Disini anda dapat melihat statistik pelanggaran atau penghargaan yang dilakukan dalam seminggu.</p>
          </div>

          <div class="content col-3" style="display:flex; flex-wrap:wrap">
            <div class="content col-3">
              <div id="bar-example"></div>
            </div>


            <div class="content col-3">
              <table>
                <tr>
                  <th>Hari</th>
                  <th>Jumlah Pelanggaran</th>
                  <th>Jumlah Point</th>
                  <th>Aksi</th>
                </tr>
                <tr align="center">
                  <td>Senin</td>
                  <td><?php echo $mon; ?></td>
                  <td><?php echo $montot; ?></td>
                  <td><a class="belum" href="<?php echo base_url()."bk/harian/$tglmon";?>">Detail</a></td>
                </tr>
                <tr align="center">
                  <td>Selasa</td>
                  <td><?php echo $tue; ?></td>
                  <td><?php echo $tuetot; ?></td>
                  <td><a class="belum" href="<?php echo base_url()."bk/harian/$tgltue";?>">Detail</a></td>
                </tr>
                <tr align="center">
                  <td>Rabu</td>
                  <td><?php echo $wed; ?></td>
                  <td><?php echo $wedtot; ?></td>
                  <td><a class="belum" href="<?php echo base_url()."bk/harian/$tglwed";?>">Detail</a></td>
                </tr>
                <tr align="center">
                  <td>Kamis</td>
                  <td><?php echo $thu; ?></td>
                  <td><?php echo $thutot; ?></td>
                  <td><a class="belum" href="<?php echo base_url()."bk/harian/$tglthu";?>">Detail</a></td>
                </tr>
                <tr align="center">
                  <td>Jumat</td>
                  <td><?php echo $fri; ?></td>
                  <td><?php echo $fritot; ?></td>
                  <td><a class="belum" href="<?php echo base_url()."bk/harian/$tglfri";?>">Detail</a></td>
                </tr>
                <tr align='center'>
                  <td align='right'>Jumlah</td>
                  <td><?php echo $mingguantotal; ?></td>
                  <td><?php echo $mingguantotalpoint; ?></td>
                </tr>
              </table>
            </div>


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
    Morris.Bar({
      element: 'bar-example',
      hideHover: 'auto',
      data: [
        <?php
        echo "{ y: 'Senin', a:$mon, b:$montot},";
        echo "{ y: 'Selasa', a:$tue, b:$tuetot},";
        echo "{ y: 'Rabu', a:$wed, b:$wedtot},";
        echo "{ y: 'Kamis', a:$thu, b:$thutot},";
        echo "{ y: 'Jumat', a:$fri, b:$fritot}";
        ?>
      ],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['Jumlah Pelanggaran', 'Jumlah Point']
    });
    </script>
  </body>
</html>
