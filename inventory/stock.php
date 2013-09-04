<?php
include("../session/session.php");
include("../include/database.php");
$per_page = 19;

$sql = "select * from stock_detail";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page);

?>
 <?php

if(isset($_REQUEST['sub']))
	{
		$t1=date('Y-m-d', strtotime($_POST['tdate']));
		$t2=$_POST['tnm'];
		$qry_pr="insert into stock_detail(stock_name,date) values('".$t2."','".$t1."')";
		$rs_pr=mysql_query($qry_pr);
			
	    if($rs_pr)
		{
			header("location:stock.php");
		}
		else
		{
			echo "error";
		}
    }
	if(isset($_REQUEST['can']))
	{
		header("location:stock.php");
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
	
	$("#content").load("stockpagination.php?page=1", Hide_Load());



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
		
		$("#content").load("stockpagination.php?page=" + pageNum, Hide_Load());
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
        
       	<table class="emp_tab" cellpadding="0" cellspacing="0">
        <tr class="search_res">
        <td width="110"><span class="newbook"><a href="#" rel="popuprel1" class="popup new">New Product</a> </span>
        </td>
        <td class="info">
        <center>Stock Details</center>
        </td>
        
        </tr>
        </table>
        
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
