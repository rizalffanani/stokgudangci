<form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Tamu <?php echo form_error('nama_tamu') ?></label>
            <input type="text" class="form-control" name="nama_tamu" id="nama_tamu" placeholder="Nama Tamu" value="<?php echo $nama_tamu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Daftar Tamu <?php echo form_error('daftar_tamu') ?></label>
            <input type="text" class="form-control" name="daftar_tamu" id="daftar_tamu" placeholder="Daftar Tamu" value="<?php echo $daftar_tamu; ?>" />
        </div>
	    <input type="hidden" name="id_tamu" value="<?php echo $id_tamu; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/tbl_tamu') ?>" class="btn btn-default">Cancel</a>
	</form>