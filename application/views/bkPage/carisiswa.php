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
            <h2>Cari Siswa</h2>
            <br>
            <p>Disini anda dapat mencari siswa dan melihat total poin yang didapat.</p>
          </div>

          <div class="content col-3" style="display:flex; flex-wrap:wrap">
            <div class="content col-2">
              <form action="<?php echo base_url()?>bk/doCari" id="inputPoin" method="post">
                <div id="no_induk" class="inputs">
                  <label for="nama">Nomor Induk Siswa / Nama</label>
                  <input type="text" name="nama" id="nama" class="input-nama" style="margin-left:0;" data-id='<?php echo $no_induk ?>' autocomplete="off" value="<?php echo $nama_siswa?>">
                  <ul></ul>
                </div>
                <input type="text" name="no_induk" style="display:none;">
                <input type="submit" value="Cari">
              </form>
            </div>
            <?php if($nama_siswa != "") { ?>
            <div class="content col-1" style="text-align:center">
              <h2>Total Poin</h2>
              <br><h1><?php echo $point; ?></h1>
            </div>
            <?php if($aksi != ""){ ?>
            <div class="content col-3">
              <h2>Aksi yang harus dilakukan</h2>
              <ul>
                <?php
                  if($aksi != "") {
                    foreach($aksi as $key) {
                      $hukuman = explode("|", $key->hukuman);
                      for($i=0; $i<count($hukuman); $i++){
                        echo "<li>$hukuman[$i]</li>";
                      }
                    }
                  }
                ?>
              </ul>
            </div>
            <?php } ?>
            <div class="content col-3">
              <?php if($list_point == ""){
                echo "<h1 align='center'>Tidak ada Point</h1>";
              } else {
              ?>
              <table>
                <tr style="text-align:center">
                  <th>No.</th>
                  <th>Jenis Pelanggaran / Penghargaan</th>
                  <th>Point</th>
                </tr>
                <?php
                $i = 1;
                foreach($list_point as $key){
                  echo "<tr>";
                  echo "<td style='text-align:center'>$i</td>";
                  echo "<td>$key->nama</td>";
                  echo "<td style='text-align:center'>$key->point</td>";
                  echo "</tr>";
                  $i++;
                }
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
    <script>
      $(document).ready(function(){
        $("#inputPoin").on('keyup','input[type=text]',function(){
          var name = $(this).attr("class");
          var uls = $(this).siblings("ul");
          var ulsid = $(uls).attr("id");
          var lis = $(uls).children("li");

          if($(this).val() != ""){
            var val = $(this).val();
            if(name == "input-nama") {
              var url = "<?php echo base_url()?>bk/checkName";
            }
            $.ajax({
              data: "val="+val,
              type: "POST",
              url: url,
              success:function(e){
                $(uls).html(e);
              }
            });
            $(uls).fadeIn();
          }
          else{
            $(uls).fadeOut();
          }
        });
        $("#inputPoin").on('click','li',function(){
          var ids = $(this).parent().parent();
          var inputtext = $(ids).children('input[type=text]');
          $(inputtext).val($(this).attr('data-name'));
          $(inputtext).attr('data-id',$(this).attr('data-id'));
          $(".inputs ul").html('').fadeOut();
        });

        $("input[type=submit]").click(function(){
          var no_induk = "";
          no_induk = $("input[name=nama]").attr('data-id');
          $("input[name=no_induk]").val(no_induk);
          if((no_induk != "undefined" && no_induk != "")){
            return true;
          }
          else {
            alert("Data Harus Diisi!");
            return false;
          }
        });
      });
    </script>
  </body>
</html>
