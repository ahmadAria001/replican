<?php
require_once('../temp/source.php');
if (!isset($TPL)) {
    $TPL = new source();
    $TPL->title = "Home";
    $TPL->bodycontent = __FILE__;
    include "../layout/layout.php";
    exit;
}

if (isset($_SESSION['inc'])) {
    echo
    '<center>
    <div class="alert alert-danger alert-dismissible fade show mt-2 mb-2" role="alert" style="max-width: 50%;">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    ' . $_SESSION['inc'] . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    </center>';
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <center>
                <div class="box mt-5 mb-5" style="max-width: 600px;color: white;">
                    <form action="verify.php" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" style="font-size: 19px;" class="form-label">User:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" required name="user" aria-describedby="emailHelp">
                            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" style="font-size: 19px;" class="form-label">Password:</label>
                            <input type="password" class="form-control" required name="pass" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-outline-info" style="width: 100%;font-size: 20px;">Login</button>
                    </form>
                </div>
            </center>
        </div>
    </div>
</div>

<?php
session_destroy();
?>