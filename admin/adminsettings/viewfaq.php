<?php include('header.php'); 
	$SortBy	= $_REQUEST['sortby'];
     $rflag=$_REQUEST['rflag'];	
	$rtype=$_REQUEST['rtype'];	

	if(($SortBy == "") || ($SortBy == "all")) { echo $SortList = ""; } else { $SortList = $SortBy; }


    $flag=$_REQUEST['flag'];
    $faqid=$_REQUEST['faqid'];
  	
	#For Display the Result
	$rflag	=	$_GET['rflag'];	
	$rType	=	$_GET['rtype'];	
	
	if($flag == "active")
	{
		 $Update_Member	=	"UPDATE ".FAQ." SET `varStatus`='Active' WHERE `intid`='$faqid'";
		$Result_Member	=	mysql_query($Update_Member);
		$rflag	=	"success";
		$rType	=	"active";
	}
	elseif($flag == "deactive")
	{
	
		$Update_Member	=	"UPDATE ".FAQ." SET `varStatus`='DeActive' WHERE `intid`='$faqid'";
		$Result_Member	=	mysql_query($Update_Member);
		$rflag	=	"success";
		$rType	=	"deactive";
	}
		elseif($flag == "delete")
	{
		$Delete_Member	=	"DELETE FROM ".FAQ." WHERE `intid`='$faqid'";
		$Result_Member	=	mysql_query($Delete_Member);
		$rflag	=	"success";
		$rType	=	"delete";
	}

 	$pagqry="SELECT * FROM ".FAQ." WHERE `varQuestions` LIKE '$SortList%' ";
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

 	$limqry		= "SELECT * FROM ".FAQ." WHERE `varQuestions` LIKE '$SortList%' order by intid DESC  limit $offset,$limit ";
	$R_Check1	= mysql_query($limqry);

?>
	<!--<div id="welcome" title="Welcome to Shopsteria">
<p><strong>Here admin can View the Added category names. On this page admin can able to edit,delete and change the status of the category details.</strong></p>
	</div>-->
<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				
				
				<div class="title">
				<a name="viewcat"></a>	<h3>View FAQ's</h3>
				</div>
				
							  <div align="center">
									<div align="center">
										 <form name="view_cat" action="" method="POST" >
												 <li><b>Search By FAQ's Title:</b>&nbsp;<input type="text" class="inputbox1" name="sortby"><input type="submit" value="search" name="submit" class="btn ui-state-default ui-corner-all"></li>	
										</form>
									 </div>
												 <?php echo "<a class=\"leftlinks\" href=\"viewfaq.php?sortby=all\">All</a>";?>
																	  &nbsp;&nbsp;&nbsp;
																	  <?php 	for($ASCII = 65; $ASCII <= 90 ; $ASCII++){				
														  echo "<a class=\"leftlinks\" href=\"viewfaq.php?sortby=".chr($ASCII)."\">".chr($ASCII)."</a>&nbsp;" ."&nbsp;";}	?>	
												 
								</div>
							  
									  
			            <table width="548" align="center">	
							 <tr  align="center"> 
									<td width="504" colspan="8"></td>
						  	</tr>
							
							 
				    	 <tr><td>&nbsp;</td></tr>
			
  	  <?php
  # Display the Result(Status) 
  if($rflag == "success") 
  { 
	  if($rType == "add")
	  	$rDisp	=	"FAQS Details Successfully Added";
	  elseif($rType == "active")
	  	$rDisp	=	"FAQS Details Successfully Activated";
	  elseif($rType == "deactive")
	  	$rDisp	=	"FAQS Details Successfully DeActivated";
		 elseif($rType == "delete") 
	  	$rDisp	=	"FAQS Details Deleted Successfully";
	  elseif($rType == "update")
	  	$rDisp	=	"FAQS Details Updated Successfully";
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
							<? if ($total== 0) {?>
							     <tr><td colspan="6" align="center">
								 	<center>
									<div class="response-msg error ui-corner-all"><span>FAQs List Not Found!</span ></div>
									</center>
								</td></tr>
							<?php }else {?>
                           <tr>
							<th width="34" align="center">S.No</th>
						    <th width="300" align="left">Questions</th> 
							<th width="300" align="center">Answers</th> 
						    <th width="50" align="center">Action</th> 
						    <th width="50" align="center">Edit</th> 
						    <th width="50" align="center">Delete</th>
						    </tr> <?php  }?>
							 
						</thead> 
						<tbody> 
				<?php
					$i=$offset ;
					while($fetch_cat = mysql_fetch_array($R_Check1)){
					 $i++;
					 ?>
						<tr>
							<td align="center"><center><?php echo $i;?></center></td> 
						    <td align="center"><strong><?php echo ucfirst($fetch_cat['varQuestions']);?></strong></td> 
							<td align="center"><strong><?php echo ucfirst($fetch_cat['description']);?></strong></td> 
											
							    <td style="padding-left:25px;"><?php if($fetch_cat['varStatus'] == "Active") { ?>
                                <a href="viewfaq.php?flag=deactive&amp;faqid=<?php echo $fetch_cat['intid'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Activate"><span class="ui-icon ui-icon-unlocked"></span></a>
								
                                <?php } else { ?>
								
                                <a href="viewfaq.php?flag=active&amp;faqid=<?php echo $fetch_cat['intid'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Deactivate"><span class="ui-icon ui-icon-locked"></span></a><?php } ?></td> 
								
								
						    <td style="padding-left:25px;"><a href="addfaq.php?faqid=<?php echo $fetch_cat['intid'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Edit This FAQS"><span class="ui-icon ui-icon-pencil"></span></a></td> 
							
							
						    <td style="padding-left:25px;"><a href="viewfaq.php?flag=delete&amp;faqid=<?php echo $fetch_cat['intid'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Delete This FAQ"><span class="ui-icon ui-icon-close" onclick="return calldel('Do You Want Delete This faq?');"></span></a></td> 
					      </tr> <?php } ?>
						</tbody>
						</table>
						
						
              <?php 	if($limit < $total){
					echo'<table width="61%"  border="0" align="left" cellpadding="3" cellspacing="3">
                                   <tr>
                                        <td width="97%" align="right" class="test">';
							                if ($page == 1){
												echo ""; }else {       
								               echo "<a href=\"viewfaq.php?sortby=".$SortList."&page=" . ($page - 1) . "\" class='linksnew'>Prev</a>"; }
						         
								             	for ($i = 1; $i <= $pager->numPages; $i++) 
							                       { 
								                          echo " | "; 
								                          if ($i == $pager->page)
							                         	{ 
								                         	echo "<span class='Hint1'>"."$i"."</span>"; 
							                        	}
								                        else
								                       {	 
									                         echo "<a href=\"viewfaq.php?sortby=".$SortList."&page=$i\" class='linksnew'> $i</a>"."</font>"; 
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
														echo "<a href=\"viewfaq.php?sortby=".$SortList."&page=" . ($page + 1) . "\" class='linksnew'>Next</a>";
													}
											}	echo'</td>
						  </tr>
						</table>';?>   
					</form> 
					</div>
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