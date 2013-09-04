<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$per_page = 19; 
if($_GET)
{
$page=$_GET['page'];
}

include("../include/database.php");
$start = ($page-1)*$per_page;
$qry_u="select * from stock order by st_id desc limit $start,$per_page";
$res_u=mysql_query($qry_u);
?>
        <table class="emp_tab">
        <tr class="menu_header">
        <td width="200">Date</td>
        <td width="200">Supplier Name</td>
        <td width="200">Contact</td>
        <td width="200">Balance (Rs/-)</td>
        <td width="200">Total Amt (Rs/-)</td>
        <td width="200">Payment</td>
        </tr>

        <?php
		while($row_u=mysql_fetch_array($res_u))
		{
		$qry_st="select SUM(st_amt) from sub_stock where st_id='$row_u[0]'";
		$res_st=mysql_query($qry_st);
		$row_st=mysql_fetch_array($res_st);
		
		$sid='s'.$row_u[0];
		
		$qry_pt="select SUM(p_amt) from partial_payment where sl_id='$sid'";
		$res_pt=mysql_query($qry_pt);
		$row_pt=mysql_fetch_array($res_pt);
		
		$balance=$row_st[0]-$row_pt[0];
		
		$qry_n="select * from client where c_name='$row_u[2]'";
		$res_n=mysql_query($qry_n);
		$row_n=mysql_fetch_array($res_n);
			
		echo "<tr class='pagi'>";
        echo "<td>";
		echo date('d-m-Y', strtotime($row_u[1]));
		echo "</td>";
		echo "<td>";
		echo $row_u[2]; 
		echo "</td>";
		echo "<td>";
		echo $row_n[3];
		echo "</td>";
		echo "<td>";
		echo $balance;
		echo "</td>";
		echo "<td>";
		echo $row_st[0];
		echo "</td>";
		echo "<td class='insert'>";
		echo "<a href='subpay.php?id=$row_u[0]'>Payment</a>";
		echo "</td>";
		}
		?>
        
        </table>
        
      
