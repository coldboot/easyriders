<?php include('header.php');
	$SortBy	= $_REQUEST['sortby'];
    $rflag=$_REQUEST['rflag'];
	$rtype=$_REQUEST['rtype'];
	$filterpaid=$_REQUEST['filterpaid'];
	$filteraccept=$_REQUEST['filteraccept'];
	$whereclause="";

	if(($SortBy == "") || ($SortBy == "all"))
	{
		$SortList = "";
	}
	else
	{
		$SortList = $SortBy;
	}
	if ($filterpaid == "yes" || $filterpaid == "no")
	{
		$whereclause .= " AND `varPaid` = '$filterpaid'";
	}
	if ($filteraccept == "yes" || $filteraccept == "no")
	{
		$whereclause .= " AND `varAcceptTerms` = '$filteraccept'";
	}

	$path="../../deimage1/";

 	$limqry		= "SELECT * FROM ".MEMBER." WHERE `varFirstname` LIKE '$SortList%' $whereclause order by intmemberid DESC";
	$R_Check1	= mysql_query($limqry);
	$row_count = (int) mysql_num_rows($R_Check1);


?>
<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title">
				<h3><a href="viewmember.php">View Member</a> | View Member List</h3>
				</div>

			<table width="100%" >
			  <tr  align="center">
    <td colspan="8">
    	<table width="85%" cellpadding="2" cellspacing="2">
			<form name="view_cat" action="" method="POST" >
			<TR>
			  <TD width="15%" align="left" class="white"><b>Filter by First Name</b></TD>
		      <td width="3%">&nbsp;</td>
			  <td  width="14%"align="left"><input type="text" class="inputbox1" name="sortby"></td>
		      <td width="3%">&nbsp;</td>
			  <td width="7%" align="right" class="white"><b>Paid</b></td>
			  <td width="12%" ><select name="filterpaid">
				<option value="all" <?php if ($filterpaid == "all") { echo 'selected="selected"'; } ?> >all</option>
				<option value="no" <?php if ($filterpaid == "no") { echo 'selected="selected"'; } ?> >no</option>
				<option value="yes" <?php if ($filterpaid == "yes") { echo 'selected="selected"'; } ?> >yes</option>
				</select>
			  </td>
			  <td width="12%" align="right" class="white"><b>Accepted Terms</b></td>
			  <td width="12%" ><select name="filteraccept">
				<option value="all" <?php if ($filteraccept == "all") { echo 'selected="selected"'; } ?> >all</option>
				<option value="no" <?php if ($filteraccept == "no") { echo 'selected="selected"'; } ?> >no</option>
				<option value="yes" <?php if ($filteraccept == "yes") { echo 'selected="selected"'; } ?> >yes</option>
				</select>
			  </td>
			<td width="12%"><input type="submit" value="filter" name="submit" class="btn ui-state-default ui-corner-all">	</td>
			<td width="10%"><?php echo "Count = $row_count"; ?> </td>
		  </TR>
		  <tr>
			<td colspan="10">&nbsp;</td>
		  </tr>
		  </form>
		</table>
	</td>
  </tr>

  <tr>
           <td colspan="8" align="center">
					   <?php
						echo "<a class=\"leftlinks\" href=\"viewmemberlist.php?sortby=all\">All</a>";?>
									  &nbsp;&nbsp;&nbsp;
									  <?php 		for($ASCII = 65; $ASCII <= 90 ; $ASCII++)
						{
						  echo "<a class=\"leftlinks\" href=\"viewmemberlist.php?sortby=".chr($ASCII)."\">".chr($ASCII)."</a>&nbsp;" ."&nbsp;";
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
						<th width="50" align="left">Insurance Other</th>
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
						<td><?php echo $fetch_cat['varInsuranceOther'];?></td>
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
