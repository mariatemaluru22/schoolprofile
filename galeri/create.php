<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$post = mysqli_query($connection, "SELECT id,judul FROM post");
$result = mysqli_query($connection, "SELECT MAX(id) id FROM galery");
if (!$result) { 
   /* the query failed, report an error */
} else {
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $lastid = $row['id'] +1;
}
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Nilai</h1>
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
                <td>Posting</td>
                <td>
                  <select class="form-control" name="post_id" id="post_id" required>
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
                <td>id</td>
                <td><input class="form-control" readonly type="text" name="id" value="<?= $lastid ?>"></td>
              </tr>
              <tr>
                <td>position</td>
                <td><input class="form-control" type="number" name="position" ></td>
              </tr>
              <tr>
                <td>status</td>
               ><td> <select class="form-control" name="status" id="status" required>
                    <option value="">--Pilih Status--</option>
                    <option value="1">Aktif</option>
                    <option value="2">Tidak Aktif</option>
                
                  </select></td>
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