<?php
 include('header.php'); 
$insert_id	="";
$cid="";
$disptitle="Add";
$cpath="../../deimage1";
extract($_REQUEST);

if(isset($_POST['submit']))
{

	
	if($cid=="")
	{
		$sel_pro1		=	"SELECT * FROM ".PRODUCT." WHERE `productname` = '$productname'";	
		$res_pro1		=	mysql_query($sel_pro1) or die("SELECT ERROR".mysql_error());
		$num_pro1	=	mysql_num_rows($res_pro1);
		//$productname	=	addslashes(str_replace('-',' ',$productname));
		$productname=addslashes($productname);
		$features		= addslashes($features);
		$delivery=addslashes($delivery);
		$order=addslashes($order);
		
		if($num_pro1 != 0) { $flag="error"; }
	
		else
		{	
			$productimage=$_FILES['productimage'];
			$tmpname=$productimage['tmp_name'];
			$rand=rand(0,100000);
			 
			
			
			$imagename=$rand."_".$productimage['name'];
			copy($tmpname,$path.$imagename);
			$oldimage=$imagename;
			
			if($productimage['name'] == "")
			{
			$imagename="images.jpeg";
			}
			$ins_cat="INSERT INTO ".PRODUCT." (`productname`,`productprice`,`retailprice`,`productimage`	,`stockstatus`,`productcolor`,`productsize`,`categoryid`,`designerid`,`features`,`status`,`tax`,`gender`,`delivery`,`order`) VALUES ('$productname','$productprice','$retailprice','$imagename','$stockstatus','$productcolor','$productsize','$categoryid','$designerid','$features','Active','$tax','$gender','$delivery','$order')";

			mysql_query($ins_cat) or die("Insert: ".mysql_error());
			$insert_id	=	mysql_insert_id();		

			
			header("Location:viewproduct.php?rflag=success&rtype=add");
		}
	}
	
	else
	{
		$productimage=$_FILES['productimage'];
		//$productname	=	str_replace('-',' ',$productname);
		$productname=$productname;
		$features		= $features;
		
		if($productimage!="" && $productimage	['name'] !="")
		{
			$tmpname=$productimage['tmp_name'];
			$rand=rand(0,100000);
			$imagename=$rand."_".$productimage['name'];
			copy($tmpname,$path.$imagename);
			$up_img="UPDATE ".PRODUCT. " SET `productimage` = '$imagename' WHERE `intproductid` = '$cid'";
		}
		
		if($imagename!="") {
		$upd_cat="UPDATE ".PRODUCT. " SET `productname`= '$productname',`productcolor`= '$productcolor',`productsize`='$productsize',
																		`productprice` = '$productprice',`retailprice` = '$retailprice',`stockstatus` = '$stockstatus',
																		`categoryid` = '$categoryid',`productimage` = '$imagename' ,
																		`subcatid`='$scatid',
																		`features` = '$features',
																		`tax`='$tax',
																		`gender`='$gender',
																		`designerid`='$designerid',
																		`delivery`='$delivery',
																		`order`='$order'
																		 WHERE `intproductid` = '$cid'"; 
																		 }
																		 
																		 	if($imagename=="") {
																			
		$upd_cat="UPDATE ".PRODUCT. " SET `productname`= '$productname',`productcolor`= '$productcolor',`productsize`='$productsize',
																		`productprice` = '$productprice',`retailprice` = '$retailprice',`stockstatus` = '$stockstatus',
																		`categoryid` = '$categoryid',
																		`subcatid`='$scatid',
																		`features` = '$features',
																		`tax`='$tax',
																		`gender`='$gender',
																		`designerid`='$designerid',
																		`delivery`='$delivery',
																		`order`='$order'
																		 WHERE `intproductid` = '$cid'"; 
																		 }
		mysql_query($upd_cat)or die("update:".mysql_error());
		$flag="update";
		header("Location:viewproduct.php?rflag=success&rtype=edit");
			
		
	}
}
	

if($cid != "")
{
	$sel_pro	=	"SELECT * FROM ".PRODUCT." WHERE `intproductId`='$cid'";	
	$res_pro	=	mysql_query($sel_pro) or die(mysql_error());	
	$fet_pro		=	mysql_fetch_array($res_pro);
	extract($fet_pro);	
	
	
		$instock = "";
        $outstock= ""; 

          

                if($stockstatus=='instock')
              {
               $instock='checked';
                }
               if ($stockstatus == 'outstock') 
              {
              $outstock='checked';
               }
	
	$disptitle="Update";
}			
?>

<script language="javascript" type="text/javascript">

function imposeMaxLength(fld,len)
	{

		if(fld.value.length > len) { alert("You Reached Maximum Character Limit"); fld.value = fld.value.substr(0,len-1); }

	}





function showCat(category) {

	$.ajax({
		type: "POST",
		url: "../../cat_ajax.php",
		data: "category="+category,
		success: function(code){
			$('#ad_location_cat').html(code);
		}
	});

	$('#galaryId').hide();
}

