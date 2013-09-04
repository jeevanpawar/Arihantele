<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");

$p=$_REQUEST['id'];

$qry_c="select * from invoice where i_no='$p'";
$res_c=mysql_query($qry_c);
$row_c=mysql_fetch_array($res_c);

$qry_detail="select * from sub_invoice where i_no=".$p;
$res_detail=mysql_query($qry_detail);

$qry_sum="select SUM(s_amt) from sub_invoice where i_no='$p'";
$res_sum=mysql_query($qry_sum);
$row_sum=mysql_fetch_array($res_sum);

$vat=$row_c[6]*100;
$vat_amt=$row_sum[0]*$vat/100;
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Arihant Electricals</title>

<style type="text/css">
.tab2
{
	width:630px;
	margin-left:250px;
	margin-top:-130px;
	line-height:40px;
	
}
.vat
{
	position:absolute;
	margin-bottom:-500px;	
	left: 7px;
	top: 850px;
}
.ms
{
	position:absolute;
	top: 200px;
	left: 7px;
}
.header{
	border:1px solid #CCC;
}
.tax{
	margin-top:5px;
	border:1px solid #CCC;
	
}
.tax_inv
{
	text-align:center;
	font-size:25px;
	letter-spacing:2px;
	font-weight:bold;
	color:#000;
	background-color:#EEE;
	width:100%;
}
.in_add
{
	margin-top:20px;
	font-size:16px;
	margin-left:5px;
}
.in_no
{
	position:relative;
	margin-top:-20px;
	margin-left:520px;
	height:20px;
	width:150px;
}
.food
{
	margin-left:460px;
	font-weight:bold;
}
.matter
{
	text-align:justify;
	margin-top:10px;
}
.bankn
{
	font-size:14px;
}
.term
{
	font-size:13px;
}
</style>
<link rel="stylesheet" href="../print.css" type="text/css" />
</head>
<body>
<div class="header">
<div class="inv">Arihant Electricals</div><br><br>
<br><br>
</div>
 
<div class="tax"> 
<div class="tax_inv">TAX INVOICE</div>
<div class="in_add">
M/s. <?php echo $row_c[1]; ?><br><?php echo $row_c[2]; ?>
<div class="in_no">
No:<?php echo $row_c[0]; ?><br>Date:<?php echo date('d-m-Y', strtotime($row_c[3])); ?>
</div>
<div class="in_add">
</div>

</div>
</div>
<div class="description">
<table class="r_details">
<tr>
<td width="50">Sr.No.</td>
<td>Particulars</td>
<td width="70">Qty</td>
<td width="70">Rate</td>
<td width="70">Amount</td>
</tr>
<?php
$count=0;
while($row1=mysql_fetch_array($res_detail))
{	$count+=1;
	echo "<tr>";
	echo "<td width='50'>";
	echo $count;
	echo "</td>";
	echo "<td>";
	echo $row1[2];
	echo "</td >";
	echo "<td width='70'>";
	echo $row1[3];
	echo "</td>";
	
	echo "<td width='70'>";
	echo $row1[5];
	echo "</td>";
	echo "<td width='70'>";
	echo $row1[6];
	echo "</td>";
	echo "</tr>";
}
?>
</table>
</div>
<div class="description1">
<table class="r_details1">
<tr>
<td width="50">&nbsp;</td>
<td colspan="2">&nbsp;</td>
<td width="70">&nbsp;</td>
<td width="70">Amount</td>
<td width="70"><?php echo $row_sum[0]; ?></td>
</tr>
<tr>
<td width="50">&nbsp;</td>
<td colspan="2">&nbsp;</td>
<td width="70">&nbsp;</td>
<td width="70">Other Charges</td>
<td width="70"><?php echo $row_c[7]; ?></td>
</tr>

<tr>
<td width="50">&nbsp;</td>
<td colspan="2">VAT TIN NO. 27110283467 V-01/04/2006</td>
<td width="70">&nbsp;</td>
<td width="70">Vat @ <?php echo $vat;?>%</td>
<td width="70"><?php echo $vat_amt; ?></td>
</tr>

<tr>
<td width="50">&nbsp;</td>
<td colspan="2">VAT CST NO. 27110283467 C-01/04/2006</td>
<td width="70">&nbsp;</td>
<td width="70">Total</td>
<td width="70"><?php echo $row_c[8]; ?></td>
</tr>
</table>
</div>
<br><br>
<div>
(Rs. Inwords)<br><DIV class="food">Arihant Electricals</DIV>
</div>
<br><br>

<br><br>
<div class="term">
1. Goods once sole are not returnable.
<br>
2. The seller shall not be liable for any loss or damage resulting
<br>&nbsp;&nbsp;&nbsp;&nbsp;From the improper use of the articles designated in this invoice.
<br>
3. Any complains are 8 hours from delivery.
<br>

<br>
<div class="matter">
I/We hereby certify that my/our registration certificate under the Maharashtra value added Tax Act 2002 is in
force on the date on which the sale of goods specified in this tax made by me/us and that the transation of sale 
covered by this tax invoices has been effected by us and it shall be accounted for in the turnover of sales while 
filling of return and the due tax, if any, payable on the sale has been paid or shall be paid.
</div>
</div>
<br>


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