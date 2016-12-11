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
            <h2>Input Poin</h2>
            <br>
            <p>Disini anda dapat menginput pelanggaran ataupun penghargaan</p>
          </div>

          <div class="content col-3">
            <div class="content col-2">
              <form action="<?php echo base_url()?>bk/doInputPoin" id="inputPoin" method="post">
                <div id="no_induk" class="inputs">
                  <label for="nama">Nomor Induk Siswa / Nama</label>
                  <input type="text" name="nama" id="nama" class="input-nama" style="margin-left:0" autocomplete="off">
                  <ul></ul>
                </div>
                <input type="text" name="no_induk" style="display:none;">

                <br>
                <div id="pelanggaran">
                  <div id="pelanggaran-1" class="inputs">
                    <label for="pelanggaran-1">Pelanggaran</label>
                    <input type="text" name="pelanggaran-1" id="input-pelanggaran-1" class="input-pelanggaran" style="margin-left:0" autocomplete="off">
                    <ul></ul>
                  </div>
                </div>
                <input type="button" role="button" value="Tambah Pelanggaran" id='tambah-pelanggaran'>
                <input type="button" role="button" value="Hapus Pelanggaran" id='hapus-pelanggaran' style="display:none">
                <input type="text" name="pelanggaran" style="display:none;">

                <br><br>
                <div id="penghargaan">
                  <div id="penghargaan-1" class="inputs">
                    <label for="penghargaan-1">Penghargaan</label>
                    <input type="text" name="penghargaan-1" id="input-penghargaan-1" class="input-penghargaan" style="margin-left:0" autocomplete="off">
                    <ul></ul>
                  </div>
                </div>
                <input type="button" role="button" value="Tambah Penghargaan" id='tambah-penghargaan'>
                <input type="button" role="button" value="Hapus Penghargaan" id='hapus-penghargaan' style="display:none">
                <input type="text" name="penghargaan" style="display:none;">
                <br><br>
                <input type="submit" value="Input">
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
            else if(name == "input-pelanggaran") {
              var url = "<?php echo base_url()?>bk/checkPelanggaran";
            }
            else if(name == "input-penghargaan"){
              var url = "<?php echo base_url()?>bk/checkPenghargaan";
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

        var i = 1;
        var j = 1;
        $("#inputPoin input[type=button]").click(function(){
          var txt = $(this).attr("id").split("-");
          if(txt[0] == "tambah") {
            if(txt[1] == "pelanggaran"){
              i++;
              $("#hapus-pelanggaran").show();
              var add = '<div id="pelanggaran-'+i+'" class="inputs"><label for="pelanggaran-'+i+'">Pelanggaran ke-'+i+'</label><input type="text" name="pelanggaran-'+i+'" id="input-pelanggaran-'+i+'" class="input-pelanggaran" style="margin-left:0" autocomplete="off"><ul></ul></div>';
              $("label[for=pelanggaran-1]").html("Pelanggaran ke-1");
              $("#"+txt[1]).append(add);
            }
            else if(txt[1] == "penghargaan"){
              j++;
              $("#hapus-penghargaan").show();
              var add = '<div id="penghargaan-'+j+'" class="inputs"><label for="penghargaan-'+j+'">Penghargaan ke-'+j+'</label><input type="text" name="penghargaan-'+j+'" id="input-penghargaan-'+j+'" class="input-penghargaan" style="margin-left:0" autocomplete="off"><ul></ul></div>';
              $("label[for=penghargaan-1]").html("Penghargaan ke-1");
              $("#"+txt[1]).append(add);
            }
          }
          else {
            if(txt[1] == "pelanggaran"){
              $("#pelanggaran-"+i).remove();
              i--;
              if(i == 1) $("#hapus-pelanggaran").hide();
            }
            else if(txt[1] == "penghargaan"){
              $("#penghargaan-"+j).remove();
              j--;
              if(j == 1) $("#hapus-penghargaan").hide();
            }
          }
        });

        $("input[type=submit]").click(function(){
          var pelanggaran = "";
          var penghargaan = "";
          var no_induk = "";
          var ii = 1;
          var jj = 1;
          while(ii <= i){
            if($("#input-pelanggaran-"+ii).val() != "")
            pelanggaran = pelanggaran+ $("#input-pelanggaran-"+ii).attr('data-id')+"|";
            ii++;
          }
          while(jj <= j){
            if($("#input-penghargaan-"+jj).val() != "")
            penghargaan = penghargaan+$("#input-penghargaan-"+jj).attr('data-id')+"|";
            jj++;
          }
          no_induk = $("input[name=nama]").attr('data-id');
          $("input[name=no_induk]").val(no_induk);
          $("input[name=penghargaan]").val(penghargaan);
          $("input[name=pelanggaran]").val(pelanggaran);
          if((no_induk != "undefined" && no_induk != "") && ((penghargaan != "" && penghargaan != "undefined") || (pelanggaran != "" && pelanggaran != "undefined"))){
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
