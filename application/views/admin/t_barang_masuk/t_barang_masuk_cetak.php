<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>cetak laporan</title>
	<style>
	#customers {
	  font-family: Arial, Helvetica, sans-serif;
	  border-collapse: collapse;
	  width: 100%;
	}

	#customers td, #customers th {
	  border: 1px solid #ddd;
	  padding: 8px;
	}

	#customers tr:nth-child(even){background-color: #f2f2f2;}

	#customers tr:hover {background-color: #ddd;}

	#customers th {
	  padding-top: 12px;
	  padding-bottom: 12px;
	  text-align: left;
	  background-color: #04AA6D;
	  color: white;
	}
	</style>
</head>
<body>
	<h1>Laporan Barang Masuk</h1>
	<table id="customers">
        <thead>
            <tr>
                <th width="80px">No</th>
    		    <th>Tgl Masuk</th>
                <th>Supplier</th>
    		    <th>Nama Barang</th>
    		    <th>Jml</th>
    		    <th>Harga</th>
    		    <th>Sub Total</th>
	        </tr>
        </thead>
	    <tbody>
	    	<?php $i = 0;foreach ($data as $rows){?>
	    	<tr>
	    		<td><?= ++$i ?></td>
	    		<td><?= $rows->tgl_bm?></td>
	    		<td><?= $rows->nama_sup?></td>
	    		<td><?= $rows->nama_barang?></td>
	    		<td><?= $rows->jml_bm?></td>
	    		<td align="right"><?= rupiah($rows->harga_bm)?></td>
	    		<td align="right"><?= rupiah($rows->sub_total_bm)?></td>
	    	</tr>
	    	<?php }?>
	    </tbody>
    </table>
</body>
</html>