function validate_required(field,alerttxt)
{
with (field)
  {
  if (value==null || value=="")
    {
    alert(alerttxt);return false;
    }
  else
    {
    return true;
    }
  }
}

function validate_form(form)
{
with (form)
  {
  if (validate_required(categoryid,"Please Select Category Name!")==false)
  {categoryid.focus();return false;}
  if (validate_required(designerid,"Please Select Designer Name!")==false)
  {designerid.focus();return false;}
  if (validate_required(productname,"Please Enter Product Name!")==false)
  {productname.focus();return false;}
  if (validate_required(categoryid,"Please Select Category Name!")==false)
  {categoryid.focus();return false;}
  if (validate_required(productprice,"Please Enter Product Price!")==false)
  {productprice.focus();return false;}
   
  if (isNaN(document.product.productprice.value))
		 { 
			 alert ("Product Price Must Be Numeric");
			 document.product.productprice="";
			 document.product.productprice.focus();
			 return false;
		 }
  if (validate_required(retailprice,"Please Enter Retail Price!")==false)
  {retailprice.focus();return false;}
  if (isNaN(document.product.retailprice.value))
		 { 
			 alert ("Product Price Must Be Numeric");
			 document.product.retailprice="";
			 document.product.retailprice.focus();
			 return false;
		 }
/*  if (validate_required(productimage,"Please Enter Product Picture!")==false)
  {productimage.focus();return false;}*/
  }
}
</script>
<script src="multifile_compressed.js"></script>
<script type="text/javascript">
var xmlHttp

function callcategory(str1)
{
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  }

var url="ajaxcategory.php";
url=url+"?categoryid="+str1;



xmlHttp.onreadystatechange=stateChanged;
xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}

function stateChanged()
{
if (xmlHttp.readyState==4)
{
document.getElementById("scatid").innerHTML=xmlHttp.responseText;
}
}

