<?php
include("../../jaykar/session/session.php");
error_reporting(0);
include("../../jaykar/include/database.php");

$p=$_REQUEST['id'];

$qry1="select * from sub_dc where d_id=".$p;
$res1=mysql_query($qry1);

$qry2="select * from dc where d_id=".$p;
$res2=mysql_query($qry2);
$row2=mysql_fetch_array($res2);

$qry3="select * from client where c_name='$row2[2]'";
$res3=mysql_query($qry3);
$row3=mysql_fetch_array($res3);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Arihant Electricals</title>
<style type="text/css">
.tab2{
	width:642px;
	margin-left:250px;
	margin-top:161px;
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

	top: 160px;
}
.line{
}
.add2{
	width:361px;
	height:96px;
	border:1px solid ;
	border-left:none;

	
}
.add1{
	width:100px;
	height:96px;
	border:1px solid ;
	margin-left:30px;
	border-left:none;
	margin-right:-293px;
		
}
.main{
	border-collapse:collapse;
	width:726px;

}
.d1{
	border:1px solid ;
	height:900px;
}
.d2{

	height:400px;
}
.d3{
	
	padding:1px 1px 1px 1px;
	width:200px;
	text-align:center;
	margin-left:250px;
	margin-top:5px;
}
.d4 img{
	width:90px;
	height:90px;
	position:absolute;
	margin-left:20px;
	margin-top:30px;
}
.report1{
    border-collapse:collapse;
	width:723px;
	border-bottom:none;
}
.r_details1
{
	width:723px;
	background-color:#FFF;
	text-align:center;
	
	border-collapse:collapse;
}
.r_details1 td
{
	text-align:center;
	height:20px;

}

</style>
<link rel="stylesheet" href="../../jaykar/print.css" type="text/css" />
</head>
<body><br>
<div class="d1">
	<div class="d4"><img src="../../Arihant electricals/logo.jpg" /></div>
    <br>
	<div class="d3">CASH/CREDIT MEMO</div>
	<div class="inv">ARIHANT ELECTRICALS</div>
	<div align="center">Shop No-2,Pawan Nagar bus stop,Near Ambad link Road <BR>Opp.NKGSB Bank Cidco,New Nashik-05.Mob.:9890033657,7385888222<br>
 Email ID : arihantelectricalsnashik@gmail.com<br></div>
<table class="add2">
<tr><td>
	<div class="ms">	
  <b>M/S :</b><?php echo"$row3[1]"; ?><br><b>Address:</b><?php echo"$row3[2]"; ?><br><b>Mobile No:</b><?php echo"$row3[3]"; ?></div>
  
  </td>
  <td>
  <table class="add1">
<tr><td>
	<div class="ms">	
  <b>No :</b><?php echo"$row3[1]"; ?><br><p>&nbsp;</p><b>Date:</b><?php echo"$row3[3]"; ?></div>
  </td></tr>
</table></td>
  </tr>
  
</table>


<div class="ms">

</div>

<div class="d2">
<table class="main">
<tr><td>
<table class="report1" border="1">
<tr>
<td width="50">Sr.No.</td>
<td width="200">Description Of Goods</td>
<td width="90">Qty.</td>
<td width="90">Rate</td>
<td width="70">Amount</td>
</tr>
</table>
</td></tr>
<tr><td>
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
<tr >
	<td colspan="2">VAT TIN 27400723542V w.e.f. 26/8/2009</td>
    <td colspan="2">Grand Total</td>
    <td><?php echo"$row1[3]"; ?></td>  
</tr>




</tr>
</table>
</td></tr>
</table>
</div>

<table>
<tr>
 <td width="380"><b>&nbsp;<b></td>
 <td><b>For,ARIHANT ELECTRICALS</b></td>
 <td></td>
</tr>
</table>

<br><br>

</div>
</body>
</html>

<?php
$htmlcontent=ob_get_clean();

include("../../jaykar/inventory/dompdf/dompdf_config.inc.php");


  $htmlcontent = stripslashes($htmlcontent);
  $dompdf = new DOMPDF();
  $dompdf->load_html($htmlcontent);
  $dompdf->set_paper("folio", "portrait");
  $dompdf->render();
  $dompdf->stream($filename, array("Attachment" => false));	
  exit(0);
?>