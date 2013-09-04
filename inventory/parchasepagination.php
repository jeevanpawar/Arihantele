<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$per_page = 19; 
if($_GET)
{
$page=$_GET['page'];

}
$start = ($page-1)*$per_page;
$qry_u="select * from sub_billtype order by b_id desc limit $start,$per_page";
$res_u=mysql_query($qry_u);
?>
        <table class="emp_tab">
        <tr class="menu_header">       
        <td width="200">Stock Name</td>
        <td width="150">Quantity</td>
		<td width="150">Rate</td> 
        <td width="150">Bill Type</td>        
        <td width="150">Amount</td>     
        </tr>
        <?php
		//$qry_st="select * from sub_billtype where sb_id='$row_u[0]'";
//		$res_st=mysql_query($qry_st);
//		$row_st=mysql_fetch_array($res_st);
		while($row_st=mysql_fetch_array($res_u))
		{
	     if($row_st[8]=='Without Bill')
		echo "<tr class='pagiPu' style='color:#FF0000'>";
		 else
		echo "<tr class='pagiPu' style='color:#000000'>";
        echo "<td>";
		echo $row_st[2];
		echo "</td>";
		echo "<td>";
		echo $row_st[3];
		echo "</td>";
		echo "<td>";
		echo $row_st[6];
		echo "</td>";
		echo "<td>";
		echo $row_st[8];
		echo "</td>";		
		echo "<td>";
		echo "<a href='viewdetails.php?id=$row_u[0]' class='print'>Details</a>";
		echo "</td>";
		echo "</tr>";
		}
		?>
        
        </table>
        
      
