<?php
include('header.php');

$flag=$_REQUEST['flag'];
$id=$_REQUEST['oid'];
//$set=$_GET['set'];
	


if($flag == "pending")
{
	$Update_Member	=	"UPDATE ".CHECKOUT." SET `orderstatus`='$flag' WHERE `intId`='$id'";
	$Result_Member	=	mysql_query($Update_Member) or die(mysql_error());
	$rflag	=	"success";
}
elseif($flag == "delivered")
{
	$Update_Member	=	"UPDATE ".CHECKOUT." SET `orderstatus`='$flag' WHERE `intId`='$id'";
	$Result_Member	=	mysql_query($Update_Member); 
	$rflag	=	"success";
}
elseif($flag == "paid")
{
	$Update_Member	=	"UPDATE ".CHECKOUT." SET `paystaus`='$flag' WHERE `intId`='$id'";
	$Result_Member	=	mysql_query($Update_Member); 
	$rflag	=	"success";
}
elseif($flag == "unpaid")
{
	$Update_Member	=	"UPDATE ".CHECKOUT." SET `paystaus`='$flag' WHERE `intId`='$id'";
	$Result_Member	=	mysql_query($Update_Member); 
	$rflag	=	"success";
}
elseif($flag == "delete")
{	
		$sel_ship = "SELECT * FROM ".CHECKOUT." WHERE `intId`='$id'";	
		$res_ship = mysql_query($sel_ship) or die(mysql_error());
		$fet_ship = mysql_fetch_array($res_ship);
		$ses_cart = $fet_ship['intSessionId'];
		
		$sel_cart = "SELECT * FROM ".ADDCART." WHERE `SessionId`='$ses_cart'";	
		$res_cart = mysql_query($sel_cart) or die(mysql_error());
		while($fet_cart = mysql_fetch_array($res_cart))
			{
				$del_cart = "DELETE FROM ".ADDCART." WHERE `SessionId`='$ses_cart'";
				mysql_query($del_cart);
			}
		
		$Delete_SHIPPING=	"DELETE FROM ".CHECKOUT." WHERE `intId`='$id'";
		$Result_SHIPPING=	mysql_query($Delete_SHIPPING) or die(mysql_error());
		$rflag	=	"success";
	}
$rtype= $flag;

$pagqry="select * from ".CHECKOUT." order by intId DESC" ;
	
$R_Check	= mysql_query($pagqry) or die(mysql_error());
$C_Check	= mysql_num_rows($R_Check);
$total		= mysql_num_rows($R_Check);	
	
$page = $_GET['page']; 
$limit = $Fetch['intRows']; 

$pager  = getPagerData($total, $limit, $page); 
$offset = $pager->offset; 
$limit  = $pager->limit; 
$page   = $pager->page; 	

$limqry		= "select * from ".CHECKOUT."  order by intId DESC  limit $offset,$limit ";
$R_Check1	= mysql_query($limqry);

?>

