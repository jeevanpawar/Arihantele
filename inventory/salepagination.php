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
$qry_u="select * from sale order by sl_id desc limit $start,$per_page";
$res_u=mysql_query($qry_u);
?>
<link href="css/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="../js/jquery.js" type="text/javascript"></script>
<script src="css/facebox.js" type="text/javascript"></script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
		 
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
</script>
        <table class="emp_tab">
        <tr class="menu_header">
        <td width="100">Sale Id</td>
        <td>Customer Name</td>
        <td width="150">Date</td>
        <td width="150">Total Amount</td>
        <td  width="100">Create</td>
        </tr>
        <?php
		while($row_u=mysql_fetch_array($res_u))
		{
		$qry_sale="select SUM(s_value) from sub_sale where s_id='$row_u[0]'";
		$res_sale=mysql_query($qry_sale);
		$row_sale=mysql_fetch_array($res_sale);
		
		echo "<tr class='pagi'>";
        echo "<td>";
		echo $row_u[0]; 
		echo "</td>";
		echo "<td>";
		echo $row_u[1];
		echo "</td>";
		echo "<td>";
		echo date('d-m-Y', strtotime($row_u[3]));
		echo "</td>";
		echo "<td>";
		echo $row_sale[0];
		echo "</td>";
		echo "<td width='100' >";
		echo "<a href='invoice.php?id=$row_u[0]' class='print'>Invoice</a>";
		echo "</td>";
			
		}
		?>
        
        </table>
        
      
