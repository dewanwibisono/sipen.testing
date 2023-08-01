<?php
require '../../config/koneksi.php';
require '../../config/config.php';
// session_start();
?>
<?php

function gentoken()
{
    return bin2hex(rand(100000, 999999));
}

function bikintoken()
{
    $token = gentoken();
    $_SESSION['csrf_token'] = $token;
    $_SESSION['csrf_token_time'] = time();
    return $token;
}

function bikintag()
{
    $tokennya = bikintoken();
    return '<input type="hidden" name="csrf_token" value="' . $tokennya . '">';
}

$tokennya = bikintoken();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../templates/head.php'; ?>
</head>

<body>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <?php include '../templates/header.php'; ?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include '../templates/sidebar.php'; ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    <?php
                    if (empty($_GET["page"])) {
                        include "tampil-data.php";
                    } elseif ($_GET['page'] == 'tambah') {
                        include "tambah.php";
                    } elseif ($_GET['page'] == 'edit') {
                        include "edit.php";
                    }
                    ?>
                </div> <!-- container-fluid -->

            </div> <!-- content -->
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

            <!-- Footer Start -->
            <?php include '../templates/footer.php'; ?>
            <!-- end Footer -->

            <!-- -- Script -- -->
            <?php include '../templates/script.php'; ?>
            <!-- -- End Script -- -->
        </div>
</body>

</html>

<!-- Modal Popup untuk tambah-->
<div id="modal_tambah" method="POST" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span>
                    <h3>Tambahkan Data Pengguna</h3>
                </span>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <div class="modal-body">
                <form action="tambah.php" method="POST" name="modal_popup" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" autocomplete="off" maxlength="10" required />
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" autocomplete="off" required />
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <select data-plugin="customselect" class="form-control" id="role" name="role" data-placeholder="Pilih Role">
                            <option></option>
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <input type="submit" id="simpan" class="btn btn-soft-success btn-submit" name="simpan" value="simpan"></input>
                        <button type="reset" class="btn btn-soft-danger btn-reset" data-dismiss="modal" aria-hidden="true">Batal</button>
                    </div>
                    <?php echo bikintag(); ?>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Popup untuk Edit Data -->
<div id="modal_edit" method="POST" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" id="modal_edit">
                <div class="modal-body">
                    <div id="modal-edit">
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" name="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
