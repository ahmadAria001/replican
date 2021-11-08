$(document).ready(function () {
    selesai();
});
function timestamp() {
    console.log(Date());
    $(".main-time").empty();
    $(".main-time").append("  " + Date());
    $(".main-time").text(function(index, currentText) {
        return currentText
                 .split(' ', 7) //create array of the first four words
                 .join(' ');    //join the array with spaces
    });
}

function selesai() {
    setTimeout(function() {
        timestamp();
        selesai();
    }, 1000);
};