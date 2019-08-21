<?php
 	require_once(APPPATH.'views/include/header.php');
?>
<table class="table" border="0">
  <tr>
    <td>
      <a class="btn-fill btn-info btn" href="<?php echo site_url('dashboard_admin/Addperson')?>" type="button"><i class="pe-7s-plus"></i>   Tambah</a>
    </td>
  </tr>
</table>
<div class="card card-plain">
  <div class="content table-responsive table-full-width">
      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <td class="text-center"><b>Nama</b></td>
            <td class="text-center"><b>Status Nilai</b></td>
            <td class="text-center"><b>Aksi</b></td>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($karyawan as $qar) { ?>
            <tr>
              <td style="font-size:16px;" class="text-center"><?php echo $qar->nama_karyawan; ?></td>
              <?php if ($qar->nilai != 0){ ?>
                <td class="bg-success text-center" ><a href="#" id="hasilK<?php echo $qar->id_karyawan ?>">Sudah Dinilai</a></td>
                <td>
                <a class="btn btn-fill btn-danger btn-block" href="<?php echo site_url('dashboard_admin/delKary/'.$qar->id_karyawan); ?>" title="Hapus Data Karyawan" type="button"><i class="pe-7s-close"></i> Hapus</a>
              </td>
              <?php } else{ ?>
                <td class="bg-danger text-center" >Belum Dinilai</td>
                <td>
                  <a class="btn btn-block btn-fill btn-primary btUB" data-href="<?php echo site_url('dashboard_admin/rankn/'.$qar->id_karyawan); ?>" title="Nilai Karyawan" type="button" ><i class="pe-7s-graph1"></i> Nilai</a>
                  <a class="btn btn-fill btn-danger btn-block" href="<?php echo site_url('dashboard_admin/delKary/'.$qar->id_karyawan); ?>" title="Hapus Data Karyawan" type="button"><i class="pe-7s-close"></i> Hapus</a>
                </td>
              <?php } ?>
            </tr>
            <tr id="infonil<?php echo $qar->id_karyawan ?>" hidden>
              <td colspan="2">
                <?php
                $this->db->where('id_karyawan',$qar->id_karyawan);
                $this->db->from('detail_karyawan');
                $deta = $this->db->get();
                $resD = $deta->result();
                foreach ($resD as $deK): ?>
                <?php
                $this->db->where('id_kriteria',$deK->id_kriteria);
                $this->db->from('kriteria');
                $kri = $this->db->get();
                $hasK = $kri->result();
                foreach ($hasK as $hK): ?>
                <?php echo $hK->nama_kriteria; ?><br>
              <?php endforeach; ?>
              <?php endforeach; ?>
            </td>
              <td colspan="3">
                <?php
                $this->db->where('id_karyawan',$qar->id_karyawan);
                $this->db->from('detail_karyawan');
                $deta = $this->db->get();
                $resD = $deta->result();
                foreach ($resD as $deK): ?>
                <?php
                $this->db->where('id_kriteria',$deK->id_kriteria);
                $this->db->from('kriteria');
                $kri = $this->db->get();
                $hasK = $kri->result();
                foreach ($hasK as $hK): ?>
                <?php echo $deK->nilai_kriteria; ?><br>
                <?php endforeach; ?>
                <?php endforeach; ?>
            </td>
            <td>
              <a class="btn btn-info btn-fill btn-block btUB" data-href="<?php echo site_url('dashboard_admin/rank/'.$qar->id_karyawan) ?>" >Ubah</a>
            </td>
          </tr>
          <?php }?>
        </tbody>
    </table>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    <?php foreach ($karyawan as $b): ?>
      $("#hasilK<?php echo $b->id_karyawan; ?>").click(function(event){
        event.preventDefault();
        $("#infonil<?php echo $b->id_karyawan; ?>").toggle();
      });
    <?php endforeach; ?>
  });
</script>
<script type="text/javascript">
$(document).ready(function(){
  $(".btUB").click(function(){
    var link = $(this).data("href");
    $('#ubahModal').modal("show");
    $("#ubahModal .modal-body").load(link);
  });
});
</script>

  <script type="text/javascript">
    $(document).ready(function(){
          $('#clk').load("<?php echo site_url('dashboard_admin/karyawanNJ/'); ?>");
    });
  </script>
  <div id="clk" class="card">
<?php
 	require_once(APPPATH.'views/include/footer.php');
?>
