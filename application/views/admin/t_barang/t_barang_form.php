<form action="<?php echo $action; ?>" method="post">
    
	    <div class="form-group">
            <label for="varchar">Nama Barang <?php echo form_error('nama_barang') ?></label>
            <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kategori <?php echo form_error('kategori') ?></label>
            <?php $color2 = array("Smart home series ( original )","Speaker Bluetooth Original","Air Purifier and Humidifier","Baby And Kids","ACC Action Cam","Headset Earphone TWS Orginal","Sepeda Lipat dan Scooter Dewasa");?>
             <select class="form-control" name="kategori" id="kategori" >
                <option>pilih</option>
                <?php for ($i=0; $i < count($color2); $i++) { ?>
                    <option value="<?= $color2[$i];?>" <?php echo ($kategori==$color2[$i]) ? "Selected" : "" ; ?>><?= $color2[$i];?></option>
                <?php }?>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Harga <?php echo form_error('harga') ?></label>
            <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Stok <?php echo form_error('stok') ?></label>
            <input type="number" class="form-control" name="stok" id="stok" placeholder="Stok" value="<?php echo $stok; ?>" />
        </div>
	    <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/t_barang') ?>" class="btn btn-default">Cancel</a>
	</form>