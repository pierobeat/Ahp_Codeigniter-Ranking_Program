<?php
 	require_once(APPPATH.'views/include/header.php');
?>
<div class="col-md-12">
  <div class="card">
    <div class="card card-plain">
      <div class="content table-responsive table-full-width">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 center text-center">
                    <h1 class="page-header">Pusat Penilaian</h1>
                    Selamat Datang <b><?php echo $this->session->userdata("nama"); ?></b>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
  require_once(APPPATH.'views/include/footer.php');
?>
