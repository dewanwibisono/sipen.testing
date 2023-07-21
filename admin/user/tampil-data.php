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
                                                <a href="hapus?id=<?= $row['id_user'] ?>&csrf_token=<?= $tokennya ?>" class="icon-item col-xl-3 col-lg-4 col-sm-6"><i data-feather="trash"></i><span>Hapus</span>
                                    </div>
                                </td>
                            </tr>
                        <?php }
                        /* tutup statement */
                        mysqli_stmt_close($stmt);

                        /* tutup koneksi */
                        mysqli_close($koneksi); ?>
                        <script src="<?= base_url('assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js'); ?>"></script>
                        <script src="<?= base_url('assets/node_modules/sweetalert2/dist/sweetalert2.min.js'); ?>"></script>
                        <!-- jika ada session sukses maka tampilkan sweet alert dengan pesan yang telah di set di dalam session sukses  -->
                        <?php if (@$_SESSION['sukses']) { ?>
                            <script>
                                <?php echo $_SESSION['sukses']; ?>
                                $('#simpan').on('click', function(s) {
                                    // s.preventDefault();
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'Data Tersimpan',
                                        showConfirmButton: true,
                                        timer: 10000
                                    })

                                })
                            </script>
                            <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
                        <?php unset($_SESSION['sukses']);
                        } ?>
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->
