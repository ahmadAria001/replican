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
$data = $connect->query($qry);
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$data_pegawai = $connect->query("SELECT * FROM article WHERE article_type = 2 LIMIT $halaman_awal, $batas");
$nomor = $halaman_awal + 1;
?>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data_pegawai as $dp) : ?>
            <tr>
                <td><?= $dp['title']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
for ($x = 1; $x <= $total_halaman; $x++) {
?>
    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
<?php } ?>