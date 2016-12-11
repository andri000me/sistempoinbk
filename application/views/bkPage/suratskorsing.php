<!DOCTYPE html>
<html>
  <head>
    <link href="<?php echo base_url()?>public/css/surat.css" rel="stylesheet">
  </head>
  <body>
    <div id="kop">
      <table cellpadding="0" cellspacing="0">
        <tr>
          <td width="150"><img src="<?php echo base_url()?>public/img/logo_jakarta.jpg" width="150" height="180"></td>
          <td width="430" align="center" valign='middle'>
            <h3 style="font-size:14px">PEMERINTAH PROVINSI DAERAH KHUSUS IBUKOTA JAKARTA</h3>
            <h2 style="font-size:20px">DINAS PENDIDIKAN</h2>
            <h1 style="font-size:26px">SMA NEGERI 13 JAKARTA</h1>
            Jln. Seroja No. 1 Rawabadak Utara, Kec. KOJA 14230. Jakarta Utara, Tlp. 4303676 Fax.  4304580<br>
            Website: www.sman13jkt.sch.id    e-mail : info@sman13jkt.sch.id </td>
          <td width="150"><img src="<?php echo base_url()?>public/img/logo_sma13.png"  width="150" height="180"></td>
        </tr>
      </table>
    </div>
    <br><br>
    <div id="body">
      <table cellpadding="0" cellspacing="0" width="740">
        <tr>
          <td width="50">Nomor</td>
          <td width="1">:</td>
          <td width="180"><?php echo $no?>/422/BKSMA13/2016</td>
          <td width="319">&nbsp;</td>
          <td width="150" align="right">Jakarta, <?php echo $now; ?></td>
        </tr>
        <tr>
          <td>Hal</td>
          <td>:</td>
          <td colspan="3">Pemberitahuan Skorsing</td>
        </tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><td colspan="5">Kepada</td></tr>
        <tr><td colspan="5">Yth. Orangtua siswa dari <?php echo $nama ?> di tempat</td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><td colspan="5">Assalamualaikum Wr. Wb.</td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><td colspan="5">Sehubungan dengan adanya pelanggaran tata tertib yang dilakukan oleh siswa yang dengan :
</td></tr>
      </table>
      <br><br>
      <table cellspacing="0" cellpading="0">
        <tr>
          <td width="100"></td>
          <td width="150">Nama</td>
          <td width="1">:</td>
          <td width="459"><?php echo $nama?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>No. Induk</td>
          <td>:</td>
          <td><?php echo $no_induk?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Kelas</td>
          <td>:</td>
          <td><?php echo $kelas?></td>
        </tr>
        <tr><td colspan="4">&nbsp;</td></tr>
        <tr><td colspan="4">&nbsp;</td></tr>
        <tr><td colspan="4">Maka kami memberitahukan kepada bpk/ibu wali siswa dari <?php echo $nama?> bahwa siswa tersebut di atas di skorsing selama 3 hari.
Kami dari pihak sekolah mohon maklum adanya, dan meminta maaf yang sebesar-besarnya.</td></tr>
        <tr><td colspan="4">&nbsp;</td></tr>
        <tr><td colspan="4">&nbsp;</td></tr>
      </table>
      <table cellspacing="0" cellpadding="0">
        <tr>
          <td width="250" align="center">Kepala Sekolah</td>
          <td width="220">&nbsp;</td>
          <td width="250" align="center">Wali Kelas</td>
        </tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr><td>NIP:</td><td></td><td>NIP:</td></tr>
      </table>
    </div>

    <style>
    body, html {
      margin:0; padding:0; text-align: center; width:80%;
    }

    #kop {
      width:100%; margin:0 auto; box-sizing: border-box; text-align: center;clear:both;
    }
    #kop img {
      width:150px; height:180px; border:1px solid #000; float:left;
    }
    #kop #namasekolah {
      width:300px; border:1px solid #000; float:left;
    }
    #kop table td {
      border-bottom:2px double #000;
    }
    h1,
    h2,
    h3 {
      margin:0; padding:0;
    }
    </style>

  </body>
</html>
