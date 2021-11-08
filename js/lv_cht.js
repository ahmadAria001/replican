$(document).ready(function () {
    selesai();
  });
  
  function selesai() {
    setTimeout(function () {
      update();
      selesai();
    }, 200);
  }
  
  function update() {
    $.getJSON("repfm.php", function (res) {
      // $(".stat").empty();
      $.each(res.result, function () {
        $(".stat").append("<p>" + this['stat'] + "</p>");
      print(res);
      });
    });
  }
  