<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title">
				<h3>View Order </h3>
			</div>
			<?php
  # Display the Result(Status) 
  if($rflag == "success") 
  { 
	if($rtype == "delivered")
	  	$rDisp	=	"Order Status Successfully Changed To Delivered";
	elseif($rtype	== "pending")
		$rDisp	=	"Order Status Successfully Changed To Pending";
	elseif($rtype == "paid" )
		$rDisp	=	"Pay Status Successfully Changed To Paid";
	elseif($rtype == "unpaid")
		$rDisp	=	"Pay Status Successfully Changed To UnPaid";
	elseif($rtype == "delete")
		$rDisp	=	"Order Deleted Successfully";
	 
  }
  ?>
			<?php 	if($rflag == "success")  { ?>
   	<div class="response-msg success ui-corner-all"><span><?php echo $rDisp; ?></span></div>
									  <?php } ?>
			<div class="hastable">
				<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3">
					<thead><?php if($C_Check ==0) { ?>
					<tr>
						<td colspan="12" align="center" class="information">
							<span style="font-size:14px; color:#FF0000">Orders Not Found</span>
						</td>
					</tr>
					<?php } else {?>
					
					<!--<tr align="center" class="contentlinks1">
						<td colspan="8" align="left" class="white"><b>Viewing the Orders</b></td>
					</tr>-->
          			
					<tr>
					
					<th width="10%">S.No</th>
						    <th width="20%">Customer Name</th> 
							<th width="20%">Order Date</th>
							<th width="15%">Order Status</th>
							<th width="15%">Pay Status</th>
						    <th width="10%">View</th> 
						    <th width="10%">Delete</th>
						           			
          		</tr>
				</thead>
				<?php
					$i = $offset;
					
					while($F_Check = mysql_fetch_array($R_Check1))
					 { 
					 $i++;
					
				?>
				
				<tr align="center">
					<td><center><?php echo $i; ?></center></td>
					
					<td><span style="margin-left:35px;"><?php echo ucfirst($F_Check['varFirstName']." ".$F_Check['varLastName']); ?></span></td>
					
					<td><center><?php  $date = $F_Check['varPayDate']; echo $date=gmdate('d-m-Y',$date); ?></center></td>
					
					<td style="padding-left:35px;">
					<?php if($F_Check['orderstatus'] == "delivered") { ?>
						<a href="vieworder.php?flag=pending&amp;oid=<?php echo $F_Check['intId'];?>&amp;page=<?php echo $page;?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Delivered"><span class="ui-icon ui-icon-check"></span></a>
					<?php } else { ?>
						<a href="vieworder.php?flag=delivered&amp;oid=<?php echo $F_Check['intId'];?>&amp;page=<?php echo $page;?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Pending"><span class="ui-icon ui-icon-closethick"></span></a>
					<?php } ?>
					</td>
					
					<td style="padding-left:35px;">
					<?php if($F_Check['paystaus'] == "paid") { ?>
						<a href="vieworder.php?flag=unpaid&amp;oid=<?php echo $F_Check['intId'];?>&amp;page=<?php echo $page;?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Paid"><span class="ui-icon ui-icon-check"></span></a>
					<?php } else { ?>
						<a href="vieworder.php?flag=paid&amp;oid=<?php echo $F_Check['intId'];?>&amp;page=<?php echo $page;?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Unpaid"><span class="ui-icon ui-icon-closethick"></span></a>
					<?php } ?>
					</td>
										
					<td style="padding-left:22px;"><a href="order_details.php?mid=<?php echo $F_Check['intId'];?>&amp;page=<?php echo $page;?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="View Order Details"><span class="ui-icon ui-icon-folder-open"></span></a></td>            		
					
					<td style="padding-left:22px;"><a href="vieworder.php?flag=delete&amp;oid=<?php echo $F_Check['intId'];?>&amp;page=<?php echo $page;?>" onclick="return calldel(' Do You Want To Delete This Order')"  class="btn_no_text btn ui-state-default ui-corner-all tooltip"><span class="ui-icon ui-icon-circle-close"></span></a></td>
				</tr>
				
				
				<?php } } ?>
				</table>
				
						<table width="96%"  border="0" align="center" cellpadding="3" cellspacing="3">
							<tr>
								<td width="97%" align="right" class="test">
								<?php 					
									if($limit < $total)
										{
											if ($page == 1)
												echo ""; 
											else
												echo '<a href="vieworder.php?page=' .($page - 1) .'" class="linksnew">Prev</a>'; 
											
											for ($i = 1; $i <= $pager->numPages; $i++) 
											{ 
												echo " | "; 
												if ($i == $pager->page)
													echo "<span class='Hint1'>"."$i"."</span>"; 
												else
													echo '<a href="vieworder.php?page=' . $i .'" class="linksnew">'.$i.'</a>'; 
											}
											
											if ($i > 1)
												echo " | "; 
												
											if ($page == $pager->numPages) 
												echo "";
											else   
												echo '<a href="vieworder.php?page=' .($page +1) .'" class="linksnew">Next</a>'; 
										}		
								?>
								</td>
							</tr>
						</table>
				
					
		 </div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
</div>
<?php include('sidebar.php'); ?>
</div>
<div class="clearfix"></div>
<?php include('footer.php'); ?>
</body>
</html>