<table class="table">
	    <tr><td>Id Rekap</td><td><?php echo $id_rekap; ?></td></tr>
	    <tr><td>Golongan</td><td><?php echo $golongan; ?></td></tr>
	    <tr><td>Pagu</td><td><?php echo $pagu; ?></td></tr>
	    <tr><td>Nama Tamu</td><td><?php echo $nama_tamu; ?></td></tr>
	    <tr><td>Checkin</td><td><?php echo $checkin; ?></td></tr>
	    <tr><td>Checkout</td><td><?php echo $checkout; ?></td></tr>
	    <tr><td>Type Room</td><td><?php echo $type_room; ?></td></tr>
	    <tr><td>Harga Kamar</td><td><?php echo $harga_kamar; ?></td></tr>
	    <tr><td>Tagihan</td><td><?php echo $tagihan; ?></td></tr>
	    <tr><td>Service Fee</td><td><?php echo $service_fee; ?></td></tr>
	    <tr><td>Special</td><td><?php echo $special; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/tbl_rekap_dtl') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>