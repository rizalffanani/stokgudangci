<form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Hotel <?php echo form_error('nama_hotel') ?></label>
            <input type="text" class="form-control" name="nama_hotel" id="nama_hotel" placeholder="Nama Hotel" value="<?php echo $nama_hotel; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kota <?php echo form_error('kota') ?></label>
            <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo $kota; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Telepon <?php echo form_error('telepon') ?></label>
            <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Telepon" value="<?php echo $telepon; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Provinsi <?php echo form_error('id_prov') ?></label>
            <?php echo cmb_dinamis('id_prov', 'tbl_provinsi', 'nama_prov', 'id_prov', $id_prov) ?>
        </div>
	    <div class="form-group">
            <label for="varchar">Confirm <?php echo form_error('confirm') ?></label>
            <input type="text" class="form-control" name="confirm" id="confirm" placeholder="Confirm" value="<?php echo $confirm; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Group <?php echo form_error('group') ?></label>
            <input type="text" class="form-control" name="group" id="group" placeholder="Group" value="<?php echo $group; ?>" />
        </div>
	    <input type="hidden" name="id_hotel" value="<?php echo $id_hotel; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/tbl_hotel') ?>" class="btn btn-default">Cancel</a>
	</form>