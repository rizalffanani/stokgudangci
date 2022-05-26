<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
	<title></title>
	<meta name="generator" content="https://conversiontools.io" />
	<meta name="author" content="user"/>
	<meta name="created" content="2021-10-21T05:04:02"/>
	<meta name="changedby" content="user"/>
	<meta name="changed" content="2021-10-21T06:26:26"/>
	<meta name="AppVersion" content="16.0300"/>
	<meta name="DocSecurity" content="0"/>
	<meta name="HyperlinksChanged" content="false"/>
	<meta name="LinksUpToDate" content="false"/>
	<meta name="ScaleCrop" content="false"/>
	<meta name="ShareDoc" content="false"/>
	
	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Calibri"; font-size:x-small }
		a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
		a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
		comment { display:none;  } 
		td {padding:3px 3px;}
	</style>
	
</head>
<?php 
  $infoweb=$this->db->get_where('info', array('id_info' => '1'))->row();
?>
<body>
<table cellspacing="0" border="0" style="width: 100%;">
	

	<tr>
		<td align="left" valign=bottom><font color="#000000"><br><img src="<?php echo base_url(); ?>assets/img/<?= $infoweb->logo_web?>" width=104 height=75 style="z-index: -1;top: -18;position: absolute;">
		</font></td>
		<td colspan=7 align="center" valign=bottom ><font face="Arial Rounded MT Bold" style="font-size:20px">HOTEL RESERVATION VOUCHER</font></td>
		<td align="right" colspan=6 valign=bottom ><b>No. Voucher :</b> VCR/<?= date('Y')?>/X/PU/<?php echo $users->novcr ?></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000;" colspan=6 align="left" valign=middle ><?php echo $users->nama_hotel ?></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=4 rowspan=2 align="left" valign=middle >City  <?php echo $users->kota ?></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 rowspan=2 align="left" valign=middle  sdnum="1033;0;@">Telp     <?php echo $users->telepon ?></td>
	</tr>
	<tr>
		<td style="border-bottom: 1px solid #000000;border-left: 1px solid #000000;" colspan=6 align="left" valign=bottom ><font color="#222222"><?php echo $users->alamat ?></font></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=2 rowspan=2 height="20" align="left" valign=middle >Name of Guest/Group :</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=4 rowspan=2 align="center" valign=middle ><font color="#000000" style = "text-transform:capitalize;"><?php echo $users->nama_tamu ?></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=2 align="center" valign=bottom ><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=middle >Total of Rooms : </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" rowspan=2 align="center" valign=middle >1</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="center" valign=middle >( ONE )</td>
	</tr>
	<tr>
		<td colspan=6 align="left" valign=bottom><font color="#000000"><br></font></td>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" rowspan=2 height="20" align="left" valign=middle >Date Check In :</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="center" valign=middle  sdval="44481" sdnum="1033;1033;D-MMM-YY"><?php echo date("d-M-Y", strtotime($users->checkin)) ?></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" rowspan=2 align="left" valign=middle >Date Check Out :</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="center" valign=middle  sdval="44482" sdnum="1033;1033;D-MMM-YY"><?php echo date("d-M-Y", strtotime($users->checkout)) ?></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=middle >Extend Room Number :</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=1 rowspan=2 align="center" valign=middle >---</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=middle >Number of Night :</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" rowspan=2 align="center" valign=middle ><?php echo $hari = dateDifference($users->checkin, $users->checkout) ?></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000;text-transform: uppercase;" colspan=2 rowspan=2 align="center" valign=middle >( <?php $f = new NumberFormatter("en", NumberFormatter::SPELLOUT); echo $f->format($hari);?> )</td>
	</tr>
	<tr><td colspan=6 align="left" valign=bottom><font color="#000000"><br></font></td></tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" rowspan=2 height="20" align="left" valign=middle >Type of Rooms :</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000;text-transform:capitalize;" colspan=5 rowspan=2 align="left" valign=middle  sdnum="1033;0;@" ><?php echo $users->type_room ?></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=middle >Category Rates :</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=6 rowspan=2 align="left" valign=middle > B.FAST </td>
	</tr>
	<tr><td colspan=6 align="left" valign=bottom><font color="#000000"><br></font></td></tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=2 rowspan=2 height="20" align="left" valign=middle >Special Instructions</td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="left" valign=middle ><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" rowspan=2 align="left" valign=middle >Package</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=middle ><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=3 align="left" valign=middle >Confirmed Hotel by :</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000;text-transform: capitalize;" colspan=2 align="left" valign=middle ><?php echo($users->confirm)?></td>
	</tr>
	<tr>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="left" valign=middle >             </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=3 align="left" valign=bottom >Confirmed SAS by     :</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000;text-transform: capitalize;" colspan=1 align="left" valign=middle ><?php echo($users->confirm)?></td>
		<!--<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="left" valign=middle >Dini</td>-->
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000" height="19" align="left" valign=bottom >PAYMENT :</td>
		<td style="border-top: 1px solid #000000; border-right: 1px solid #000000" colspan=7 align="left" valign=middle ><font size=1>This voucher is valid for room only, unless other service is specified</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=2 rowspan=2 align="left" valign=top >Hotel Code :</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="left" valign=middle ><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left" valign=middle >Issued by :</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="left" valign=middle >Dini</td>
	</tr>
	<tr>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" height="19" align="left" valign=bottom ><br></td>
		<td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=7 align="left" valign=middle ><font size=1>Invoice should be sent to SARANA TOURS &amp; TRAVEL Head Ofiice by presenting the third coupon</font></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left" valign=middle >Date &amp; Place :</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="left" valign=middle  sdval="44482" sdnum="1033;1033;D-MMM-YY"><?php echo date("d-M-Y", strtotime($users->date));?></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000" height="19" align="left" valign=bottom >ATTENTION :</td>
		<td style="border-top: 1px solid #000000" align="left" valign=bottom ><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=bottom ><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=bottom ><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=bottom ><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=bottom ><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=bottom ><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=bottom ><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=bottom ><br></td>
		<td style="border-top: 1px solid #000000;border-bottom: 1px solid #000000;" rowspan=3 align="left" valign=bottom ><br><img src="<?php echo base_url(); ?>assets/img/result_htm_6a236456e17a30b.png" width=57 height=56 hspace=3 vspace=2>
		</td>
		<td style="border-top: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom ><br></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=top >VCR/<?= date('Y')?>/X/PU/<?php echo $users->novcr ?></td>
	</tr>
	<tr>
		<td style="border-left: 1px solid #000000" height="19" align="left" valign=bottom >   1. This Voucher is valid on the requested date only</td>
		<td align="left" valign=bottom ><br></td>
		<td align="left" valign=bottom ><br></td>
		<td align="left" valign=bottom ><br></td>
		<td align="left" valign=bottom ><br></td>
		<td align="left" valign=bottom ><br></td>
		<td align="left" valign=bottom ><br></td>
		<td align="left" valign=bottom ><br></td>
		<td align="left" valign=bottom ><br></td>
		<td style="border-right: 1px solid #000000" align="left" valign=bottom ><br></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=top >IDR-133-00-1867416-8</td>
	</tr>
	<tr>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" height="19" align="left" valign=bottom >   2. The missing voucher can not to be replaced unless by new one</td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=bottom ><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=bottom ><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=bottom ><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=bottom ><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=bottom ><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=bottom ><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=bottom ><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=bottom ><br></td>
		<td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom ><br></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=top  sdnum="1033;1033;D-MMM-YY">PT Sarana Akomoda Sejahtera</td>
	</tr>
</table>
</body>

</html>
