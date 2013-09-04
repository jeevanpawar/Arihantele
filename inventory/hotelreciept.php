<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$id=$_REQUEST['id'];

$qry_d="select * from partial_payment where p_id=".$id;
$res_d=mysql_query($qry_d);
$row_d=mysql_fetch_array($res_d);


	if(isset($_REQUEST['e_can']))
	{
		header("location:payment.php");
	}
	
	$d=date('d-m-Y');
?>
<html>
<head>
<title>Chaturang Tours Pvt Ltd</title>
<style type="text/css">
.container
{
	border:1px solid #000;
}
.cash
{
	
	width:100%;
	height:400px;
	border-top:1px solid #CCC;
}
.cash tr td
{
	padding-left:50px;
	letter-spacing:1px;
	font-size:18px;
	height:50px;
}
.reciept
{
	
	letter-spacing:1px;
	font-size:25px;
	margin-left:-25px;
	text-decoration:underline;
	
}
.name
{
	margin-left:100px;
}
.rs
{
	text-decoration:underline;
	font-size:20px;
	font-weight:bold;
}

.address ul li
{
	width:400px;
	margin-left:390px;
	font-size:12px;
}
.cname
{
	text-transform:uppercase;
}
.inv
{
	margin-top:20px;
	text-align:center;
	font-size:25px;
	letter-spacing:2px;
	font-weight:bold;
	color:#000;
	background-color:#EEE;
	width:100%;
}

</style>
</head>
<body>
		
        <?php
		$p=$row_c[2].'_'.$id;

		$qry_r="select * from hotel_pay where h_id='$id' and c_id='$c'";
		$res_r=mysql_query($qry_r);
		$row_r=mysql_fetch_array($res_r);
		
		$qry="select * from reciept where p_id='$p'";
		$res=mysql_query($qry);
		$row=mysql_fetch_array($res);
		
		$qry_name="select * from booking_form where b_id='$row_r[3]' and c_id='$c'";
		$res_name=mysql_query($qry_name);
		$row_name=mysql_fetch_array($res_name);

		?>
        <div class="container">
        <div>
        
        <div class="header">
<p align="center" >||Shree Lal Bharti||</p>
<div class="inv">SHRI LAL BHARTI FOOD PRODUCT</div><br><br>
<div align="center">Ashirwad Bungla, Mhasrul, Dindori Road Nashik-4<br>Ph.No.6521694</div>
<br><br>
        </div>
        
        <?php
		
			echo "<table class='cash'>";
			echo "<tr>";
			echo "<td align='center' colspan='2' class='reciept'>";
			echo "<b><span class='reciept'>PAYMENT RECIEPT</span></b>";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "<b>Reciept No:$row[0]</b>";
			echo "</td>";
			echo "<td>";
			echo "<b>Date:".date('d-m-Y')."</b>";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td colspan='2'>";
			echo "Recieved with thanks from Mr/Mrs/Ms "."<span class='cname'>".'<u>'.$row_name[4].'</u>'."</span>";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td colspan='2'>";
			echo "Sum of Rs.[By Cash] <u>$row[8] RUPPES ONLY</u>";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td colspan='2'>";
			echo "for the chaturang tours in part/final payment towards <br><br>Booking Ref. No. <u>$row[3]</u><br><br><br>";
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td colspan='2'>";
			echo "<span class='rs'>Rs. $row[7] /-</span><br>Cheque Subject to Realisation<br>(Subject to Nashik Jurisdiction)<span class='name'>For <b>$row_c[1]</b></span><br><br>";
			echo "</td>";
			echo "</tr>";
			echo "</table>";
		
		?>
		
		
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