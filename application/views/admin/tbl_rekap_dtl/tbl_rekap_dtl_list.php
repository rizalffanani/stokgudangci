<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('admin/tbl_rekap_dtl/cetak/'.$in), 'Cetak', array('class' => 'btn btn-primary')); ?>
                <?php echo anchor(site_url('admin/tbl_rekap_dtl/cetak2/'.$in), 'Preview', array('class' => 'btn btn-primary')); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Voucher</th>
                    <th>Invoice</th>
        		    <th>No SPT</th>
        		    <th>MAK</th>
        		    <th>Nama Hotel</th>
        		    <th>Kota</th>
        		    <th>No. Vcr</th>
        		    <th>Golongan</th>
        		    <th>Pagu</th>
        		    <th>Nama Tamu</th>
        		    <th>Checkin</th>
        		    <th>Checkout</th>
        		    <th>Type Room</th>
        		    <th>Hari</th>
        		    <th>Harga Kamar</th>
        		    <th>Tagihan</th>
        		    <th>Service Fee</th>
        		    <th>Total</th>
                </tr>
            </thead>
	        <tbody>
                <?php $t_tagihan=0;$t_fee=0;$ttl=0;$start = 0;foreach ($data as $users){?>
                    <?php 
                        switch ($users->golongan) {
                          case "I":
                            // $pagu ="Eselon I";
                            $pagu ="I";
                            break;
                          case "II":
                            // $pagu = "Eselon II";
                            $pagu = "II";
                            break;
                          case "III":
                            // $pagu = "Golongan IV";
                            $pagu = "IV";
                            break;
                          case "IV":
                            // $pagu = "Golongan III/II/I";
                            $pagu = "III";
                            break;
                          default:
                            $pagu = "I";
                        }
                    ?>
                    <tr>
            		    <td><?php echo ++$start ?></td>
                        <td>
                			<?php 
                            echo anchor(site_url('admin/tbl_rekap_dtl/cetak_vcr/'.$users->novcr),'Cetak',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
                			echo '<br>'; 
                			echo anchor(site_url('admin/tbl_rekap_dtl/cetak_vcr2/'.$users->novcr),'Preview',array('title'=>'detail','class'=>'btn btn-warning btn-sm')); 
                			?>
                		</td>
                        <td>
                			<?php 
                            echo anchor(site_url('admin/tbl_rekap_dtl/cetak_invc/'.$users->novcr),'Cetak',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
                			echo '<br>'; 
                			echo anchor(site_url('admin/tbl_rekap_dtl/cetak_invc2/'.$users->novcr),'Preview',array('title'=>'detail','class'=>'btn btn-warning btn-sm')); 
                			?>
                		</td>
            		    <td><?php echo $users->nospt ?></td>
            		    <td><?php echo $users->mak ?></td>
            		    <td><?php echo $users->nama_hotel ?></td>
            		    <td><?php echo $users->kota ?></td>
            		    <td><?php echo $users->novcr ?></td>
            		    <td><?php echo $users->golongan ?></td>
                        <td><?php echo "Rp.".rupiah($users->pagu) ?></td>
                        <td><?php echo $users->nama_tamu ?></td>
                        <td><?php echo $users->checkin ?></td>
                        <td><?php echo $users->checkout ?></td>
                        <td><?php echo $users->type_room ?></td>
                        <td><?php echo $hari = dateDifference($users->checkin, $users->checkout) ?></td>
                        <td><?php echo "Rp.".rupiah($users->harga_kamar) ?></td>
                        <td><?php $tagihan = $users->harga_kamar*$hari;$t_tagihan=$t_tagihan+$tagihan;echo "Rp.".rupiah($tagihan) ?></td>
                        <td><?php $fee = ($tagihan*10)/100; $t_fee=$t_fee+$fee;echo "Rp.".rupiah($fee) ?></td>
                        <td><?php $ttls = $tagihan+$fee;$ttl=$ttl+$ttls;echo "Rp.".rupiah($ttls) ?></td>
    	           </tr>
                <?php }?>
                    <tr>
                        <td>3</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo "Rp.".rupiah($t_tagihan) ?></td>
                        <td><?php echo "Rp.".rupiah($t_fee) ?></td>
                        <td><?php echo "Rp.".rupiah($ttl) ?></td>
                    </tr>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/plugins/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/backend/plugins/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/backend/plugins/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable({
                    "scrollX": true
                } );
            });
            
        </script>