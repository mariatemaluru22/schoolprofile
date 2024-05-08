<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$nidn = $_GET['nidn'];
$query = mysqli_query($connection, "SELECT * FROM kategori WHERE id='$nidn'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Kategori</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./update.php" method="post">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <input type="hidden" name="nidn" value="<?= $row['id'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>ID</td>
                  <td><input class="form-control" type="number" name="nidn" size="20" required value="<?= $row['id'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Judul Kategori</td>
                  <td><input class="form-control" type="text" name="kategori" size="20" required value="<?= $row['kategori_name'] ?>"></td>
                </tr>
                  <td>
                    <input class="btn btn-primary d-inline" type="submit" name="proses" value="Ubah">
                    <a href="./index.php" class="btn btn-danger ml-1">Batal</a>
                  <td>
                </tr>
              </table>

            <?php } ?>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>