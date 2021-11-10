<?php
include('../db/connect.php');
?>

<?php
$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$qry2 = "SELECT * FROM article WHERE article_type = 2";
$data = $connect->query($qry2);
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$data_pegawai = $connect->query("SELECT * FROM article WHERE article_type = 2 LIMIT $halaman_awal, $batas");
$nomor = $halaman_awal + 1;
?>

<div class="form-check">
    <form method="get" action="">
        <div class="form-group">
            <label for=""></label>
            <input type="text" class="form-control" name="xx" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Help text</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>