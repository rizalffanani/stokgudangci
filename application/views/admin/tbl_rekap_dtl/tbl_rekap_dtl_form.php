<form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Rekap <?php echo form_error('id_rekap') ?></label>
            <input type="text" class="form-control" name="id_rekap" id="id_rekap" placeholder="Id Rekap" value="<?php echo $id_rekap; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Golongan <?php echo form_error('golongan') ?></label>
            <input type="text" class="form-control" name="golongan" id="golongan" placeholder="Golongan" value="<?php echo $golongan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pagu <?php echo form_error('pagu') ?></label>
            <input type="text" class="form-control" name="pagu" id="pagu" placeholder="Pagu" value="<?php echo $pagu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Tamu <?php echo form_error('nama_tamu') ?></label>
            <input type="text" class="form-control" name="nama_tamu" id="nama_tamu" placeholder="Nama Tamu" value="<?php echo $nama_tamu; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Checkin <?php echo form_error('checkin') ?></label>
            <input type="text" class="form-control" name="checkin" id="checkin" placeholder="Checkin" value="<?php echo $checkin; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Checkout <?php echo form_error('checkout') ?></label>
            <input type="text" class="form-control" name="checkout" id="checkout" placeholder="Checkout" value="<?php echo $checkout; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Type Room <?php echo form_error('type_room') ?></label>
            <input type="text" class="form-control" name="type_room" id="type_room" placeholder="Type Room" value="<?php echo $type_room; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Harga Kamar <?php echo form_error('harga_kamar') ?></label>
            <input type="text" class="form-control" name="harga_kamar" id="harga_kamar" placeholder="Harga Kamar" value="<?php echo $harga_kamar; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tagihan <?php echo form_error('tagihan') ?></label>
            <input type="text" class="form-control" name="tagihan" id="tagihan" placeholder="Tagihan" value="<?php echo $tagihan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Service Fee <?php echo form_error('service_fee') ?></label>
            <input type="text" class="form-control" name="service_fee" id="service_fee" placeholder="Service Fee" value="<?php echo $service_fee; ?>" />
        </div>
	    <div class="form-group">
            <label for="special">Special <?php echo form_error('special') ?></label>
            <textarea class="form-control" rows="3" name="special" id="special" placeholder="Special"><?php echo $special; ?></textarea>
        </div>
	    <input type="hidden" name="novcr" value="<?php echo $novcr; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/tbl_rekap_dtl') ?>" class="btn btn-default">Cancel</a>
	</form>