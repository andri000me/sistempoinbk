$("[data-bgcolor]").each(function(){
    var bgcolor = $(this).attr("data-bgcolor");
    $(this).css("background-color",bgcolor);
});
$("[data-hover").each(function(){
    var hover = $(this).attr("data-hover");
    var bgcolor = $(this).css("background-color");
    $(this).hover(function(){
        $(this).css("background-color",hover);
    },function(){
        $(this).css("background-color", bgcolor);
    });
});
$("[data-color]").each(function(){
  var color = $(this).attr("data-color");
  $(this).css("color",color);
});

/* Bikin gambar jadi bulet */
$(".round-image").each(function(){
  var url = $(this).attr("data-img");
  $(this).width($(this).attr("data-width"));
  $(this).height($(this).attr("data-height"));
  $(this).css({"background-image":"url("+url+")","background-size":"cover"});
});

$(".corner-image").each(function(){
  var url = $(this).attr("data-img");
  $(this).width($(this).attr("data-width"));
  $(this).height($(this).attr("data-height"));
  $(this).css({"background-image":"url("+url+")","background-size":"cover"});
});

$("[data-link]").each(function(){
  $(this).click(function(){
    window.location = $(this).attr("data-link");
  });
});

$(document).ready(function(){

  /* Buat tombol yang ada di kiri tuh */
  var logo = $("#logo").html();
  $("#menu-btn").click(function(){
    $("#right-content").toggleClass("right-content-expand");
    $("#left-content").toggleClass("left-content-expand");
    $("#menu-btn i").toggleClass("fa-bars");
    $("#logo").toggleClass("hideLogo");
    $("#logo").toggle(function(){
      $("#logo").text("");
    }, function(){
      $("#logo").text(logo);
    });
  });

  /*Buat tombol turun di profile */
  $(".profile-info").click(function(){
    $(".profile-info-collapse").slideToggle("fast");
  });
  $(".profile-info-collapse").click(function(event){
    event.stopPropagation();
  });

});
