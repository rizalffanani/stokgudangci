<form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Prov <?php echo form_error('nama_prov') ?></label>
            <input type="text" class="form-control" name="nama_prov" id="nama_prov" placeholder="Nama Prov" value="<?php echo $nama_prov; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Satuan <?php echo form_error('satuan') ?></label>
            <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan" value="<?php echo $satuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Eselon1 <?php echo form_error('eselon1') ?></label>
            <input type="text" class="form-control" name="eselon1" id="eselon1" placeholder="Eselon1" value="<?php echo $eselon1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Eselon2 <?php echo form_error('eselon2') ?></label>
            <input type="text" class="form-control" name="eselon2" id="eselon2" placeholder="Eselon2" value="<?php echo $eselon2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Eselon3 <?php echo form_error('golongan4') ?></label>
            <input type="text" class="form-control" name="golongan4" id="golongan4" placeholder="Golongan4" value="<?php echo $golongan4; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Eselon4 <?php echo form_error('golongan321') ?></label>
            <input type="text" class="form-control" name="golongan321" id="golongan321" placeholder="Golongan321" value="<?php echo $golongan321; ?>" />
        </div>
	    <input type="hidden" name="id_prov" value="<?php echo $id_prov; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/tbl_provinsi') ?>" class="btn btn-default">Cancel</a>
	</form>