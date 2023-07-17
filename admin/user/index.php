<?php
require '../../config/koneksi.php';
require '../../config/config.php';
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
                    <div class="row page-title">
                        <div class="col-md-12">
                            <nav aria-label="breadcrumb" class="float-right mt-1">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Shreyu</a></li>
                                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Advanced</li>
                                </ol>
                            </nav>
                            <h4 class="mb-1 mt-0">Advanced Tables</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <p class="sub-header">
                                    <div class="row icons-list-demo">
                                        <div class="col-xl-3 col-lg-4 col-sm-6">
                                            <i class="uil uil-plus-circle" data-target="#modal_tambah" data-toggle="modal"></i>Tambah Data
                                        </div>
                                    </div>
                                    </p>
                                    <table id="basic-datatable" class="table table-striped dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $data = "SELECT * FROM user ORDER BY username DESC";
                                            $stmt = mysqli_prepare($koneksi, $data);
                                            //cek query
                                            if (!$stmt) {
                                                die('Query Error: ' . mysqli_errno($koneksi) . '-' . mysqli_error($koneksi));
                                            }
                                            mysqli_stmt_execute($stmt);

                                            $result = mysqli_stmt_get_result($stmt);

                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <tr>
                                                    <td><?= $row['username'] ?></td>
                                                    <td><?= $row['role'] ?></td>
                                                    <td><?= $row['status'] ?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="detail?id=<?= $row['id_user'] ?>" class="icon-item col-xl-3 col-lg-4 col-sm-6"><i data-feather="eye"></i><span>Details</span>
                                                                <a href="edit?id=<?= $row['id_user'] ?>" class="icon-item col-xl-3 col-lg-4 col-sm-6"><i data-feather="edit"></i><span>Edit</span>
                                                                    <a href="hapus?id=<?= $row['id_user'] ?>" class="icon-item col-xl-3 col-lg-4 col-sm-6"><i data-feather="trash"></i><span>Hapus</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php }
                                            /* tutup statement */
                                            mysqli_stmt_close($stmt);

                                            /* tutup koneksi */
                                            mysqli_close($koneksi); ?>
                                        </tbody>
                                    </table>

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>
                    <!-- end row-->

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
    <script src="<?= base_url('/node_modules/sweetalert2/sweetalert2.all.min.js'); ?>"></script>
    <script src="<?= base_url('/node_modules/sweetalert2/sweetalert2.min.js'); ?>"></script>
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
                </form>
            </div>
        </div>
    </div>
</div>
