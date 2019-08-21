<?php
 	require_once(APPPATH.'views/include/header.php');
?>
<div id="clm" class="card card-plain canvas_div_pdf">
  <div class="content table-responsive table-full-width">
    <div class="header">
      <h4 class="title">Tabel Ranking</h4>
      <p class="category"></p>
    </div>
    <table class="table table-hover table-striped" id="printTAB">
      <thead>
        <tr>
          <th>Kandidat</th>
          <th>Nilai Total</th>
          <th>Ranking</th>
        </tr>
      </thead>
      <tbody>
    <?php
    $jumlahKaryawan = count($hasil_akhir);
    $rank = 1;
    foreach ($hasil_akhir as $fI):
      ?>
        <?php if ($fI->final_nilai==0.000000) { ?>
          <tr>
            <td><?php echo $fI->nama_karyawan; ?></td>
            <td><?php echo 'Belum Dianalisa'; ?></td>
            <td><?php echo 'Belum Dianalisa'; ?></td>
            <td><?php echo 'Belum Selesai'; ?></td>
            <td><?php echo 'N/A'; ?></td>
          </tr>
        <?php } else { ?>
          <tr>
            <td><?php echo $fI->nama_karyawan; ?></td>
            <td id="htun"><?php echo $fI->final_nilai; ?></td>
            <td><?php echo $rank; ?></td>
          </tr>
        <?php } ?>

    <?php
      $rank++;
      endforeach; ?>
    </tbody>
  </table>
  </div>
</div>

<?php require_once(APPPATH.'views/include/footer.php'); ?>
