<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$nidn = $_GET['id'];
$post = mysqli_query($connection, "SELECT id,judul FROM post");

$query = mysqli_query($connection, " SELECT galery.id, galery.post_id, post.judul, galery.position, galery.status FROM galery JOIN post ON post.id = galery.post_id WHERE galery.id = '$nidn'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Galeri</h1>
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
                <td>id</td>
                <td><input class="form-control" type="text" name="id" value="<?= $row['id'] ?>"></td>
              </tr>
              <tr>
                <td>Judul</td>
                <td>
                <select class="form-control" name="post_id" id="post_id" required>
                    <option  value="<?= $row['post_id'] ?>"><?= $row['judul'] ?></option>
                    <option value="">--Pilih Posting--</option>
                    
                    <?php
                    while ($r = mysqli_fetch_array($post)) :
                    ?>
                      <option value="<?= $r['id'] ?>"><?= $r['judul'] ?></option>
                    <?php
                    endwhile;
                    ?>
                  </select>
              </td>
              </tr>
              <tr>
                <td>position</td>
                <!-- <td><input class="form-control" type="text" name="isi"></td> -->
                <td>
                <input class="form-control" type="text" name="position" value="<?= $row['position'] ?>">


                </td>
              </tr>
              <tr>
                <td>status</td>
                <td><input class="form-control" type="text" name="status" value="<?= $row['status'] ?>"></td>
              </tr>
              <tr>
                <td>
                  <input class="btn btn-primary" type="submit" name="proses" value="Simpan">
                  <input class="btn btn-danger" type="reset" name="batal" value="Bersihkan">
                </td>
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