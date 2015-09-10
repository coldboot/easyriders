<?php 

$catid=$_REQUEST['catid'];
// $select_cat="SELECT * FROM `tbl_side_subcategory` where `catid`='$catid'";
// $query_cat=mysql_query($select_cat);
 
 echo  '<select  class="list_menu_new" name="type" id="type" onchange="callsub(this.value);"><?php $select_cat1 = "SELECT * FROM ".SUBCATEGORY." where `catid`='".$catid."'";$result_cat1 = mysql_query($select_cat1);while($fetch_cat1= mysql_fetch_array($result_cat1)){
if($categoryid1 == $fetch_cat1['inttypeid']) {?><option value="<?php echo $fetch_cat1['essaytype'];?>" <?php echo $selected1;?>><?php echo $fetch_cat1['essaytype'];?></option><?php } ?></select>';

?>