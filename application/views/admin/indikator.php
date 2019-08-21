<?php
 	require_once(APPPATH.'views/include/header.php');
?>
<div class="col-md-12">
  <div class="card">
    <div class="card card-plain">
      <div class="content table-responsive table-full-width">
          <table class="table table-hover table-striped">
            <div class="header">
              <h4 class="title">Indikator Kriteria Calon</h4>
            </div>
          <tr>
            <td><b>Nama Indikator</b></td>
            <td><b>Nilai</b></td>
            <td class="text-center"><b>Prioritas Indikator</b></td>
          </tr>
          <?php if ($data_kriteria>0): ?>
          <?php
          $num = 1;
          foreach ($data_kriteria as $dk){
            ?>
              <tr>
                <td hidden><?php echo $dk->id_kriteria; ?></td>
                <td style="font-size:15px;"><?php echo $dk->nama_kriteria; ?></td>
                <td><?php echo round($dk->jumlah_kriteria,3); ?></td>
                <td class="text-center"><?php echo $num; ?></td>
              </tr>
              <?php $num++;
            }?>
          </table>
            <?php else: ?>
              <tr>
                <td colspan="4"><center>NO DATA DEFAULT, Buat Kriteria Baru <a href="<?php echo site_url('HR/plusid/'); ?>">Disini</a></center></td>
              </tr>
            <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<?php
 	require_once(APPPATH.'views/include/footer.php');
?>

<!-- <script type="text/javascript">
$('#manual-ajax').click(function(event) {
event.preventDefault();
this.blur(); // Manually remove focus from clicked link.
$.get(this.href, function(html) {
  $(html).appendTo('body').modal();
});
});
</script> -->
