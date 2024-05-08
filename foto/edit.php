<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$foto = mysqli_query($connection, "SELECT id,galery_id FROM foto");

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
    <h1>Ubah Foto</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./update.php" method="POST" enctype="multipart/form-data">
            <table cellpadding="8" class="w-100">
              <tr>
                <td>Posting</td>
                <td>
                  <select class="form-control" name="file" id="file" required>
                    <option value="">--Pilih Posting--</option>
                    <?php
                    while ($r = mysqli_fetch_array($foto)) :
                    ?>
                    
                      <option value="<?= $r['id'] ?>"><?= $r['galery_id'] ?></option>
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

            <?php ?>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>