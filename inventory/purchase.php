<?php
include("../session/session.php");

include("../include/database.php");
$per_page = 19;

$sql = "select * from stock";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page);

?>
<?php
$qry_s="select * from stock";
$res_s=mysql_query($qry_s);

$qry_c="select * from suppliers";
$res_c=mysql_query($qry_c);

$qry_sd="select * from stock_detail";
$res_sd=mysql_query($qry_sd);

?>
 <?php

if(isset($_REQUEST['sub']))
	{
		$t1=date('Y-m-d', strtotime($_POST['tdate']));
		$t2=$_POST['tnm'];
		$qry_pr="insert into product(pname,date) values('".$t1."','".$t2."')";
		$rs_pr=mysql_query($qry_pr);
			
	    if($rs_pr)
		{
			header("location:purchase.php");
		}
		else
		{
			echo "error";
		}
    }
	if(isset($_REQUEST['can']))
	{
		header("location:purchase.php");
	}

?>
<?php
	if(isset($_REQUEST['submit']))
	{
		$t1=date('Y-m-d', strtotime($_POST['t1']));
		$t2=$_POST['t2'];
			for($i=0; $i<sizeof($_POST['pr']); $i++)
			{		
				$p1=$_POST['pr'][$i];
				$p2=$_POST['qnt'][$i];
				$p3=$_POST['mrp'][$i];
				$p4=$_POST['tax'][$i];
				$p5=$_POST['rate'][$i];			
				$p6=$_POST['amt'][$i];
				
					$qry_p="insert into sub_billtype(s_name,qty,mrp,tax,rate,amt,date,billtype) values('".$p1."','".$p2."','".$p3."','".$p4."','".$p5."','".$p6."','".$t1."','".$t2."')";
			   $flag=0;
		       $qry_bill="select * from sub_billtype where s_name='".$p1."' and billtype='".$t2."'";
	    	   $res_bill=mysql_query($qry_bill) or die(mysql_error());
               while($row_c=mysql_fetch_array($res_bill))
		      {
			   	     $a=$row_c[3]+$p2;
					 $b=
			         $qry_up="update sub_billtype SET qty='".$a."' where s_id=$row_c[0]";
        			 $res_b=mysql_query($qry_up) or die(mysql_error());
				     $flag=1;
		           } 
		       }
		       if($flag==0)
	 		   $res_b=mysql_query($qry_p) or die(mysql_error());
		       if($res_b)
		       {
			       header("location:purchase.php");
		       }
		       else
		       {
			       echo "error";
		       }
		 }

		
	
	if(isset($_REQUEST['can']))
	{
		header("location:purchase.php");
	}
?>