function GetXmlHttpObject()
{
var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {  alert ("Your browser does not support AJAX!");

  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
return xmlHttp;
}</script>

	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				
				
				<div class="clearfix"></div>
				<div class="title title-spacing">
			<a name="addpro"></a>
			<h2><?php echo $disptitle;?> Product </h2>
					
				</div>
				<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">
					<div class="portlet-header ui-widget-header"><?php echo $disptitle;?> Product </div>
				    <?php if($_GET['log']=="succ"){?>
					<div class="response-msg success ui-corner-all"><span>Your Details are Successfully Updated!</span></div>
					<?php } ?>
					   <?php if($flag=="error"){?>
					<div class="response-msg success ui-corner-all"><span>Product Already Exist!</span></div>
					<?php } ?>
					<div class="portlet-content">
			<form action="" method="post" enctype="multipart/form-data" class="forms"  name="product" onSubmit="return validate_form(this);" >
						<ul>
							
							<!--<li>
								<label  class="desc">Product Name</label>
								<div><input type="text" tabindex="1" maxlength="255" value="<?php echo $productname;?>" class="field text small" name="productname" /></div>
							</li>-->		
							
							 <li><span class="red">*</span>
								<label  class="desc">Category Name</label>
								<div>
									<select name="categoryid" id="categoryid" tabindex="1" onChange="return callcategory(this.value)";>
										<option value="">Choose</option>
										<?php
										$select_cat = "SELECT * FROM ".CATEGORY." order by  catid ASC";
										$result_cat = mysql_query($select_cat);
										while($fetch_cat= mysql_fetch_array($result_cat)){
										if($categoryid == $fetch_cat['catid']) {
										$selected = "SELECTED";
										} else {
										$selected = "";
										}
										?>
			<option value="<?php echo $fetch_cat['catid'];?>" <?php echo $selected;?>><?php echo $fetch_cat['varCategoryname'];?></option>
										<?php } ?>
									</select>
								</div>
							</li>
							
							<li><span class="red">*</span>
							
								<label  class="desc">Designer Name</label>

								<div>
								<select name="designerid" id="designerid" tabindex="1">
										<option value="">Choose</option>
										<?php
										$select_cat1 = "SELECT * FROM `tbl_london_designer`order by designerid ASC";
										$result_cat1 = mysql_query($select_cat1);
										while($fetch_cat1= mysql_fetch_array($result_cat1)){
										if($designerid == $fetch_cat1['designerid']) {
										$selected = "SELECTED";
										} else {
										$selected = "";
										}
										?>
			<option value="<?php echo $fetch_cat1['designerid'];?>" <?php echo $selected;?>><?php echo $fetch_cat1['varUsername'];?></option>
										<?php } ?>
									</select>
									
								</div>
						</li>
													
							
							
							<li><span class="red">*</span>
										<label  class="desc">Product Name</label>
								<div><input type="text" tabindex="1" maxlength="255" value="<?php echo stripslashes($productname);?>" class="field text small" name="productname" onkeypress="return imposeMaxLength(this, 25);" ><br />(Maximum 25 Characters)</div>
							</li>
							
																					
							<li><span class="red">*</span>
								<label  class="desc">Product Price</label>
								<div><input type="text" tabindex="1" maxlength="255" value="<?php echo $productprice;?>" class="field text small" name="productprice" onkeypress="return imposeMaxLength(this,13);"/><b>(GBP)</b><br />(Maximum 13 Characters)</div>
							</li>
							<li><span class="red">*</span>
								<label  class="desc">Retail Price</label>
								<div><input type="text" tabindex="1" maxlength="255" value="<?php echo $retailprice;?>" class="field text small" name="retailprice" onkeypress="return imposeMaxLength(this,13);"/><b>(GBP)</b><br />(Maximum 13 Characters)</div>
							</li>
							<li>
									<label  class="desc">Stock Status<span class="red">*</span></label>
									<div> <input type="radio" name="stockstatus" value="instock" <?php echo $instock;?> checked="checked" />Instock&nbsp;&nbsp;&nbsp
											<input type="radio" name="stockstatus"  value="outstock"  <?php echo $outstock;?>/>	Outstock
										</div>
								</li>	
								<li>
									<label  class="desc">Gender<span class="red">*</span></label>
									<div> <input type="radio" name="gender" value="male" <?php echo $gender;?> checked="checked" />Male&nbsp;&nbsp;&nbsp
											<input type="radio" name="gender"  value="female"  <?php echo $gender;?>/>	Female
										</div>
								</li>	
								
							<li>
								<label  class="desc">Product Colors</label>
								<div><input type="text" tabindex="1" maxlength="255" value="<?php echo $productcolor;?>" class="field text small" name="productcolor" /><br />(Please separate by comma(,) )</div>
							</li>	
							
							<li>
								<label  class="desc">Product Size</label>
								<div><input type="text" tabindex="1" maxlength="255" value="<?php echo $productsize;?>" class="field text small" name="productsize" /><br />(Please separate by comma(,) )</div>
							</li>
							
							<li>
								<label  class="desc">Tax</label>
								<div><input type="text" tabindex="1" maxlength="255" value="<?php echo $tax;?>" class="field text small" name="tax" /></div>
							</li>
							
							<li>
								<label  class="desc">Product Picture</label>
								<?php if($cid!="") {
							$productimage=$path.$productimage;
							list($width,$height)=getimagesize($productimage);
							if($width>=75)  $width="100px";
							if($height>=75) $height="100px";
						
							?>
							
								<div><img src="<?php echo $productimage;?>" border="0" width="<?php echo $width;?>" height="<?php echo $height;?>" align="absmiddle"/><br /></div>
								<div><?php echo str_replace($path,"",$productimage);?><br /><br /></div><?php }?>
								<div><input type="file" tabindex="1" maxlength="255" value="" class="field text small" name="productimage" /></div>
							</li>	
								
							<li>
								<label  class="desc">Product Features</label>
								<div>
									<?php
										$oFCKeditor=new FCKeditor('features');
										$oFCKeditor->BasePath="../../fckeditor/" ;
										//$oFCKeditor->ToolbarSet = "Basic" ;
										$oFCKeditor->Skin="office2003";
										$oFCKeditor ->Height='300';
										$oFCKeditor->Value=stripslashes($features);
										$oFCKeditor->Create();
									?>
								</div>
							</li>
							
							<li>
								<label  class="desc">Delivery</label>
								<div>
									<?php
										$oFCKeditor=new FCKeditor('delivery');
										$oFCKeditor->BasePath="../../fckeditor/" ;
										//$oFCKeditor->ToolbarSet = "Basic" ;
										$oFCKeditor->Skin="office2003";
										$oFCKeditor ->Height='300';
										$oFCKeditor->Value=stripslashes($delivery);
										$oFCKeditor->Create();
									?>
								</div>
							</li>
							
							<li>
								<label  class="desc">Returns Policy</label>
								<div>
									<?php
										$oFCKeditor=new FCKeditor('order');
										$oFCKeditor->BasePath="../../fckeditor/" ;
										//$oFCKeditor->ToolbarSet = "Basic" ;
										$oFCKeditor->Skin="office2003";
										$oFCKeditor ->Height='300';
										$oFCKeditor->Value=stripslashes($order);
										$oFCKeditor->Create();
									?>
								</div>
							</li>
							
							<span class="red">* Indicates Required Information.</span>
							
							<li class="buttons">
								<input type="submit" value="<?php echo $disptitle;?>" class="btn ui-state-default ui-corner-all" name="submit" />
								<input name="cid" type="hidden" id="cid"  value="<?php echo $cid;?>"/>
							</li>
							
							
							
						</ul>
					</form>
				</div>
			</div>
			<div class="clearfix"></div>
			<i class="note"></i>
		</div>
		<div class="clearfix"></div>
	</div>
<?php include('sidebar.php'); ?>
</div>
<div class="clearfix"></div>
<?php include('footer.php'); ?>
</body>
</html>
