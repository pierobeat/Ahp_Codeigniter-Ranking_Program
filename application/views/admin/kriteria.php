<?php
 	require_once(APPPATH.'views/include/header.php');
?>
<div class="col-md-12">
  <div class="card">
    <div class="card card-plain">
      <div class="content table-responsive table-full-width">
        <div class="header">
          <h4 class="title">Prioritas Kriteria Calon</h4>
        </div>
        <form class="" action="<?php echo base_url('dashboard_admin/showTabel'); ?>" method="post">
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>Kriteria A</th>
                <th class="text-center">Syarat</th>
                <th>Kriteria B</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php
        //tabel kriteria
            $this->db->from('kriteria');
            $this->db->order_by('id_kriteria','DESC');
        		$this->db->limit(1);
            $query=$this->db->get();
            $totab=$query->result();
            foreach ($totab as $key) {//foreach ambil dari tabel atas (ngambil array terakhir)
            foreach ($data_kriteria as $dk)://foreach ambil dari Controller (buat Kriteria A)
              $re = $key->id_kriteria;
              $ra = $dk->id_kriteria;
              for ($i=1; $i<=$re ; $i++) {
                $jid= ($i);
                $jo=$jid;
                $this->db->select('nama_kriteria');
                $this->db->from('kriteria');
                $this->db->where('id_kriteria',$jo);
                $query=$this->db->get();
                $totab=$query->result();
                foreach ($totab as $bc) {
              if ($i==$ra) {
              ?>
              <tr hidden>
                <td><input type="text" name="C[<?php echo $ra.$jid; ?>]" value="<?php echo $ra;?>"><?php echo $dk->nama_kriteria;?></td>
                <td><input type="text" name="W[<?php echo $ra.$jid; ?>]" value="1"> </td>
                <td><input type="text" id="" name="X[<?php echo $ra.$jid; ?>]" value="<?php echo $jo;?>"><?php echo $bc->nama_kriteria; ?></td>
                <!--input id--><td><input type="text" name="" value="<?php echo $ra.$jid; ?>"></td>
              </tr>
            <?php
             }
             else if($ra<$i){?>
               <tr>
                 <td style="font-size:15px;"><input type="text" name="C[<?php echo $ra.$jid; ?>]" value="<?php echo $ra;?>"hidden><?php echo $dk->nama_kriteria; ?></td>
                 <td><select required class="calculate form-control" id="W<?php echo $ra.$jid; ?>" class="" name="W[<?php echo $ra.$jid; ?>]">
                   <option value="">--</option>
                 <?php
                 $this->db->from('nilai');
                 $query=$this->db->get();
                 $nilt =$query->result();
                 foreach ($nilt as $keyval) { ?>
                   <option value="<?php echo $keyval->jum_nilai; ?>"><?php echo $keyval->ket_nilai; ?></option>
                 <?php } ?></select></td>
                 <td style="font-size:15px;"><input type="text" id="" name="X[<?php echo $ra.$jid; ?>]" value="<?php echo $jo;?>"hidden><?php echo $bc->nama_kriteria; ?></td>
                 <!--buat input id--><td><input type="text" id="<?php echo $ra.$jid; ?>" name="" value="<?php echo $ra.$jid; ?>"hidden></td>
                <script type="text/javascript">
               	$(document).ready(function(){
               	$('.calculate').bind("change",function(e){
               		var st = parseFloat($('#W<?php echo $ra.$jid; ?>').val()) || 0;
               		var value = 1 / st;
               		if (!isNaN(value) && value !== Infinity) {
               				$('#W<?php echo $jid.$ra; ?>').val(value);
               		}
               	});
               	});
               	</script>
               </tr>
            <?php
          } else{
            ?>
              <tr hidden>
                <td><input type="text" name="C[<?php echo $ra.$jid; ?>]" value="<?php echo $ra; ?>"></td>
                <td><input id="W<?php echo $ra.$jid; ?>" name="W[<?php echo $ra.$jid; ?>]" type="text" value=""> </td>
                <td><input type="text" name="X[<?php echo $ra.$jid; ?>]" value="<?php echo $jid; ?>"></td>
                <td><input type="text" name="" value="<?php echo $ra.$jid; ?>"></td>
              </tr>
        <?php }
            }
          }
          endforeach;  } ?>
          <tr>
            <td colspan="4"><button type="submit" class="btn btn-fill btn-info"><i class="pe-7s-calculator"></i>&nbsp&nbspKalkulasi</button></td>
          </tr>
          </tbody>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
 	require_once(APPPATH.'views/include/footer.php');
?>
