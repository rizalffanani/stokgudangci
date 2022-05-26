<form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="date">Tanggal <?php echo form_error('tgl_bm') ?></label>
            <input type="date" class="form-control" name="tgl_bm" id="tgl_bm" placeholder="Tgl Bm" value="<?php echo $tgl_bm; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Supplier<?php echo form_error('id_supplier') ?></label>
            <?php echo cmb_dinamis_select2('id_supplier', 't_supplier', 'nama_sup', 'id_supplier', @$id_supplier, 'tes') ?>
        </div>
        <div class="form-group">
            <label for="int">Nama Barang <?php echo form_error('id_barang') ?></label>
            <?php echo cmb_dinamis_select2('id_barang', 't_barang', 'nama_barang', 'id_barang', @$id_barang, 'getData') ?>
        </div>
	    <div class="form-group">
            <label for="varchar">Jumlah <?php echo form_error('jml_bm') ?></label>
            <input type="number" class="form-control" name="jml_bm" id="jml_bm" placeholder="Jumlah" value="<?php echo $jml_bm; ?>" onkeyup="total(this.value)" onchange="total(this.value)" min="1"/>
        </div>
	    <div class="form-group">
            <label for="varchar">Harga <?php echo form_error('harga_bm') ?></label>
            <input type="text" class="form-control" name="harga_bm" id="harga_bm" placeholder="Harga" value="<?php echo $harga_bm; ?>" readonly/>
        </div>
	    <div class="form-group">
            <label for="varchar">Sub Total <?php echo form_error('sub_total_bm') ?></label>
            <input type="number" class="form-control" name="sub_total_bm" id="sub_total_bm" placeholder="Sub Total" value="<?php echo $sub_total_bm; ?>" readonly/>
        </div>
	    <input type="hidden" name="id_bm" value="<?php echo $id_bm; ?>" /> 
        <input type="hidden" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/t_barang_masuk') ?>" class="btn btn-default">Cancel</a>
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
                    document.getElementById("harga_bm").value = row[0];
                    document.getElementById("nama_barang").value = row[1];
                }  
            });
        };
    }
    function total(jumlah) {
        var harga = document.getElementById("harga_bm").value;
        document.getElementById("sub_total_bm").value = parseInt(jumlah) * parseInt(harga)
    }
    function tes(a) {
        return a;
    }
</script>