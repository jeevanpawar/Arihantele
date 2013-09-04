<?php
if(isset($_REQUEST['logout']))
{
	session_destroy();
	header("location:../index.php");
}
?>
<div id="menu_div">
			<div id="navigation">
			<div id="menu">
			<ul id="nav">
			<li class="selected"><a href="home.php">Home</a></li>
            <li ><a href="client.php">Customer</a></li>
            <li ><a href="supplier.php">Suppliers</a></li>
            <li ><a href="stock.php">Stocks</a></li>
            <li ><a href="purchase.php">Purchase</a></li>
            <li ><a href="sale.php">Sale</a></li>
            <li><a class="has_submenu" href="#">Transaction</a>
            <ul>
               <li><a href="custpay.php">Customer</a></li>
               <li><a href="suppay.php">Supplier</a></li>
            </ul>
            </li>
            <li><a class="has_submenu" href="invoicedetails.php">Invoice</a>
            </li>
           <li><a href="?logout">LogOut</a>
           </li>
		</ul><!-- #nav END-->					
		</div><!-- #menu END-->
	</div><!-- #navigation END-->
</div>
<table class="user">
<tr>
<td align="right"><?php echo $a; ?></td><td><?php echo "<img src='../images/user.png'  />"; ?></td>
</tr>
</table>