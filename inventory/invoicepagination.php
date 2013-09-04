<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$per_page = 20; 
if($_GET)
{
$page=$_GET['page'];
}
//get table contents
$start = ($page-1)*$per_page;
$sql = "select * from invoice order by i_no desc limit $start,$per_page";
$rsd = mysql_query($sql);
?>

				<table class="emp_tab">
                <tr class="menu_header">
                <td width="80">In. No</td>
                <td width="250">Client Name</td>
                <td width="160">Date</td>
                <td> Address</td>
                <td width="60">Invoice</td>
                <td width="80">D_Challan</td>
                <td width="90">Cash Memo</td>
                </tr>
                
        <?php
		
		while($row=mysql_fetch_array($rsd))
		{		
        	echo "<tr class='pagi'>";
                echo "<td>";
                echo $row[0];
                echo "</td>";
                echo "<td>";
                echo $row[1];
                echo "</td>";
                echo "<td>";
                echo date('d-m-Y', strtotime($row[3]));
                echo "</td>";
                echo "<td>";
                echo $row[2];
                echo "</td>";
				echo "<td >";
                echo "<a href='invoice1.php?id=$row[0]' class='print'>Print</a>";
                echo "</td>";
				echo "<td width='150'>";
				echo "<a href='report.php?id=$row[0]' class='print'>Print</a>";
				echo "</td>";
                echo "<td >";
                echo "<a href='rpt1.php?id=$row[0]' class='print'>Print</a>";
                echo "</td>";
    		    echo "</tr>";				
                
		}
		?>
        
        
        </table>
