<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");

$p=$_REQUEST['id'];
$qry1="select * from invoice where i_id=".$p;
$res1=mysql_query($qry1);
$row1=mysql_fetch_array($res1);

$qry2="select * from sub_invoice where i_id=".$p;
$res2=mysql_query($qry2);

$qry3="select * from client where c_name='$row1[1]'";
$res3=mysql_query($qry3);
$row3=mysql_fetch_array($res3);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jaykar Industries</title>
<style type="text/css">
.tab2{
	width:640px;
	margin-left:250px;
	margin-top:143px;
	line-height:30px;
	position:absolute;
	height:100px;
	border-collapse:collapse;	
}
.vat{
	position:absolute;
	margin-bottom:-500px;	
	left: 7px;
	top: 850px;
}
.ms{
	position:absolute;
	top: 130px;
	left: 7px;
}
.maintbl{
	width:725px;
	height:auto;
	border-collapse:collapse;
}
.add2{
	width:335px;
	height:96px;
	border:1px solid #000;
}
.report1{
    border-collapse:collapse;
	width:725px;
	border-bottom:none;
}
.report1 td{	
	text-align:center;
	height:25px;
}
.r_details1
{
	width:725px;
	background-color:#FFF;
	text-align:center;
	
	border-collapse:collapse;
}
.r_details1 td
{
	text-align:center;
	height:20px;

}
.d1{
	border:1px solid #000;
	height:700px;
}
</style>
<link rel="stylesheet" href="../print.css" type="text/css" />
</head>
<body>

<table border="1" class="maintbl">

<tr><td align="center">CASH/CREDIT MEMO<div class="inv">ARIHANT ELECTRICALS</div><br>Shop No-2,Pawan Nagar bus stop,Near Ambad link Road <BR>Opp.NKGSB Bank Cidco,New Nashik-05.Mob.:9890033657,7385888222<br>
 Email ID : arihantelectricalsnashik@gmail.com<br></td>
</tr>
</table>
<br><br>
<table class="add2">
  <tr><td>
	<div class="ms">
    <BR>	
  	<b>M/S :</b><?php echo"$row1[1]"; ?><br><b>Address:</b><?php echo"$row3[2]"; ?><br><b>Mobile No:</b><?php echo"$row3[3]"; ?></div>
  </td></tr>
</table>
<table class="tab2" border="1" >
 <tr><td>Invoice No :-<?php echo"$row1[0]"; ?></td>
     <td>Date :- <?php echo date('d-m-Y'); ?></td>
 </tr>
 <tr>
     <td>P.O. No :-<?php echo"$row1[6]"; ?></td>
     <td>Date :- <?php echo"$row1[7]"; ?></td>
 </tr>
 <tr>
     <td>Our DC No :-<?php echo"$row1[8]"; ?></td>
     <td>Date :- <?php echo"$row1[9]"; ?></td>
 </tr>
</table>
<br><br>
<table class="report1" border="1">
<tr>
<td width="50">Sr.No.</td>
<td width="200">Paticulars</td>
<td width="70">Qty.</td>
<td width="70">Rate Per Pic</td>
<td width="70">Amount</td>
</tr>
</table>
<table class="r_details1" border="1">
<?php
$count=0;
while($row2=mysql_fetch_array($res2))
{
	$count+=1;
	echo "<tr>";
	echo "<td width='50'>";
	echo $count;
	echo "</td >";
	echo "<td  width='200'>";
	echo $row2[2];
	echo "</td>";
	echo "<td width='70'>";
	echo $row2[3];
	echo "</td >";
	echo "<td width='70'>";
	echo $row2[4];
	echo "</td>";
	echo "<td width='70'>";
	echo $row2[5];
	echo "</td>";
	echo "</tr>";
}
?>

<tr><td colspan="5" height="16"></td></tr>
<tr>
	<td colspan="2"></td>
    <td colspan="2">TOTAL</td>
    <td><?php echo"$row1[4]"; ?></td>  
</tr>
<tr>
	<td colspan="2">VAT TIN 27400723542V w.e.f. 26/8/2009</td>
    <td colspan="2">Vat @ 12.5%</td>
    <td><?php echo"$row1[3]"; ?></td>  
</tr>
<tr>
	<td colspan="2">CST TIN 27400723542C w.e.f. 26/8/2009</td>
    <td colspan="2">Grand Total</td>
    <td><?php echo"$row1[5]"; ?></td>  
</tr>

<tr><td colspan="5"><b>Rupees in Words:</b><?php echo"$row1[10]"; ?></td>

</tr>
</table>
<?php 

	$total=($row[7] / 100) * $row_t[0];
	$to=$total+$row_t[0];
?>
<br><br>
<table>
<tr>
 <td width="380">&nbsp;</td>
 <td><b>For JAYKAR INDUSTRIES</b></td>
 <td></td>
</tr>
</table>
<br><br><br>

<table>
<tr>
<td width="400"><b></b></td><td><b>Athorised Signatory</b></td><td></td>
</tr>
</table>
</body>
</html>

<?php
$htmlcontent=ob_get_clean();

include("dompdf/dompdf_config.inc.php");


  $htmlcontent = stripslashes($htmlcontent);
  $dompdf = new DOMPDF();
  $dompdf->load_html($htmlcontent);
  $dompdf->set_paper("folio", "portrait");
  $dompdf->render();
  $dompdf->stream($filename, array("Attachment" => false));	
  exit(0);
?>