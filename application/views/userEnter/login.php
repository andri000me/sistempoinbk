<?php
defined('BASEPATH') OR exit('No Direct Access Allowed!');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Hello</title>
        <link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url();?>public/css/login.css" rel="stylesheet">
    </head>
    <body>
        <div class="wrapper">
          <div id="login">
            <h1>Selamat datang di Sistem POIN Sekolah</h1>
            <div id="login-box">
              <h3>Silahkan Login Menggunakan NIP atau NIS anda</h3><br>
              <form action="<?php echo base_url();?>user/doLogin" method="post">
                <label for="ni">Nomor Induk</label>
                <input type="number" name="ni" id="ni">
                <label for="password">Password</label>
                <input type="password" name="pass" id="password">
                <input type="submit" value="Login" data-bgcolor="#607d8b" data-hover="#37474f" data-color="#ffffff" onclick="return check();">
                  <div id="error"></div>
              </form>
            </div>
          </div>
        </div>

        <script src="<?php echo base_url();?>public/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>public/js/common.js"></script>
        <script>
            $(document).ready(function(){
                $("#ni").keypress(function(e){
                    if(e.which <= 46 && e.which >= 44)
                        return false;
                });
            });
            function check(){
                var ni = $("#ni").val();
                var pass = $("#password").val();
                var error = "<h3>Pesan Error</h3><ul>";
                var check = false;

                /* Melakukan pengecekkan, apakah data yang diinput kosong apa gak? */
                if(ni == "") {
                    error = error+"<li>Nomor Induk masih kosong</li>";
                    check = true;
                }
                if(pass == "") {
                    error = error+"<li>Password masih kosong</li>";
                    check = true;
                }

                /* Melakukan pengecekkan, apakah datanya cocok sama yang di database? */
                if(ni != "" && pass != ""){
                  $.ajax({
                      type:"POST",
                      url:"<?php echo base_url()?>user/loginCheck",
                      data:"ni="+ni+"&pass="+pass,
                      async:false,
                      success:function(e){
                          if(e == "false"){
                              check = true;
                              error = error+"<li>Nomor Induk dan Password tidak cocok</li>";
                          }
                      }
                  });
                }

                error = error+"</ul>";

                if(check) {
                    $("#error").html(error).addClass("error");
                    return false;
                }
                else {
                    $("#error").html('').removeClass("error");
                    return true;
                }
            }
        </script>
    </body>
</html>
