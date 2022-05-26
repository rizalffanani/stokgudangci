
<style>
    body{
      font-family: Arial, Helvetica, sans-serif;
    }
    p{
        font-size:12px;
        font-weight:bold;
    }
    #customers {
      border-collapse: collapse;
      width: 100%;
    }
    
    #customers td, #customers th {
      border: 1px solid black;
      padding: 8px;
    }
    
    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
    }
</style>
<body>
<p>
    REKAPITULASI BIAYA HOTEL NON PKAT<br>
    INSPEKTORAT JENDERAL KEMENTRIAN PEKERJAAN UMUM<br>
    Periode : 01 S/D  <?= tgl_indo(date('Y-m-t'))?>
</p>
<br>
<table id="customers">
    <tr>
        <th>No</th>
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
    <?php $t_tagihan=0;$t_fee=0;$ttl=0;$start = 0;foreach ($data as $users){$pagu="";?>
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
		    <td><?php echo $users->nospt ?></td>
		    <td><?php echo $users->mak ?></td>
		    <td><?php echo $users->nama_hotel ?></td>
		    <td><?php echo $users->kota ?></td>
		    <td><?php echo $users->novcr ?></td>
		    <td><?php echo $users->golongan ?></td>
            <td style="text-align:right"><?php echo "Rp.".rupiah($users->pagu) ?></td>
            <td><?php echo $users->nama_tamu ?></td>
            <td><?php echo date("d-M-Y", strtotime($users->checkin)) ?></td>
            <td><?php echo date("d-M-Y", strtotime($users->checkout)) ?></td>
            <td><?php echo $users->type_room ?></td>
            <td><?php echo $hari = dateDifference($users->checkin, $users->checkout) ?></td>
            <td style="text-align:right"><?php echo "Rp.".rupiah($users->harga_kamar) ?></td>
            <td style="text-align:right"><?php $tagihan = $users->harga_kamar*$hari;$t_tagihan=$t_tagihan+$tagihan;echo "Rp.".rupiah($tagihan) ?></td>
            <td style="text-align:right"><?php $fee = ($tagihan*10)/100; $t_fee=$t_fee+$fee;echo "Rp.".rupiah($fee) ?></td>
            <td style="text-align:right"><?php $ttls = $tagihan+$fee;$ttl=$ttl+$ttls;echo "Rp.".rupiah($ttls) ?></td>
       </tr>
    <?php }?>
        <tr>
            <td colspan="14"></td>
            <td style="text-align:right"><?php echo "Rp.".rupiah($t_tagihan) ?></td>
            <td style="text-align:right"><?php echo "Rp.".rupiah($t_fee) ?></td>
            <td style="text-align:right"><?php echo "Rp.".rupiah($ttl) ?></td>
        </tr>
</table>
<div style="position: absolute;right: 50px;">
    <p style="text-align:center">
        <br>
        <br>
        Bogor, <?= tgl_indo(date('Y-m-d'))?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <u>DINI NURFALAH ASLAMI</u>
    </p>
</div>
</body>