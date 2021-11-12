<?php
require_once('../temp/source.php');
if (!isset($TPL)) {
    $TPL = new source();
    $TPL->title = "Input Article";
    $TPL->bodycontent = __FILE__;
    include "../layout/layout.php";
    exit;
}

if (session_status() == 0) {
    session_start();
}

include('../db/connect.php');
if (empty($_SESSION['user'])) {
    $cont = "hidden";
} else {
    $cont = "";
}
?>
<div class="container" <?= $cont; ?>>
    <?php
    // print_r($_SESSION);
    if (!empty($_SESSION['reg'])) {
        echo
        '<center>
        <div class="alert alert-danger alert-dismissible fade show mt-2 mb-2" role="alert" style="max-width: 50%;">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        ' . $_SESSION['reg'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        </center>';
    }
    // if (isset($_SESSION['reg']) == "Exist") {
    //     echo
    //     '<center>
    //     <div class="alert alert-danger alert-dismissible fade show mt-2 mb-2" role="alert" style="max-width: 50%;">
    //     <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    //     ' . $_SESSION['reg'] . '
    //         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //     </div>
    //     </center>';
    // }
    unset($_SESSION['reg']);
    ?>
    <div class="row">
        <center>
            <div class="box mt-5 mb-5" style="max-width: 600px;color: white;">
                <div class="col">
                    <form method="post" action="reg.php">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" style="font-size: 19px;" class="form-label">User:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" required name="user" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-1">
                            <label for="exampleInputPassword1" style="font-size: 19px;" class="form-label">Password:</label>
                            <input type="password" class="form-control" required name="pass" id="exampleInputPassword1">
                        </div>
                        <hr>
                        <div class="p-5">
                            <div class="h5">
                                User Type
                            </div>
                            <div style="display: block;max-width: 371px;">
                                <div class="form-check form-switch">
                                    <label class="form-check-label mt-2">
                                        <input type="radio" class="form-check-input" role="switch" name="tipe" id="tipe" value="1">
                                        Admion Web
                                    </label>
                                </div>
                                <div class="form-check form-switch">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" role="switch" name="tipe" id="tipe" value="2" checked>
                                        Dokter
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-info" style="width: 100%;font-size: 20px;">Register</button>
                    </form>
                </div>
            </div>
        </center>
    </div>
</div>