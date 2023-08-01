<?php
require '../../config/config.php';
require '../../config/koneksi.php';
session_start();

$id_user = $_REQUEST['id_user'];

$result = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");
while ($data = mysqli_fetch_assoc($result)) {
?>

    <form method="post" id="modal_edit" action="edit.php" name="modal_popup" enctype="multipart/form-data">
        <input type=" hidden" name="id_user" id="id_user" readonly value="<?= $id_user; ?>" />
        <div class="form-group" style="padding-bottom: 20px;">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= $username; ?>" required />
        </div>
        <div class="form-group" style="padding-bottom: 20px;">
            <label for="password">Password</label>
            <input type="text" name="password" id="password" class="form-control" value="<?= $password; ?>" required />
        </div>
        <div class="form-group" style="padding-bottom: 20px;">
            <label for="jenis">Role</label>
            <select class="form-select" id="role" name="role" required>
                <option value="Admin" <?php if ($data['role'] == "Admin") {
                                            echo "selected";
                                        } ?>>Admin</option>
                <option value="Petugas" <?php if ($data['role'] == "Petugas") {
                                            echo "selected";
                                        } ?>>Petugas</option>
            </select>
        </div>
    </form>

<?php
}
?>
