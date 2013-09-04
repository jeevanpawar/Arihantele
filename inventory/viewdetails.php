<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
$id=$_REQUEST['id'];

$qry="select * from sub_billtype where sb_id='$id'";
$res=mysql_query($qry);

?>

<html>
<head>
<title>Arihant Electricals</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="custom.js"></script>
</head>
<body>
		<div id="container">
	 	<div id="sub-header">
    	<?php
			include("include/p_header.php");
		?>
       	<div>
        <table class="emp_tab">
        <tr class="search_res">
        <td class="info">
        <center>View Stock Details <?php echo $row_s[1]; ?></center>
        </td>
        </tr>
        </table>
        <br>
        <table class="detail">
        <tr class="menu_header">
        <td width="200">Stock Name</td>
        <td width="150">Quantity</td>
		<td width="150">Rate</td> 
        <td width="150">MRP</td>
        <td width="150">Tax</td>
        <td width="150">Billtype</td>             
        <td width="150">Amount</td>     
        </tr>
        <?php
		$qry1="select * from sub_billtype where b_id='$id'";
        $res1=mysql_query($qry1);
		
while($row1=mysql_fetch_array($res1))
{
		while($row_d=mysql_fetch_array($res))
		{
			echo "<tr class='pagi'>";
			echo "<td>";
			echo $row_d[2];
			echo "</td>";
			echo "<td>";
			echo $row_d[3];
			echo "</td>";
			echo "<td>";
			echo $row_d[6];
			echo "</td>";
			echo "<td>";
			echo $row_d[4];
			echo "</td>";
			echo "<td>";
			echo $row_d[5];
			echo "</td>";
			echo "<td>";
			echo $row1[2];
			echo "</td>";			
			echo "<td>";
			echo $row_d[7].'&nbsp;'.'Rs/-';
			echo "</td>";
			echo "</tr>";
		}
}
		?>
        
        </table>
       
        
        </div>
        </div>
    </div>
    </div>
        
    <div id="fade"></div>
    	<div class="clear"></div>
    </div>
</div>
 <div id="footer">
     <div class="clear"></div> 
    </div>
    </div>
</body>
</html>
