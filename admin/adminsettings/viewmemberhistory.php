<?php include('header.php'); 
      
	
	 $memberid=$_GET['memberid'];
	$news_Check	= "SELECT * FROM ".MEMBER." WHERE `intmemberid` ='$memberid'";
	$news_Check	= mysql_query($news_Check) or die(mysql_error());
	$news_Fetch	= mysql_fetch_array($news_Check);	
	

?>
	<!--<div id="welcome" title="Welcome to Shopsteria">
<p><strong>Here admin can View the Added category names. On this page admin can able to edit,delete and change the status of the category details.</strong></p>
	</div>-->
<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title">
				<a name="viewcat"></a>
				<h3>Member Details</h3>
				</div>
				<table width="548">	
			  <tr  align="center"> 

  </tr>
  <tr><td>&nbsp;</td></tr>
  </table>
				<div class="hastable">
					<form name="myform" class="" method="post" action="">
						<table width="70%" border="0" align="center" cellpadding="3" cellspacing="0" class="tblebg">
  
  <tr>
  
  
  
		
    
    <td width="97%" valign="top">	<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">	  <tr>        <td colspan="3" align="center" class="linksnew">&nbsp;</td>      </tr>
      <tr align="center" class="tdhead">        <td align="right" width="20%" valign="top" class="white"><strong>Id</strong></td>        <td align="center" width="3%"  valign="top" class="bluehead">:</td>        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['intmemberid'];?></td>      </tr>      <tr align="center" class="tdhead">        <td align="right" width="20%" valign="top" class="white"><strong>WP Id</strong></td>        <td align="center" width="3%"  valign="top" class="bluehead">:</td>        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['intWPid'];?></td>      </tr>      <tr align="center" class="tdhead">        <td align="right" width="20%" valign="top" class="white"><strong>Rider Of Week page</strong></td>        <td align="center" width="3%"  valign="top" class="bluehead">:</td>        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['intROW'];?></td>      </tr>      <tr align="center" class="tdhead">        <td align="right" width="20%" valign="top" class="white"><strong>First Name</strong></td>        <td align="center" width="3%"  valign="top" class="bluehead">:</td>        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['varFirstname'];?></td>      </tr>	  <tr align="center" class="tdhead">        <td align="right" width="20%" valign="top" class="white"><strong>Last Name</strong></td>        <td align="center"  width="3%" valign="top" class="bluehead">:</td>        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['varLastname'];?></td>      </tr>	  <tr align="center" class="tdhead">        <td align="right" width="20%" valign="top" class="white"><strong>Ride Name</strong></td>        <td align="center"  width="3%" valign="top" class="bluehead">:</td>        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['varRidename'];?></td>      </tr>	  <tr align="center" class="tdhead">        <td align="right" width="20%" valign="top" class="white"><strong>Email ID</strong></td>        <td align="center"  width="3%" valign="top" class="bluehead">:</td>        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['varEmail'];?></td>      </tr>	  <tr align="center" class="tdhead">        <td align="right" width="20%" valign="top" class="white"><strong>Mobile No</strong></td>        <td align="center"  width="3%" valign="top" class="bluehead">:</td>        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['varPhone'];?></td>      </tr>	  <tr align="center" class="tdhead">        <td align="right" width="20%" valign="top" class="white"><strong>Status</strong></td>        <td align="center"  width="3%" valign="top" class="bluehead">:</td>        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['varStatus'];?></td>      </tr>	  <tr align="center" class="tdhead">        <td align="right" width="20%" valign="top" class="white"><strong>Active Id</strong></td>        <td align="center"  width="3%" valign="top" class="bluehead">:</td>        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['activeid'];?></td>      </tr>	  <tr align="center" class="tdhead">        <td align="right" width="20%" valign="top" class="white"><strong>Rego Date</strong></td>        <td align="center"  width="3%" valign="top" class="bluehead">:</td>        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['varRegoDate'];?></td>      </tr>	  <tr align="center" class="tdhead">        <td align="right" width="20%" valign="top" class="white"><strong>Activation Date</strong></td>        <td align="center"  width="3%" valign="top" class="bluehead">:</td>        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['varActivationDate'];?></td>      </tr>      <tr align="center" class="tdhead">        <td align="right" width="20%" valign="top" class="white"><strong>How Long Riding</strong></td>        <td align="center"  width="3%" valign="top" class="bluehead">:</td>        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['varridingtime'];?>&nbsp;(Hrs)</td>      </tr>      <tr align="center" class="tdhead">        <td align="right" width="20%" valign="top" class="white"><strong>How Often Rides Per Week</strong></td>        <td align="center"  width="3%" valign="top" class="bluehead">:</td>        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['varoftenrides'];?>&nbsp;(Nos)</td>      </tr>	  <tr align="center" class="tdhead">        <td align="right" width="20%" valign="top" class="white"><strong>Type of Bike</strong></td>        <td align="center"  width="3%" valign="top" class="bluehead">:</td>        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['varbiketype'];?></td>      </tr>      <tr align="center" class="tdhead">        <td align="right" width="20%" valign="top" class="white"><strong>Biography</strong></td>        <td align="center"  width="3%" valign="top" class="bluehead">:</td>        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['varbiography'];?></td>      </tr>	  <tr align="center" class="tdhead">        <td align="right" width="20%" valign="top" class="white"><strong>Image</strong></td>        <td align="center"  width="3%" valign="top" class="bluehead">:</td>        <td align="left" valign="top" class="white1"><img src="../../deimage1/<?php echo $news_Fetch['productimage'];?>" width="140" height="150" /></td>      </tr>	  <tr align="center" class="tdhead">        <td align="right" width="20%" valign="top" class="white"><strong>Mug Shot</strong></td>        <td align="center"  width="3%" valign="top" class="bluehead">:</td>        <td align="left" valign="top" class="white1"><img src="../../deimage1/<?php echo $news_Fetch['varMugShot'];?>" width="140" height="150" /></td>      </tr>      <tr align="center" class="tdhead">        <td align="right" width="20%" valign="top" class="white"><strong>Accepted Terms</strong></td>        <td align="center"  width="3%" valign="top" class="bluehead">:</td>        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['varAcceptTerms']." ".$news_Fetch['varAcceptTermsDate'];?></td>      </tr>      <tr align="center" class="tdhead">        <td align="right" width="20%" valign="top" class="white"><strong>Insurance</strong></td>        <td align="center"  width="3%" valign="top" class="bluehead">:</td>        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['varInsurance'];?></td>      </tr>      <tr align="center" class="tdhead">        <td align="right" width="20%" valign="top" class="white"><strong>Approved</strong></td>        <td align="center"  width="3%" valign="top" class="bluehead">:</td>        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['varApproved']." ".$news_Fetch['varApprovedDate']." by ".$news_Fetch['varApprovedBy'];?></td>      </tr>	  <tr align="center" class="tdhead">        <td align="right" width="20%" valign="top" class="white"><strong>Suspended Date</strong></td>        <td align="center"  width="3%" valign="top" class="bluehead">:</td>        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['varSuspendedDate'];?></td>      </tr>	  <tr align="center" class="tdhead">        <td align="right" width="20%" valign="top" class="white"><strong>Resigned Date</strong></td>        <td align="center"  width="3%" valign="top" class="bluehead">:</td>        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['varResignedDate'];?></td>      </tr>      <tr align="center" class="tdhead">        <td align="right" width="20%" valign="top" class="white"><strong>Paid</strong></td>        <td align="center"  width="3%" valign="top" class="bluehead">:</td>        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['varPaid']." ".$news_Fetch['varPaidDate'];?></td>      </tr>
	         <tr align="center" valign="middle" class="actionText">        <td colspan="3" align="right"><a class="linksnew" href="javascript:history.back(-1);">Back</a> </td>      </tr>
    </table>  </td>  </tr></table></form>
<?php 					
					if($limit < $total)
					{
							if ($page == 1)
							{
								echo ""; 
							}
							else 
							{       
								echo "<a href=\"viewmemberhistory.php?sortby=".$SortList."&page=" . ($page - 1) . "\" class='linksnew'>Prev</a>"; 
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
									echo "<a href=\viewmemberhistory.php?sortby=".$SortList."&page=$i\" class='linksnew'> $i</a>"."</font>"; 
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
								echo "<a href=\"viewmemberhistory.php?sortby=".$SortList."&page=" . ($page + 1) . "\" class='linksnew'>Next</a>";
							}
					}		
					?>    
	
		  
					
				

				<!--<div class="title title-spacing">
					<h3>Pagination example</h3>
				</div>-->
				<!--<ul class="pagination">
					<li class="previous-off">&laquo;Previous</li>
					<li class="active">1</li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li>...........</li>
					<li><a href="#">7</a></li>
					<li><a href="#">8</a></li>
					<li><a href="#">9</a></li>

					<li><a href="#">10</a></li>
					<li class="next"><a href="#">Next &raquo;</a></li>
				</ul>-->
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