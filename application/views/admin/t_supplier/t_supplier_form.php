<form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Nama Supplier <?php echo form_error('nama_sup') ?></label>
            <input type="text" class="form-control" name="nama_sup" id="nama_sup" placeholder="Nama Sup" value="<?php echo $nama_sup; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Telepon <?php echo form_error('tlp_sup') ?></label>
            <input type="number" class="form-control" name="tlp_sup" id="tlp_sup" placeholder="Tlp Sup" value="<?php echo $tlp_sup; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email_sup') ?></label>
            <input type="email" class="form-control" name="email_sup" id="email_sup" placeholder="Email Sup" value="<?php echo $email_sup; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat_sup') ?></label>
            <input type="text" class="form-control" name="alamat_sup" id="alamat_sup" placeholder="Alamat Sup" value="<?php echo $alamat_sup; ?>" />
        </div>
	    <input type="hidden" name="id_supplier" value="<?php echo $id_supplier; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/t_supplier') ?>" class="btn btn-default">Cancel</a>
	</form>