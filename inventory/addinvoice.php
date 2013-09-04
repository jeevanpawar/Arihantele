<?php
if(isset($_REQUEST['inv']))
{	
	
	$t2=$_POST['t2'];
	$t3=$_POST['t3'];
	$t4=date('Y-m-d', strtotime($_POST['t4']));
	$t5=$_POST['t5'];
	$t6=$_POST['t6'];
	$t7=$_POST['t7'];
	$t8=$_POST['t8'];
	$t9=$_POST['t9'];
	$qry4="insert into invoice(i_name,i_address,i_date,i_cno,i_ph,i_vat,i_other,i_total) values('".$t2."','".$t3."','".$t4."','".$t5."','".$t6."','".$t7."','".$t8."','".$t9."')";
	$res4=mysql_query($qry4);
	$i_id=mysql_insert_id();
	
	$h=$_POST['d'];
	$d = count($h);
	for($i=0; $i<$d; $i++)
	{	
		$s1=$_POST['d'][$i];
		$s2=$_POST['qnt'][$i];
		$s3=$_POST['r'][$i];
		$s4=$_POST['rate'][$i];
		$s5=$_POST['value'][$i];
			
	$quo="insert into sub_invoice(i_no,si_p,s_bag,s_kg,s_rate,s_amt) values('".$i_id."','".$s1."','".$s2."','".$s3."','".$s4."','".$s5."')";
	$quo_res=mysql_query($quo);
	}
	
	if($res4)
	{
		header("location:invoicedetails.php");
	}
	
	
}
?>