$(document).ready(function () {
  radio();
});

function radio() {
  var rad = document.querySelectorAll('[id="rad"]');

  for (rd of rad) {
    console.log(rd.value);
    if (rd.checked) {
      if (rd.value == "yt") {
        document.getElementById("yt-env").style.display = "block";
        document.getElementById("pct-env").style.display = "none";
        document.getElementById("pct-env").value = "";
        document.getElementById("imgprev").setAttribute("src", "");
        document.getElementById("imgprev").style.display = "none";
        // break;
      }
      if (rd.value == "pict") {
        document.getElementById("yt-env").style.display = "none";
        document.getElementById("pct-env").style.display = "block";
        document.getElementById("imgprev").style.display = "block";
        // break;
      }
      break;
    }
  }
  return;
}
function uppict(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#imgprev").attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
