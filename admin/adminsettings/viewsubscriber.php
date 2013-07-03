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
	
	
	if($flag == "active")
	{
		 $Update_User	=	"UPDATE ".SUBSCRIBER." SET `varStatus`='Active' WHERE `intSubId`='$memberid'";
		$Result_User	=	mysql_query($Update_User) or die(mysql_error());
		$rflag	=	"success";
		$rType	=	"active";
	}
	elseif($flag == "deactive")
	{
	
		$Update_User	=	"UPDATE ".SUBSCRIBER." SET `varStatus`='DeActive' WHERE `intSubId`='$memberid'";
		$Result_User	=	mysql_query($Update_User); 
		$rflag	=	"success";
		$rType	=	"deactive";
	}
	
	elseif($flag == "delete")
	{
		$Delete_Member	=	"DELETE FROM ".SUBSCRIBER." WHERE `intSubId`='$memberid'";
		$Result_Member	=	mysql_query($Delete_Member);
		$rflag	=	"success";
		$rType	=	"delete";
	}

 	$pagqry="SELECT * FROM ".SUBSCRIBER." WHERE `varEmail` LIKE '$SortList%' ";
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

 	$limqry		= "SELECT * FROM ".SUBSCRIBER." WHERE `varEmail` LIKE '$SortList%' order by intSubId DESC  limit $offset,$limit ";
	$R_Check1	= mysql_query($limqry);

?>
	<!--<div id="welcome" title="Welcome to Shopsteria">
<p><strong>Here admin can View the Added category names. On this page admin can able to edit,delete and change the status of the category details.</strong></p>
	</div>-->
<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title">
				<a name="viewcat"></a>	<h3>View Subscriber</h3>
				</div>
			
				<?php /*?>		<!--
						<?php if($total == 0) { ?>
	  <div class="response-msg error ui-corner-all">
			<span>Error message</span>
			Category List Not Found!
	  </div><?php } ?>--><?php */?>
	  
	  
			<table width="548">	
			  <tr  align="center"> 
    <td width="504" colspan="8">
		<table width="85%" cellpadding="2" cellspacing="2">
	<form name="view_cat" action="" method="POST" >
	<tr>
	<td align="right" class="white">
	<b>Search&nbsp;E-Mail&nbsp;ID</b>	</td>
	<td>&nbsp;	</td>
	<td align="left" width="16%">
		<input type="text" class="inputbox1" name="sortby">	</td>
		<td width="43%">	<input type="submit" value="search" name="submit" class="btn ui-state-default ui-corner-all">	</td>
	</tr>
	
	</form>
	</table>
	
	
	
	</td>
  </tr>
 
  <tr>
           <td colspan="8" align="center"> 
					   <?php
						echo "<a class=\"leftlinks\" href=\"viewsubscriber.php?sortby=all\">All</a>";?>
									  &nbsp;&nbsp;&nbsp;
									  <?php 		for($ASCII = 65; $ASCII <= 90 ; $ASCII++)
						{				
						  echo "<a class=\"leftlinks\" href=\"viewsubscriber.php?sortby=".chr($ASCII)."\">".chr($ASCII)."</a>&nbsp;" ."&nbsp;";
						}	
					 ?>		 	</td>
  </tr>
	
  <tr><td>&nbsp;</td></tr>
  	  <?php
  # Display the Result(Status) 
  if($rflag == "success") 
  { 
	  if($rType == "add")
	  	$rDisp	=	"Subscriber Details Successfully Added";
	  elseif($rType == "active")
	  	$rDisp	=	"Subscriber Details Successfully Activated";
	  elseif($rType == "deactive")
	  	$rDisp	=	"Subscriber Details Successfully De-Activated";
		 elseif($rType == "delete") 
	  	$rDisp	=	"Subscriber Details Deleted Successfully";
	  elseif($rType == "update")
	  	$rDisp	=	"Subscriber Details Updated Successfully";
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
											
					<form name="myform" class="" method="post" action="">
					
					
					
					
						<table> 
						<thead>
					
									
					<? if ($total== 0)
					 {
                    echo('<tr><td colspan="6" align="center"><center><span class = "red">Subscriber List Not Found!</span><center></td></tr>');
                    }
                     else
                     {
                    echo ('
                     <tr>
							<th width="20" align="center">S.No</th>
						    <th width="300"style="text-align:left">Email ID</th> 
							 <th width="50" align="left">Status</th>
							 <th width="50" align="left">Edit</th> 
						    <th width="50" align="center">Delete</th>
						    </tr> ');

                           }
                    ?>
							
					
						
						 
						</thead> 
						<tbody> 
				<?php
					$i=$offset ;
					while($fetch_cat = mysql_fetch_array($R_Check1)){
											  $i++;

					?>
						<tr>
							<td align="center"><center><?php echo $i;?></center></td> 
						    <td style="text-align:left" ><?php echo $fetch_cat['varEmail'];?></td> 
							<!--<td><?php echo $fetch_cat['varStatus'];?></td> -->
							<td align="center" style="padding-left:20px;"><?php if($fetch_cat['varStatus'] == "Active") { ?>
                                <a href="viewsubscriber.php?flag=deactive&amp;memberid=<?php echo $fetch_cat['intSubId'];?>&page=<?php echo $_GET['page'];?>"  class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="De-Actived">
								<span class="ui-icon ui-icon-unlocked"></span></a>
                                <?php } else { ?>
                                <a href="viewsubscriber.php?flag=active&amp;memberid=<?php echo $fetch_cat['intSubId'];?>&page=<?php echo $_GET['page'];?>"  class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Actived">
								<span class="ui-icon ui-icon-locked"></span></a><?php } ?></td>
								
								 <td align="center" style="padding-left:10px;"><a href="addsubscriber.php?intSubId=<?php echo $fetch_cat['intSubId'];?>&page=<?php echo $_GET['page'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Edit This Subscriber">
							<span class="ui-icon ui-icon-pencil"></span>
							<!--	<img src="../../images/reply2.gif" border="0" title="Edit">-->
							</a></td> 
							
							
							
						    <td align="center" style="padding-left:20px;">
							<a class="btn_no_text btn ui-state-default ui-corner-all tooltip" href="viewsubscriber.php?flag=delete&amp;memberid=<?php echo $fetch_cat['intSubId'];?>&page=<?php echo $_GET['page'];?>" title="Delete This Subscriber"><span class="ui-icon ui-icon-circle-close" onClick="return calldel('Do You Want To Delete This Subscriber?');"></span></a>
							
							</td> 
					      </tr> 
						  <?php 
						  } ?>
						</tbody>
									
						</table>
						
						
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
								echo "<a href=\"viewsubscriber.php?sortby=".$SortList."&page=" . ($page - 1) . "\" class='linksnew'>Prev</a>"; 
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
									echo "<a href=\"viewsubscriber.php?sortby=".$SortList."&page=$i\" class='linksnew'> $i</a>"."</font>"; 
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
								echo "<a href=\"viewsubscriber.php?sortby=".$SortList."&page=" . ($page + 1) . "\" class='linksnew'>Next</a>";
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