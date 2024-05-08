<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$galery = mysqli_query($connection, "SELECT id,post_id FROM galery");

$result = mysqli_query($connection, "SELECT MAX(id) id FROM foto");
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
          <form action="./store.php" method="POST" enctype="multipart/form-data">
            <table cellpadding="8" class="w-100">
              <tr>
                <td>Posting</td>
                <td>
                  <select class="form-control" name="galery" id="galery" required>
                    <option value="">--Pilih Posting--</option>
                    <?php
                    while ($r = mysqli_fetch_array($galery)) :
                    ?>
                    
                      <option value="<?= $r['id'] ?>"><?= $r['post_id'] ?></option>
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
                <td>foto</td>
                <td>
                  <input type="file" name="fileToUpload" id="fileToUpload" required="required">
				<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p></td>
              </tr>
              <tr>
                <td>judul</td>
                <td><input class="form-control" type="text" name="judul" ></td>
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