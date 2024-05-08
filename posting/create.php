<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$mahasiswa = mysqli_query($connection, "SELECT id,kategori_name FROM kategori");
$matkul = mysqli_query($connection, "SELECT id,username FROM petugas");
$result = mysqli_query($connection, "SELECT MAX(id) id FROM post");
if (!$result) { 
   /* the query failed, report an error */
} else {
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $lastid = $row['id'] +1;
}
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Data</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./store.php" method="POST">
            <table cellpadding="8" class="w-100">
              <tr>
                <td>Kategori</td>
                <td>
                  <select class="form-control" name="nim" id="nim" required>
                    <option value="">--Pilih Kategori--</option>
                    <?php
                    while ($r = mysqli_fetch_array($mahasiswa)) :
                    ?>
                      <option value="<?= $r['id'] ?>"><?= $r['kategori_name'] ?></option>
                    <?php
                    endwhile;
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Petugas</td>
                <td>
                  <select class="form-control" name="matkul" id="matkul" required>
                    <option value="">--Pilih Petugas--</option>
                    <?php
                    while ($r = mysqli_fetch_array($matkul)) :
                    ?>
                      <option value="<?= $r['id'] ?>"><?= $r['username'] ?></option>
                    <?php
                    endwhile;
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>id</td>
                <td><input class="form-control" readonly type="text" name="id" value="<?= $lastid ?>"></td>
              </tr>
              <tr>
                <td>Judul</td>
                <td>
                  <input class="form-control" type="text" name="judul">
              </td>
              </tr>
              <tr>
                <td>Isi</td>
                <!-- <td><input class="form-control" type="text" name="isi"></td> -->
                <td>
                <textarea id="isi" name="isi" rows="4" cols="50"></textarea>

                </td>
              </tr>
              <tr>
                <td>status</td>
                <td><input class="form-control" type="text" name="status"></td>
              </tr>
              <tr>
                <td>
                  <input class="btn btn-primary" type="submit" name="proses" value="Simpan">
                  <input class="btn btn-danger" type="reset" name="batal" value="Bersihkan">
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>