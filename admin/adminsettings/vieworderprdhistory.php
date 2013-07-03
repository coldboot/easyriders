<?php include('header.php'); 
      
	
	 $productid=$_GET['productid'];
	 $news_Check	= "SELECT * FROM ".ORDERPRODUCT." WHERE `productId` ='$productid'";
	$news_Check=mysql_query($news_Check) or die(mysql_error());
	$news_Fetch=mysql_fetch_array($news_Check);	
	
	
	$cat_id = $news_Fetch['subcategoryid'];
	
	$sel_cat	= "SELECT * FROM ".ORDERCAT." WHERE `intCatid` ='$cat_id'";
	$res_cat	= mysql_query($sel_cat) or die(mysql_error());
	$result	= mysql_fetch_array($res_cat);	
	
 
?>
	<!--<div id="welcome" title="Welcome to Shopsteria">
<p><strong>Here admin can View the Added category names. On this page admin can able to edit,delete and change the status of the category details.</strong></p>
	</div>-->
<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title">
				<a name="viewcat"></a>
				<h3>Product Details</h3>
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
    
    <td width="97%" valign="top"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
<tr>
        <td colspan="3" align="center" class="linksnew">&nbsp;</td>
      </tr>
      <tr align="center" class="tdhead">
        <td align="right" width="20%" valign="top" class="white"><strong>Subcategory Name</strong></td>
        <td align="center" width="3%"  valign="top" class="bluehead">:</td>
        <td align="left" valign="top" class="white1"><?php echo $result['subcategoryname'];?></td>
      </tr>
	    <tr align="center" class="tdhead">
        <td align="right" width="20%" valign="top" class="white"><strong>Product Name</strong></td>
        <td align="center"  width="3%" valign="top" class="bluehead">:</td>
        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['productname'];?></td>
      </tr>
	    <tr align="center" class="tdhead">
        <td align="right" width="20%" valign="top" class="white"><strong>Prize</strong></td>
        <td align="center"  width="3%" valign="top" class="bluehead">:</td>
        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['prize'];?></td>
      </tr>
	     <tr align="center" class="tdhead">
        <td align="right" width="20%" valign="top" class="white"><strong>Stock Status</strong></td>
        <td align="center"  width="3%" valign="top" class="bluehead">:</td>
        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['Stock'];?></td>
      </tr>
	  
	     <tr align="center" class="tdhead">
        <td align="right" width="20%" valign="top" class="white"><strong>Quantity</strong></td>
        <td align="center"  width="3%" valign="top" class="bluehead">:</td>
        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['Stockquantity'];?></td>
      </tr>
	   
	     <tr align="center" class="tdhead">
        <td align="right" width="20%" valign="top" class="white"><strong>Product Description</strong></td>
        <td align="center"  width="3%" valign="top" class="bluehead">:</td>
        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['productdescription'];?></td>
      </tr>
	 
	     <tr align="center" class="tdhead">
        <td align="right" width="20%" valign="top" class="white"><strong>Product Image</strong></td>
        <td align="center"  width="3%" valign="top" class="bluehead">:</td>
        <td align="left" valign="top" class="white1"><img src="<?php echo $PATH.$news_Fetch['proimage'];?>" border="0" width="150" height="100" /></td>
      </tr>
	 
	     <tr align="center" class="tdhead">
        <td align="right" width="20%" valign="top" class="white"><strong>Date</strong></td>
        <td align="center"  width="3%" valign="top" class="bluehead">:</td>
        <td align="left" valign="top" class="white1"><?php echo $news_Fetch['dtnow'];?></td>
      </tr>
	  
	   
	  	 	  
      <tr align="center" valign="middle" class="actionText">
        <td colspan="3" align="right"><a class="linksnew" href="javascript:history.back(-1);">Back</a> </td>
      </tr>
    </table></td>
   
  </tr>
 
</table>
					</form>

<?php 					
					if($limit < $total)
					{
							if ($page == 1)
							{
								echo ""; 
							}
							else 
							{       
								echo "<a href=\"viewnews.php?sortby=".$SortList."&page=" . ($page - 1) . "\" class='linksnew'>Prev</a>"; 
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
									echo "<a href=\viewnews.php?sortby=".$SortList."&page=$i\" class='linksnew'> $i</a>"."</font>"; 
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
								echo "<a href=\"viewnews.php?sortby=".$SortList."&page=" . ($page + 1) . "\" class='linksnew'>Next</a>";
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