<?php
  
	include("../include/database.php");
	$c_up=$_REQUEST['c_id2'];
	$c_qry_f="select * from client where c_id=".$c_up;
	$c_res_f=mysql_query($c_qry_f);
	$c_row=mysql_fetch_array($c_res_f);
?>
<br />
		<div class="hr"><center>Update Client Details</center></div>
        <br />
        <div>
        <form action="update.php?client_id=<?php echo $c_up; ?>" method="post" >
        <table class="b_tab11">
        <tr>
        <td width="130">Name:</td>
        <td>
        <input class="q_in" name="t1" type="text" value="<?php echo $c_row[1]; ?>"></td>
        </tr>
        <tr>
        <td>Address:</td>
        <td>
        <textarea class="q_add" name="t2"> <?php echo $c_row[2];?></textarea></td>
        </tr>
        <tr>
        <td>Mobile No:</td>
        <td>
        <input class="q_in"  name="t3" type="text" value="<?php echo $c_row[3]; ?>"/></td>
        </tr>
        <tr>
        <td>Phone No:</td>
        <td>
        <input class="q_in"  name="t4" type="text" value="<?php echo $c_row[4]; ?>"/></td>
        </tr>
        <tr>
        <td>Email Id:</td>
        <td>
        <input class="q_in"  name="t5" type="text" value="<?php echo $c_row[5]; ?>"/></td>
        </tr>
        </table>
        
                
        <div class="addclients_u">
         <input name="c_up" value=" Update " type="submit" />
         <input name="c_up" value=" Cancel " type="submit" />
        </div>
        <br /><br />
        </form>
    </div>
    