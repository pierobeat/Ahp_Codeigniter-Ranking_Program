<?php
 	require_once(APPPATH.'views/include/header.php');
?>
<div class="col-md-12">
  <div class="card">
    <div class="card card-plain">
        <div class="header">
          <h4 class="title">Tambah Kandidat</h4>
        </div>
        <div class="content table-responsive table-full-width">
          <form action="<?php echo site_url('dashboard_admin/insertKaryawan')?>" method="post">
          <?php foreach($data as $idK){
            // $xpl = explode("A",$idK->id_karyawan);
            // $ret = $xpl[1]+1;
            // $rename = "A".($ret);
            ?>
          <table class="table table-hover table-striped">
            <tr>
              <td><label class="control-label" for="id_kriteria">ID Kriteria</label></td>
              <td><input class="form-control" type="text" id="id_karyawan" name="id_karyawan" value="<?php echo $idK->id_karyawan+1; ?>" readonly></td>
            </tr>
            <tr>
              <td><label class="control-label" for="nama_karyawan">Nama</label></td>
              <td><input class="form-control" type="text" id="nama_karyawan" name="nama_karyawan" value=""></td>
            <tr>
              <td colspan="2"><button class="btn btn-fill btn-info" type="submit">Simpan</button></td>
            </tr>
          </table>
          </form>
          <script>
          $(document).ready(function () {
              $('#datelahir').datepicker({
                format: 'yyyy-mm-dd',
              });
              $('#datemasuk').datepicker({
                format: 'yyyy-mm-dd',
                maxDate: 'today',
              });
          });
          </script>
      </div>
    </div>
  </div>
</div>
    <?php } ?>
<?php require_once(APPPATH.'views/include/footer.php'); ?>
