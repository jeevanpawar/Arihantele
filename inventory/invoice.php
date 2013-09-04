<?php
include("../session/session.php");
error_reporting(0);
include("../include/database.php");
?>
<?php
$id=$_REQUEST['id'];
$qry="select * from sub_sale where s_id='$id'";
$res=mysql_query($qry);
$row=mysql_fetch_array($res);

$qry1="select * from client where c_name='$row[3]'";
$res1=mysql_query($qry1);
$row1=mysql_fetch_array($res1);

$qry2="select * from sub_sale where s_id='$id'";
$res2=mysql_query($qry2);
?>
<?php
if(isset($_REQUEST['submit']))
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
	
	if($res)
	{
		header("location:invoicedetails.php");
	}
	
	
}

if(isset($_REQUEST['cancel']))
{
	header("location:invoicedetails.php");
}


?>
<html>
<head>
<title></title>

<link rel="stylesheet" href="../styles2.css" type="text/css" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="js/addrow.js"></script>
<script type="text/javascript" src="custom.js"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/slider.js"></script>
<script type="text/javascript" src="../js/superfish.js"></script>
<script type="text/javascript" src="js/toword.js"></script>

<script>
var total = 0;
function getValues() {
var qty = 0;
var rate = 0;
var obj = document.getElementsByTagName("input");
      for(var i=0; i<obj.length; i++){
         if(obj[i].name == "qnt[]")
		 {
			 var qty = obj[i].value;
			
		}
         if(obj[i].name == "r[]")
		 {
			 var rate = obj[i].value;
		 }
		 if(obj[i].name == "rate[]")
		 {
			 var urate = obj[i].value;
		 }
         if(obj[i].name == "value[]")
		 {
          		if(qty > 0 && rate > 0)
				{
					obj[i].value = qty*rate*urate;
					total+=(obj[i].value*1);
				}
				else
				{
					obj[i].value = 0;
				    total+=(obj[i].value*1);
				}
          }
		        
		 }
		 var tax =document.getElementById("stax").value;
		 var vat =document.getElementById("vat").value;
		 var add=total*1;
		 add+=(tax*1);
		  add+=(vat*add*1);		 
        document.getElementById("total").value = add;
		var words = toWords(add);
		document.getElementById("word").innerHTML=words;
        total=0;
}

</script>
</head>
<body>
<div id="container">
<div id="sub-header">	

				<div class="back">
      			<h2><center>Invoice Details</center></h2>
                
                <form name="form5" action="" method="post" enctype="multipart/form-data">
                <table class="newinvoice">
                  
                <tr><td class="l_form">Client Name:</td>
                <td>
                <input type="text" class="q_in" name="t2" value="<?php echo $row1[1]; ?>">

				</td>
                </tr>
                <tr>
                <td class="l_form">Address:</td><td><textarea class="q_add" name="t3"><?php echo $row1[2]; ?></textarea></td></tr>
                </table>
                <table class="newinvoice2">
                <tr><td class="l_form">Date</td>
                <td><input type="date" class="q_in" name="t4" ></td>
                </tr>
                <tr>
                <td class="l_form">Contact No:</td>
                <td>
                <input type="text" class="q_in" name="t5" value="<?php echo $row1[3]; ?>" >
				</td>
                </tr>
                <tr>
                <td class="l_form">Phone No:</td>
                <td>
                <input type="text" class="q_in" name="t6" value="<?php echo $row1[4]; ?>" >
				</td>
                </tr>
                </table>
                <table class="des1">
                <tr class="menu_header">
                <td width="35%">Description of Goods</td>
                 <td width="15%">QTY</td>
                 <td width="15%">Rate</td>
                <td width="15%">Disc%</td>
                <td width="10%">Tax</td>
                <td width="15%">Amount</td>
                </tr>
               
                </table>
                <table class="des1" id="dataTable">
                <?php
				while($row2=mysql_fetch_array($res2))
				{
				echo "<tr>";
                echo "<td width='35%'>";
                echo "<input class='des_in' type='text' name='d[]' id='0' value='$row2[4]'><br>";
                echo "</td>";
                echo "<td width='15%'>";
                echo "<input class='des_cap' type='text' name='qnt[]' id='' value='$row2[5]'><br>";
                echo "</td>";
				echo "<td width='15%'>";
                echo "<input class='des_cap' type='text' name='r[]' id='' value='$row2[6]'><br>";
                echo "</td>";
				echo "<td width='15%'>";
                echo "<input class='des_cap' type='text' name='rate[]' id='r' value='$row2[7]'  onkeyup='getValues()'><br>";
                echo "</td>";
				echo "<td width='10%'>";
                echo "<input class='des_q' type='text' name='tax[]' id='tax' value='$row2[8]'  ><br>";
                echo "</td>";
                echo "<td width='15%'>";
                echo "<input class='des_q' type='text' name='value[]' id='value' value='$row2[8]'  readonly><br>";
                echo "</td>";
                echo "</tr>";
				}
				?>
                </table>
                <table class="des1">
                
                <tr>
                <td style="border:hidden;" width="20">&nbsp;&nbsp;</td>
                
                <td colspan="5">
                 Enter Tax: 
                </td>
                <td width="100">
                <select name="t7" id="vat" class="aa" onkeyup="getValues()">
                <option value="0">5%</option>
                <option value="0.04">12.5%</option>
                </select> 
                </td>
                </tr>
                <tr>
                <tr>
                <!--<td style="border:hidden;" width="20">&nbsp;&nbsp;</td>
                                
                <td colspan="5">
                 Other Charges:
                </td>
                <td width="100"><input type='text' name='t8' class="aa" value=""  id="stax" onKeyUp="getValues()" />
                
                </td>-->
                </tr>
                <td style="border:hidden;" width="20">&nbsp;&nbsp;</td>
                <td colspan="5">
                 Total:-
                 <div align="right"> </div>
                </td>
                <td width="100"> 
                <input type='text' name='t9' id="total" class="aa" value=""/>
                </td>               
                </tr>
               
                </table>
               <br>
 				<div class="invoice_button">
       			 <input type="submit" value="Submit" name="submit">
        		<input type="submit" value="Cancel" name="cancel">
       
      			</div>
				</form>
                </div>
        
		</div>
        </div>
              <div>
                
                                </div>                
               	</div>
                
                </div>
                
 <div id="footer">
     <div class="clear"></div> 
    </div>
    </div>
</body>
</html>
