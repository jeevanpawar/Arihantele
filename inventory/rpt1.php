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
<title>Arihant Electricals</title>
<style type="text/css">
.tab2{
	width:642px;
	margin-left:250px;
	margin-top:139px;
	line-height:30px;
	position:absolute;
	height:100px;
	border-collapse:collapse;
    border-right:none;	
}
.vat{
	position:absolute;
	margin-bottom:-500px;	
	left: 7px;
	top: 850px;
}
.ms{
	position:absolute;
	top: 139px;
	left: 7px;
}

.add2{
	width:335px;
	height:96px;
	border:1px solid #000;
	border-right:none;
}
.report1{
    border-collapse:collapse;
	width:725px;
}
.report1 td{	
	text-align:center;
	height:25px;
}
.r_details1
{
	width:724px;
	background-color:#FFF;
	text-align:center;
	border-collapse:collapse;
	margin-left:-2px;
}
.r_details1 td
{
	text-align:center;
	height:20px;
}
.tot{
	width:725px;
	border-collapse:collapse;
	border-top:none;
	margin-left:-1px;
}
.main{
	border-collapse:collapse;
	width:725px;
}
.d1{
	border:1px solid #000;
	height:1000px;
}
.d2{
	height:600px;
}
.d3{
	height:100px;
}
.d4 img{
	width:100px;
	height:100px;
	position:absolute;
	margin-left:20px;
	margin-top:10px;
}
</style>
<link rel="stylesheet" href="../print.css" type="text/css" />
</head>
<body>
<div class="d1">
	<div class="d4"><img src="../../Arihant electricals/logo.jpg"></div>

	<div align="center">CASH MEMO</div>
	<div class="inv">ARIHANT ELECTRICALS</div>
    <div align="center">
    Shop No-2,Pawan Nagar bus stop,Near Ambad link Road <BR>Opp.NKGSB Bank Cidco,New Nashik-05.Mob.:9890033657,7385888222<br>
 Email ID : arihantelectricalsnashik@gmail.com<br></div>
    <br><br>
	<table class="add2">
	<tr><td><div class="ms">	
  	<b>M/S :</b><?php echo"$row1[1]"; ?><br><b>Address:</b><?php echo"$row3[2]"; ?><br><b>Mobile No:</b><?php 		echo"$row3[3]"; ?></div>
  	</td></tr>
	</table>
    
    <?php 
	$t1=date('d-m-Y', strtotime($row1[1]));
	$t2=date('d-m-Y', strtotime($row1[7]));
	$t3=date('d-m-Y', strtotime($row1[9]));
	?>
	<table class="tab2" border="1" >
 	<tr><td>No :<?php echo"$row1[0]"; ?></td>
    	
 	</tr>
	<tr>
  		<td height="47">Date :<?php echo"$row1[6]"; ?></td>
  		
 	</tr>
	
	</table>
    <div class="d2">
	<table class="main">
    <tr><td>
    	<table class="report1" border="1">
    	<tr>
        <td width="50">Sr.No.</td>
        <td width="200">Description of Goods</td>
        <td width="70">Qty.</td>
        <td width="70">Rate</td>
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
        </table>
        
    </td></tr>
    </table>
    </div>
    <div class="d3">
    <table class="tot" border="1">
        <tr>
            <td colspan="2"></td>
    		<td colspan="2">TOTAL</td>
    		<td><?php echo"$row1[4]"; ?></td>  
        </tr>
        
        <tr>
			<td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    		<td colspan="2">Grand Total</td>
    		<td><?php echo"$row1[5]"; ?></td>  
		</tr>
		<tr>
        	<td colspan="5"><b>Rupees in Words:</b><?php echo"$row1[10]"; ?></td>
        </tr>
    </table>
    </div>
    <table>
	<tr>
 		
 <p align="right"><b>For ARIHANT ELECTRICALS</b></p>
 
	</tr>
	</table>
    <br><br>
   
</div>

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