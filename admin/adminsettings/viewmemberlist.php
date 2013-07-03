<?php include('header.php');
	$SortBy	= $_REQUEST['sortby'];
    $rflag=$_REQUEST['rflag'];
	$rtype=$_REQUEST['rtype'];

	if(($SortBy == "") || ($SortBy == "all"))
	{
		$SortList = "";
	}
	else
	{
		$SortList = $SortBy;
	}

	$path="../../deimage1/";

 	$limqry		= "SELECT * FROM ".MEMBER." WHERE `varFirstname` LIKE '$SortList%' order by intmemberid DESC";
	$R_Check1	= mysql_query($limqry);

?>
<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title">
				<h3><a href="viewmember.php">View Member</a> | View Member List</h3>
				</div>

			<table width="548">
			  <tr  align="center">
    <td width="504" colspan="8"><table width="85%" cellpadding="2" cellspacing="2">
	<form name="view_cat" action="" method="POST" >
	<TR>
	<TD width="39%" align="right" class="white">
	 <b>Search by Name</b></TD>
	<td width="2%">&nbsp;	</td>
	<td align="left" width="16%">
		<input type="text" class="inputbox1" name="sortby">	</td>
		<td width="43%">	<input type="submit" value="search" name="submit" class="btn ui-state-default ui-corner-all">	</td>
	</TR>
	<tr>
	<td>&nbsp;</td>

	</tr>
	</form>
	</table></td>
  </tr>

  <tr>
           <td colspan="8" align="center">
					   <?php
						echo "<a class=\"leftlinks\" href=\"viewmember.php?sortby=all\">All</a>";?>
									  &nbsp;&nbsp;&nbsp;
									  <?php 		for($ASCII = 65; $ASCII <= 90 ; $ASCII++)
						{
						  echo "<a class=\"leftlinks\" href=\"viewmember.php?sortby=".chr($ASCII)."\">".chr($ASCII)."</a>&nbsp;" ."&nbsp;";
						}
					 ?>		 	</td>
  </tr>

  <tr><td>&nbsp;</td></tr>
  </table>

		<div class="hastable">
			<table>
				<thead>
                    <tr>
						<th width="30" align="left">S.No</th>
						<th width="30" align="left">Id</th>
						<th width="30" align="left">WP id</th>
						<th width="30" align="left">ROW</th>
						<th width="50" align="left">Firstname</th>
						<th width="50" align="left">Lastname</th>
						<th width="50" align="left">Ridename</th>
						<th width="60" align="left">Email</th>
						<th width="50" align="left">Phone</th>
						<th width="50" align="left">Status</th>
						<th width="50" align="left">RegoDate</th>
						<th width="50" align="left">ActivationDate</th>
						<th width="50" align="left">activeid</th>
						<th width="50" align="left">AcceptTerms</th>
						<th width="50" align="left">AcceptTermsDate</th>
						<th width="50" align="left">Insurance</th>
						<th width="50" align="left">Approved</th>
						<th width="50" align="left">ApprovedDate</th>
						<th width="50" align="left">ApprovedBy</th>
						<th width="50" align="left">SuspendedDate</th>
						<th width="50" align="left">ResignedDate</th>
						<th width="50" align="left">Paid</th>
						<th width="50" align="left">PaidDate</th>
						<th width="50" align="left">Image</th>
						<th width="50" align="left">Image Size</th>
						<th width="50" align="left">MugShot</th>
						<th width="50" align="left">MugShot Size</th>
					</tr>
				</thead>
				<tbody>
				    <?php
					$i = 0;
					while($fetch_cat = mysql_fetch_array($R_Check1))
					{
					    $i++;
						$iwidth=0; $iheight=0; $ifsize=0;
						$mwidth=0; $mheight=0; $mfsize=0;
						if ($fetch_cat['productimage'] != '')
						{
							$productimage=$path.$fetch_cat['productimage'];
							list($iwidth,$iheight)=getimagesize($productimage);
							$ifsize=filesize($productimage);
						}
						if ($fetch_cat['varMugShot'] != '')
						{
							$mugshot=$path.$fetch_cat['varMugShot'];
							list($mwidth,$mheight)=getimagesize($mugshot);
							$mfsize=filesize($mugshot);
						}
					?>
					<tr>
						<td><?php echo $i;?></td>
						<td><a href="viewmemberhistory.php?memberid=<?php echo $fetch_cat['intmemberid'];?>" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="View More Information">
							<?php echo $fetch_cat['intmemberid'];?></a></td>
						<td><?php echo $fetch_cat['intWPid'];?></td>
						<td><?php echo $fetch_cat['intROW'];?></td>
						<td><?php echo $fetch_cat['varFirstname'];?></td>
						<td><?php echo $fetch_cat['varLastname'];?></td>
						<td><?php echo $fetch_cat['varRidename'];?></td>
						<td><?php echo $fetch_cat['varEmail'];?></td>
						<td><?php echo $fetch_cat['varPhone'];?></td>
						<td><?php echo $fetch_cat['varStatus'];?></td>
						<td><?php echo $fetch_cat['varRegoDate'];?></td>
						<td><?php echo $fetch_cat['varActivationDate'];?></td>
						<td><?php echo $fetch_cat['activeid'];?></td>
						<td><?php echo $fetch_cat['varAcceptTerms'];?></td>
						<td><?php echo $fetch_cat['varAcceptTermsDate'];?></td>
						<td><?php echo $fetch_cat['varInsurance'];?></td>
						<td><?php echo $fetch_cat['varApproved'];?></td>
						<td><?php echo $fetch_cat['varApprovedDate'];?></td>
						<td><?php echo $fetch_cat['varApprovedBy'];?></td>
						<td><?php echo $fetch_cat['varSuspendedDate'];?></td>
						<td><?php echo $fetch_cat['varResignedDate'];?></td>
						<td><?php echo $fetch_cat['varPaid'];?></td>
						<td><?php echo $fetch_cat['varPaidDate'];?></td>
						<td><?php echo $fetch_cat['productimage'];?></td>
						<td><?php echo $iheight."x".$iwidth."=".$ifsize;?></td>
						<td><?php echo $fetch_cat['varMugShot'];?></td>
						<td><?php echo $mheight."x".$mwidth."=".$mfsize;?></td>

					</tr>
					<?php
					}
					?>

				</tbody>
			</table>
		</div>
		<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
		</div>
	</div>
	<div class="clearfix"></div>
<?php include('footer.php'); ?>
</body>
</html>
