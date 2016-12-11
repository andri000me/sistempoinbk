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
            <h3>Statistik Bulanan Per Minggu</h3>
            <div class="content col-3">
              <div id="line-example"></div>
            </div>
            <div class="content col-3">
              <table>
                <tr>
                  <th>Minggu ke-</th>
                  <th>Jumlah Pelanggaran</th>
                  <th>Jumlah Point</th>
                  <th>Aksi</th>
                </tr>
                <tr align="center">
                  <td>1</td>
                  <td><?php echo $mingguantotal1; ?></td>
                  <td><?php echo $mingguantotalpoint1; ?></td>
                  <td><a class="belum" href="<?php echo base_url()."bk/mingguan/$week1";?>">Detail</a></td>
                </tr>
                <tr align="center">
                  <td>2</td>
                  <td><?php echo $mingguantotal2; ?></td>
                  <td><?php echo $mingguantotalpoint2; ?></td>
                  <td><a class="belum" href="<?php echo base_url()."bk/mingguan/$week2";?>">Detail</a></td>
                </tr>
                <tr align="center">
                  <td>3</td>
                  <td><?php echo $mingguantotal3; ?></td>
                  <td><?php echo $mingguantotalpoint3; ?></td>
                  <td><a class="belum" href="<?php echo base_url()."bk/mingguan/$week3";?>">Detail</a></td>
                </tr>
                <tr align="center">
                  <td>4</td>
                  <td><?php echo $mingguantotal4; ?></td>
                  <td><?php echo $mingguantotalpoint4; ?></td>
                  <td><a class="belum" href="<?php echo base_url()."bk/mingguan/$week4";?>">Detail</a></td>
                </tr>
                <tr align="center">
                  <td>5</td>
                  <td><?php echo $mingguantotal5; ?></td>
                  <td><?php echo $mingguantotalpoint5; ?></td>
                  <td><a class="belum" href="<?php echo base_url()."bk/mingguan/$week5";?>">Detail</a></td>
                </tr>
                <tr align='center'>
                  <td align='right'>Jumlah</td>
                  <td><?php echo $bulanantotal; ?></td>
                  <td><?php echo $bulanantotalpoint; ?></td>
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
    Morris.Line({
      element: 'line-example',
      data: [
      <?php
      echo "
        { y: '1', a: $mingguantotal1, b: $mingguantotalpoint1 },
        { y: '2', a: $mingguantotal2, b: $mingguantotalpoint2 },
        { y: '3', a: $mingguantotal3, b: $mingguantotalpoint3 },
        { y: '4', a: $mingguantotal4, b: $mingguantotalpoint4 },
        { y: '5', a: $mingguantotal5, b: $mingguantotalpoint5 },
        ";
      ?>
      ],
      xkey: 'y',
      parseTime: false,
      hideHover: 'auto',
      ykeys: ['a', 'b'],
      labels: ['Jumlah Pelanggaran', 'Jumlah Point']
    });
    </script>
  </body>
</html>
