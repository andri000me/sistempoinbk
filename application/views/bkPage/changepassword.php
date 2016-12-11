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
            <h2>Ganti Password</h2>
            <br>
            <p>Disini anda dapat mengganti password anda.</p>
          </div>

          <div class="content col-3">
            <div class="content col-2">
              <form action="<?php echo base_url()?>bk/dochangepassword" id="inputPoin" method="post">
                <label for="oldpass">Password Lama</label>
                <input type="password" name="oldpass" id="oldpass" style="margin-left:0" autocomplete="off">
                <br>
                <label for="newpass">Password Baru</label>
                <input type="password" name="newpass" id="newpass" style="margin-left:0" autocomplete="off">
                <br>
                <label for="confpass">Konfirmasi Password</label>
                <input type="password" name="confpass" id="confpass" style="margin-left:0" autocomplete="off">
                <br>
                <input type="submit" value="Ganti Password">
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>

    <script src="<?php echo base_url()?>public/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>public/js/common.js"></script>
    <script src="<?php echo base_url()?>public/js/img.js"></script>
    <script>
      $(document).ready(function(){
        $("input[type=submit]").click(function(){
          var news = $("#newpass").val();
          var conf = $("#confpass").val();
          if(news != conf) {
            alert("Password Baru dan Konfirmasi Password harus sama!");
            return false;
          }
          else {
            return true;
          }
        });

      });
    </script>
  </body>
</html>
