<!DOCTYPE html>
<html>
  <head>
    <link href="<?php echo base_url()?>public/css/surat.css" rel="stylesheet">
  </head>
  <body>
    <br><br>
    <h2>Surat Pernyataan</h2>
    <br><br>
    <div id="body">
      <table cellpadding="0" cellspacing="0" width="740">
        <tr><td colspan="3">Yang bertanda tangan di bawah ini :</td></tr>
        <tr>
          <td width="100">Nama</td>
          <td width="1">:</td>
          <td width="624"><?php echo $nama ?></td>
        </tr>
        <tr>
          <td width="100">No. Induk</td>
          <td width="1">:</td>
          <td width="624"><?php echo $no_induk?></td>
        </tr>
        <tr>
          <td width="100">Kelas</td>
          <td width="1">:</td>
          <td width="624"><?php echo $kelas ?></td>
        </tr>
        <tr><td colspan='3'>&nbsp;</td></tr>
        <tr><td colspan='3'>&nbsp;</td></tr>
        <tr><td colspan='3'>Menyatakan dengan sungguh-sungguh akan merubah sikap saya ke tahap yang lebih baik dan tidak akan mengulangi pelanggaran yang telah saya lakukan. Apabila di kemudian hari saya terbukti melakukan pelanggaran maka saya siap menerima sanksi berupa skorsing dari pihak sekolah SMA Negeri 13 Jakarta.
        </td></tr>
        <tr><td colspan='3'>&nbsp;</td></tr>
        <tr><td colspan='3'>
          Demikian surat pernyataan ini saya buat dengan sebenarnya dan ditandatangani dalam keadaan sehat jasmani dan rohani serta tanpa ada paksaan maupun tekanan dari pihak lain.
        </td></tr>
      </table>
      <br><br><br>
      <table cellspacing="0" cellpadding="0">
        <tr>
          <td width="533">&nbsp;</td>
          <td align='right' width="200">Diketahui, Jakarta <?php echo $now ?></td>
        </tr>
      </table>
      <br><br><br>
      <table cellspacing="0" cellpadding="0" >
        <tr>
          <td width="200" align='center'>Orangtua / Wali</td>
          <td width="325" colspan="3">&nbsp;</td>
          <td width="200" align='center'>Yang Membuat Pernyataan</td>
        </tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr>
          <td width="200" coslpan="2"></td>
          <td width="5">&nbsp;</td>
          <td width="225" align='center'>Mengetahui<br>Kepala Sekolah SMAN 13 Jakarta</td>
          <td width="5">&nbsp;</td>
          <td width="200" align='center'></td>
        </tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>
        <tr>
          <td width="200" coslpan="2"></td>
          <td width="5">&nbsp;</td>
          <td width="225">NIP: </td>
          <td width="5">&nbsp;</td>
          <td width="200" align='center'></td>
        </tr>
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
