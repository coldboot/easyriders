<?php include('header.php'); 
	
	$SortBy	= $_REQUEST['sortby'];
     $rflag=$_REQUEST['rflag'];	
	$rtype=$_REQUEST['rtype'];	

	if(($SortBy == "") || ($SortBy == "all")) { echo $SortList = ""; } else { $SortList = $SortBy; }

    $flag=$_REQUEST['flag'];
    $memberid=$_REQUEST['memberid'];
  	
	#For Display the Result
	$rflag	=	$_GET['rflag'];	
	$rType	=	$_GET['rtype'];	
	
if($flag == "delete")
	{
		$Delete_Member	=	"DELETE FROM ".ORDERS." WHERE `memberid`='$memberid'";
		$Result_Member	=	mysql_query($Delete_Member);
		$rflag	=	"success";
		$rType	=	"delete";
	}


  $pagqry="SELECT * FROM ".ORDERS."  where `productname` LIKE '$SortList%' order by memberid DESC ";
	$R_Check	= mysql_query($pagqry) or die(mysql_error());
	$C_Check	= mysql_num_rows($R_Check);
	 $total		= mysql_num_rows($R_Check);	
	
	 $page = $_GET['page']; 
	 $limit = $Fetch['intRows']; 
//$limit = 2; 

	$pager  = getPagerData($total, $limit, $page); 
	$offset = $pager->offset; 
	$limit  = $pager->limit; 
	 $page   = $pager->page; 	

 	$limqry		= "SELECT * FROM ".ORDERS." WHERE `productname` LIKE '$SortList%' order by memberid DESC limit $offset,$limit";
	$R_Check1	= mysql_query($limqry);
?>
	
<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title">
				<a name="viewcat"></a>	<h3>View Order</h3>
				</div>
	  
			<table width="548">	
			 
	
  	  <?php
  # Display the Result(Status) 
  if($rflag == "success") 
  { 
	  if($rType == "add")
	  	$rDisp	=	"Details Successfully Sent";
	  elseif($rType == "active")
	  	$rDisp	=	"Details Successfully Actived";
	  elseif($rType == "deactive")
	  	$rDisp	=	"Details Successfully DeActived";
		 elseif($rType == "delete") 
	  	$rDisp	=	"Details Deleted Successfully";
	  elseif($rType == "update")
	  	$rDisp	=	"Details Updated Successfully";
	  echo "<tr>";
		echo "<td colspan=\"7\" align=\"center\" class=\"information\">"; if($rType == "delete") { 
		echo "<div class=\"response-msg error ui-corner-all\">"; }else { 
		echo "<div class=\"response-msg success ui-corner-all\">"; }echo $rDisp;
		echo"</div></td>";
	  echo "</tr>";
  }  
  ?> 
  </table>
				
						
						<div class="hastable">
											
					<table> 
						<thead>
					
									
					<? if ($total== 0)
					 {
                    echo('<tr><td colspan="6" align="center"><center><span class = "red">List Not Found!</span><center></td></tr>');
                    }
                     else
                     {
                     ?>
                     <tr>
							<th width="34" align="center">S.No</th>
						  <!--  <th width="300" align="left">Member Name</th>--> 
							<th width="300" align="left">Email</th> 
							<th width="300" align="left">Order Number</th> 
							 <th width="300" align="left">Order Status</th> 
							  <th width="300" align="left">Order Total</th> 
							<!--  <th width="300" align="left">Payment Method</th>--> 
							 <th width="300" align="left">Date</th> 
							  <th width="300" align="left">Details</th> 
						    <th width="50" align="center">Delete</th>
						    </tr>
							
					
						
						 
						</thead> 
						<tbody> 
				<?php
					$i=$offset ;
					$prdocutprice="";
					while($fetch_cat = mysql_fetch_array($R_Check1)){
											  $i++;
											$memberid=  $fetch_cat['memberid'];
											
				 $sel_membrs		= "SELECT * FROM ".MEMBER." WHERE `intmemberid`='$memberid'";
				 $r_rmembv			= mysql_query($sel_membrs);
				 $r_fetchs			=mysql_fetch_array($r_rmembv);
				 $firstname		=$r_fetchs['varFirstname'];
				 $lastname		=$r_fetchs['varLastname'];
				
				$prdocutprice= $fetch_cat['productprice'];
								
								
					?>
						<tr>
							<td align="center"><?php echo $i;?></td> 
						
							<td><?php echo $r_fetchs['varEmail'];?></td> 
							<td><?php echo $fetch_cat['ordernumber'];?></td> 
							<td><?php echo ucfirst($fetch_cat['orderstatus']);?></td> 
							<td><?php echo number_format($prdocutprice,2).' '.$fetch_cat['currency'];?></td> 
						
							<td><?php echo $fetch_cat['date'];?></td> 
							<td><a href="orderdetails.php?id=<?php echo $fetch_cat['orderid'];?>&memberid=<?php echo $fetch_cat['memberid'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="View More Information"><span class="ui-icon ui-icon-folder-open"></span></a></td> 
						    <td align="center">
							<a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Delete This Order Detail" href="vieworders.php?flag=delete&amp;memberid=<?php echo $fetch_cat['orderid'];?>"><span class="ui-icon ui-icon-circle-close" onClick="return calldel('Do You Want To Delete This Order?');"></span></a>
							
							</td> 
					      </tr> 
						  <?php 
						 } ?>
						</tbody>
									
						</table>
						
						<?php }?>
<?php 					
					if($limit < $total)
					{
					echo'<table width="61%"  border="0" align="left" cellpadding="3" cellspacing="3">
          <tr>
            <td width="97%" align="right" class="test">';
							if ($page == 1)
							{
								echo ""; 
							}
							else 
							{       
								echo "<a href=\"vieworders.php?sortby=".$SortList."&page=" . ($page - 1) . "\" class='linksnew'>Prev</a>"; 
							}
							for ($i = 1; $i <= $pager->numPages; $i++) 
							{ 
								echo " | "; 
								if ($i == $pager->page)
								{ 
									echo "<span class='Hint1'>"."$i"."</span>"; 
								}
								else
								{	 
									echo "<a href=\"vieworders.php?sortby=".$SortList."&page=$i\" class='linksnew'> $i</a>"."</font>"; 
								}
							} 
					 
							if ($i > 1)
							{
								echo " | "; 
							}
							if ($page == $pager->numPages) 
							{
								echo "";
							} 
							else   
							{     
								echo "<a href=\"vieworders.php?sortby=".$SortList."&page=" . ($page + 1) . "\" class='linksnew'>Next</a>";
							}
					}	echo'</td>
  </tr>
</table>';
					?>    
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

<script language="javascript" type="text/javascript">
function calldel(m)
{
  if(!confirm(m))
  {
    return false;
  }
  else
  return true;
}
function calldelno(m)
{
	
  if(alert(m))
  {
    return false;
  }
 return false;
}
</script>