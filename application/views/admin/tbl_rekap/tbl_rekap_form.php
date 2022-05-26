<form action="<?php echo $action; ?>" method="post">
        <input type="hidden" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo date('Y-m-d H:i:s'); ?>" />
        <input type="hidden" class="form-control" name="by" id="by" placeholder="By" value="<?php echo $this->session->userdata("id");; ?>" />
        <input type="hidden" class="form-control" name="date" id="date" placeholder="Date" value="<?php echo date('Y-m-d'); ?>" />
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="varchar">No Spt <?php echo form_error('nospt') ?></label>
                    <input type="text" class="form-control" name="nospt" id="nospt" placeholder="Nospt" value="<?php echo $nospt; ?>" required/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="varchar">Mak <?php echo form_error('mak') ?></label>
                    <input type="number" class="form-control" name="mak" id="mak" placeholder="Mak" value="<?php echo $mak; ?>" required/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="int">Hotel <?php echo form_error('id_hotel') ?></label>
                    <?php echo cmb_dinamis('id_hotel', 'tbl_hotel', 'nama_hotel', 'id_hotel', @$id_hotel) ?>
                </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Jumlah Kamar</label>
                <input type="number" class="form-control" min="0" onchange="panggil(this.value)" name="jmlkmr" id="jmlkmr" value="<?php echo @$jmlkmr; ?>" placeholder="1" required <?php if(@$jmlkmr){ echo"readonly";} ?>/>
              </div>
            </div>
        </div>
        <?php if(@$jmlkmr){ foreach (@$datas as $users){?>
        <div class="row" id="novcr">
            <input type="hidden" name="novcr[]" value="<?php echo $users->novcr; ?>" required/>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama_tamu[]" id="nama_tamu" placeholder="Nama" value="<?php echo $users->nama_tamu; ?>" required/>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Pagu</label>
                <select name="golongan[]" id="golongan" class="form-control" required>
                    <option value="">pilih</option>
                    <option value="Es I" <?php echo ($users->golongan=="Es I") ? "Selected" : "" ; ?>>Eselon I</option>
                    <option value="Es II" <?php echo ($users->golongan=="Es II") ? "Selected" : "" ; ?>>Eselon II</option>
                    <option value="Gol IV" <?php echo ($users->golongan=="Gol IV") ? "Selected" : "" ; ?>>GOLONGAN IV</option>
                    <option value="Gol III" <?php echo ($users->golongan=="Gol III") ? "Selected" : "" ; ?>>GOLONGAN III</option>
                    <option value="Gol II" <?php echo ($users->golongan=="Gol II") ? "Selected" : "" ; ?>>GOLONGAN II</option>
                    <option value="Gol I" <?php echo ($users->golongan=="Gol I") ? "Selected" : "" ; ?>>GOLONGAN I</option>
                </select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Tipe Kamar</label>
                <input type="text" class="form-control" name="type_room[]" id="type_room" placeholder="Tipe" value="<?php echo $users->type_room; ?>" required/>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Harga Kamar</label>
                <input type="number" class="form-control" name="harga_kamar[]" id="harga_kamar" placeholder="Harga" value="<?php echo $users->harga_kamar; ?>" required/>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Check In</label>
                <input type="date" class="form-control" name="checkin[]" id="checkin" placeholder="Checkin" value="<?php echo $users->checkin; ?>" required/>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Check Out</label>
                <input type="date" class="form-control" name="checkout[]" id="checkout" placeholder="Checkout" value="<?php echo $users->checkout; ?>" required/>
              </div>
            </div>
        </div>
        <?php }}else{ ?>
        <div id="rowe"></div>
        <?php } ?>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="total_tagihan" id="total_tagihan" placeholder="Total Tagihan" value="<?php echo $total_tagihan; ?>" required readonly/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="service_fee" id="service_fee" placeholder="Service Fee" value="<?php echo $service_fee; ?>" required readonly/>
                </div>
            </div>
        </div>
	    
	    
	    <input type="hidden" name="id_rekap" value="<?php echo $id_rekap; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/tbl_rekap') ?>" class="btn btn-default">Cancel</a>
	</form>
	<script type="text/javascript">
      function panggil(a) {
        $.ajax({
            type:"POST",
            url:"<?=site_url('admin/tbl_rekap/panggil');?>",  
            data : {panggil:a},
            success: function(data){   
              document.getElementById('rowe').innerHTML = data
            }  
        });
      }
      function sum(a) {
            var jml = document.getElementById('jmlkmr').value;
            var ttl = 0;
            for (let i = 0; i < jml; i++) {
                var c = document.getElementById("harga_kamar"+i).value;
                if(!c){ c=0; }
              ttl = parseInt(ttl) + parseInt(c);
            }
          document.getElementById('total_tagihan').value = ttl;
          document.getElementById('service_fee').value = (ttl * 10)/100;
      }
    </script>