<html>
<head>
<title>Arihant Electricals</title>
<link rel="stylesheet" href="../styles2.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="js/addrow.js"></script>
<script type="text/javascript" src="custom.js"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/slider.js"></script>
<script type="text/javascript" src="../js/superfish.js"></script>
<script type="text/javascript" src="../js/toword.js"></script>
<script>
var total = 0;
function getValues()
 {
	var qty = 0;
	var rate = 0;
	var obj = document.getElementsByTagName("input");
      for(var i=0; i<obj.length; i++){
         if(obj[i].name == "qnt[]")
		 {
			 var qty = obj[i].value;
			
		 }
         if(obj[i].name == "rate[]")
		 {
			 var rate = obj[i].value;
		 }
         if(obj[i].name == "amt[]")
		 {
          		if(qty > 0 && rate > 0)
				{
					obj[i].value = qty*rate;
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
		  add+=(vat*1);		 
        document.getElementById("total").value = add;
		var words = toWords(add);
		document.getElementById("word").innerHTML=words;
        total=0;
}
//function amt()
//{
//var a=document.getElementsByName("qnt[]").value;
//var b=document.getElementsByName("rate[]").value;
//document.getElementsByName("amt[]").value=parseInt(a*b);
//}

</script>
	<script type="text/javascript">
	
	$(document).ready(function(){
		
	//Display Loading Image
	function Display_Load()
	{
	    $("#loading").fadeIn(900,0);
	
	}
	//Hide Loading Image
	function Hide_Load()
	{
		$("#loading").fadeOut('slow');
	};
	

    //Default Starting Page Results
   
	$("#pagination li:first").css({'color' : '#FF0084'}).css({'border' : 'none'});
	
	Display_Load();
	
	$("#content").load("parchasepagination.php?page=1", Hide_Load());



	//Pagination Click
	$("#pagination li").click(function(){
			
		Display_Load();
		
		//CSS Styles
		$("#pagination li")
		.css({'color' : '#0063DC'});
		
		$(this)
		.css({'color' : '#FF0084'})
		.css({'border' : 'none'});

		//Loading Data
		var pageNum = this.id;
		
		$("#content").load("parchasepagination.php?page=" + pageNum, Hide_Load());
	});
	
	
});
	</script>
</head>
<body>
<div id="container">
<div id="sub-header">
		<?php
		   include("include/p_header.php");
		?>
       
       	<table class="emp_tab">
        <tr class="search_res">
        <td class="info">
        <span class="newbook"><a href="#" rel="popuprel" class="popup new">New Stock</a> </span>
        <span class="newbook"><a href="#" rel="popuprel1" class="popup new">New Product</a> </span>
        </td>
                </tr>
        </table>
        <div class="popupbox_small" id="popuprel">
		<div id="intabdiv">
        <h2>New Stock</h2>
                
                <form action="" method="post" name="po">
                <table class="sale">
                <tr>
                <td>Date:</td>
                <td><input type="text" name="t1" class="q_in" value="<?php echo date('d-m-Y'); ?>"></td>
                <td>Bill Type:</td>
                <td>           
                <select name="t2" class="des_cap">
                <option value="With Bill">With Bill</option>
                <option value="Without Bill">Without Bill</option>
                </select>
                </td>
                </tr>
                </table>
                <br><br>
                <table class="des">
                <tr class="menu_header">
                <td width="2%">S</td>
                <td width="25%">Stock Name</td>
                <td width="15%">Qty</td>
                <td width="15%">Rate</td>
                <td width="15%">MRP</td>
                <td width="15%">TAX</td>          
                <td width="15%">Amount</td>
                </tr>
                <div class="adddel">
       			<input type="button" value="+" class="add" onClick="addRow('dataTable');add();" >&nbsp;
		 		<input type="button" value="-" class="add" onClick="deleteRow('dataTable')" >
         		</div>
                </table>
                <table class="des" id="dataTable">
                <tr>
                <td width="2%"><input class="ch" type="checkbox" name="chk[]"/></td>
                <td width="25%">
                
                <select name="pr[]" class="des_cap">
                <?php
				$pro="select * from product";
				$res_pro=mysql_query($pro);
			
			    while($row_pr=mysql_fetch_array($res_pro))
				{
						
					echo "<option>";
					echo $row_pr[2];
					echo "</option>";
				}
				?>
                </select>
                </td>
                <td width="15%">
                 <input class="des_cap" type="text" name="qnt[]" id="qnt" value="" ><br>
                </td>
                
                <td width="15%">
                 <input class="des_q" type="text" name="rate[]" id="rate" value=""  ><br>
                </td>
                <td width="15%">
                 <input class="des_cap" type="text" name="mrp[]" id="" value="" ><br>
                </td>
               
                 <td width="15%" >
                <select name="tax[]" class="des_cap">
                <option value="5">5%</option>
                <option value="12.5">12.5%</option>
                </select>
                </td>
                
                <td width="15%">                
                 <input class="des_q" type="text" name="amt[]" id="amt" value="0" onKeyUp="getValues()" readonly><br>
                </td>
                </tr>
                </table>
                
 				<div class="i_button">
       			 <input type="submit" value="Submit" name="submit">
        		<input type="submit" value="Cancel" name="cancel">
       
      			</div>
				</form>
        </div>
		</div>
                <div class="popupbox_smallUP" id="popuprel1">
		<div id="intabdiv">
        <h2>New Product</h2><br/><br/>
                
                <form action="" method="post" name="po">
                <table class="salePU">
                <tr>
                <td>Date:</td>
                <td><input type="text" name="tdate" class="q_in" value="<?php echo date('d-m-Y'); ?>"></td>
                <tr/>
                <tr>
                <td>Product Name:</td>
                <td><input type="text" name="tnm" class="q_in"></td>
                </tr>
                </table>
                <div class="i_buttonPU">
       			<input type="submit" value="Submit" name="sub">
        		<input type="submit" value="Cancel" name="can">
       
      			</div>
				</form>
        </div>
		</div>

       		<div id="loading" ></div>
			<div id="content" ></div>
            
        	<table width="800px">
			<tr><Td>
			<ul id="pagination">
				<?php
				//Show page links
				for($i=1; $i<=$pages; $i++)
				{
					echo '<li id="'.$i.'">'.$i.'</li>';
				}
				?>
	</ul>	
	</Td></tr></table>

                </div>                 
               
  				</div>          
       
 <div id="fade"></div>       
 <div class="clear"></div>
 <div id="footer">
     <div class="clear"></div> 
    </div>
 
</body>
</html>
