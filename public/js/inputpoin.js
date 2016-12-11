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
      $.ajax({
        data: "val="+val,
        type: "POST",
        url: url,
        success:function(e){
          alert(e);
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
    }
    else {
      if(txt[1] == "pelanggaran"){
        $("#pelanggaran-"+i).remove();
        i--;
        if(i == 1) $("#hapus-pelanggaran").hide();
      }
    }
  });

});
