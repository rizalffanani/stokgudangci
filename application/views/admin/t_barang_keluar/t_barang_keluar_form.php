<form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="date">Tanggal <?php echo form_error('tgl_bk') ?></label>
            <input type="date" class="form-control" name="tgl_bk" id="tgl_bk" placeholder="Tgl Bk" value="<?php echo $tgl_bk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nama Barang <?php echo form_error('id_barang') ?></label>
            <?php echo cmb_dinamis_select2('id_barang', 't_barang', 'nama_barang', 'id_barang', @$id_barang, 'getData') ?>
        </div>
	    <div class="form-group">
            <label for="varchar">Jumlah <?php echo form_error('jml_bk') ?></label>
            <input type="number" class="form-control" name="jml_bk" id="jml_bk" placeholder="Jml Bk" value="<?php echo $jml_bk; ?>" onkeyup="total(this.value)" onchange="total(this.value)" min="1"/>
        </div>
	    <div class="form-group">
            <label for="varchar">Harga <?php echo form_error('harga_bk') ?></label>
            <input type="text" class="form-control" name="harga_bk" id="harga_bk" placeholder="Harga Bk" value="<?php echo $harga_bk; ?>" readonly/>
        </div>
	    <div class="form-group">
            <label for="varchar">Sub Total<?php echo form_error('sub_total_bk') ?></label>
            <input type="text" class="form-control" name="sub_total_bk" id="sub_total_bk" placeholder="Sub Total Bk" value="<?php echo $sub_total_bk; ?>" readonly/>
        </div>
        <input type="hidden" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" />    
	    <input type="hidden" name="id_bk" value="<?php echo $id_bk; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/t_barang_keluar') ?>" class="btn btn-default">Cancel</a>
	</form>


<script type="text/javascript">
    function getData(a) {
        if (a>0) {
            $.ajax({
                type:"POST",
                url:"<?=site_url('admin/t_barang_masuk/getHarga');?>", 
                data : {id_barang:a},  
                success: function(data){   
                    row = data.split(":");
                    document.getElementById("harga_bk").value = row[0];
                    document.getElementById("nama_barang").value = row[1];
                }  
            });
        };
    }
    function total(jumlah) {
        var harga = document.getElementById("harga_bk").value;
        document.getElementById("sub_total_bk").value = parseInt(jumlah) * parseInt(harga)
    }
    function tes(a) {
        return a;
    }
</script>