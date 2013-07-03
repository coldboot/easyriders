<?php
 include('header.php'); 
$insert_id	="";
$cid="";
$disptitle="Add";
$path=PRODUCTIMG;
extract($_REQUEST);

if(isset($_POST['submit']))
{
	
	if($cid=="")
	{
		$sel_pro1		=	"SELECT * FROM ".PRODUCT." WHERE `productname` = '$productname'";	
		$res_pro1		=	mysql_query($sel_pro1) or die("SELECT ERROR".mysql_error());
		$num_pro1	=	mysql_num_rows($res_pro1);
		$productname	=	str_replace('-',' ',$productname);
	 $features		= addslashes($features);
		
		if($num_pro1 != 0) { $flag="error"; }
	
		else
				{	
		$productimage=$_FILES['productimage'];
		
		$tmpname=$productimage['tmp_name'];
		$rand=rand(0,100000);
		$orgname=$rand."_".$productimage['name'];
		copy($tmpname,$path.$orgname);
		
		
		if($productimage['name']!="")
				{
				$imagename=$orgname;
				
				}
				
				else
				{
				$imagename="";
				}
			$ins_cat="INSERT INTO ".PRODUCT." 
			                  VALUES('','$productname','$productprice','$imagename','$productcolor','$categoryid','$scatid','$features','Active')";
			mysql_query($ins_cat) or die("insert".mysql_error());
			$insert_id	=	mysql_insert_id();
		

			$flag="success";
			header("Location:viewproduct.php?rflag=success&rtype=add");
		}
	}
	
	else
	{
		if($cid != "")
		{
		$productimage=$_FILES['productimage'];
		
		$tmpname=$productimage['tmp_name'];
		$rand=rand(0,100000);
		$orgname=$rand."_".$productimage['name'];
		copy($tmpname,$path.$orgname);
		
		
		if($productimage['name']!="")
				{
				 $imagename=$orgname;
				$upd_cat="UPDATE ".PRODUCT. " SET `productname`= '$productname',`productcolor`= '$productcolor',
																		`productprice` = '$productprice',
																		`categoryid` = '$categoryid',
																		`subcatid`='$scatid',
																		`features` = '$features',`productimage` = '$imagename'
																		 WHERE `intproductid` = '$cid'";
				}
				
				else
				{
			
				$upd_cat="UPDATE ".PRODUCT. " SET `productname`= '$productname',`productcolor`= '$productcolor',
																		`productprice` = '$productprice',
																		`categoryid` = '$categoryid',
																		`subcatid`='$scatid',
																		`features` = '$features'
																		 WHERE `intproductid` = '$cid'";
				}
		
		
        	
			mysql_query($upd_cat)or die("update".mysql_error());
			$flag="update";
			header("Location:viewproduct.php?rflag=success&rtype=edit");
			
		}
	}
}
	

if($cid != "")
{
	$sel_pro	=	"SELECT * FROM ".PRODUCT." WHERE `intproductId`='$cid'";	
	$res_pro	=	mysql_query($sel_pro) or die(mysql_error());	
	$fet_pro		=	mysql_fetch_array($res_pro);
	
	extract($fet_pro);	
	$disptitle="Update";
}			
?>

<script language="javascript" type="text/javascript">

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
  if (validate_required(productname,"Please Enter Product Name!")==false)
  {productname.focus();return false;}
  if (validate_required(categoryid,"Please Select Category Name!")==false)
  {categoryid.focus();return false;}
  if (validate_required(productprice,"Please Enter Product Price!")==false)
  {productprice.focus();return false;}
/*  if (validate_required(productimage,"Please Enter Product Picture!")==false)
  {productimage.focus();return false;}*/
  }
}
</script>
<script src="multifile_compressed.js"></script>
<script type="text/javascript">
var xmlHttp

function callcategory(str)
{
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  }
var url="ajaxcategory.php";
url=url+"?categoryid="+str;
url=url+"&trial=yes"
url=url+"&sid="+Math.random()
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
					<div class="portlet-content">
			<form action="" method="post" enctype="multipart/form-data" class="forms"  name="product" onSubmit="return validate_form(this);" >
						<ul>
							
							<!--<li>
								<label  class="desc">Product Name</label>
								<div><input type="text" tabindex="1" maxlength="255" value="<?php echo $productname;?>" class="field text small" name="productname" /></div>
							</li>-->		
							
							 <li>
								<label  class="desc">Category Name</label>
								<div>
									<select name="categoryid" id="categoryid" tabindex="1" onChange="return callcategory(this.value)";>
										<option value="">Choose</option>
										<?php
										$select_cat = "SELECT * FROM ".ADDCATEGORY." order by  catid ASC";
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
							
							<li>
							
								<label  class="desc">Sub Category Name</label>

								<div>

									<select name="scatid" id="scatid">
										<?php
                                           if($categoryid!="")
									{
										$select_cat = "SELECT * FROM ".ADDSUBCATEGORY." WHERE `catid`='$categoryid'";
										$result_cat = mysql_query($select_cat);
										while($fetch_cat= mysql_fetch_array($result_cat)){
										if($scatid == $fetch_cat['scid']) {
										$selected = "SELECTED";
										} else {
										$selected = "";
										}
										?>
			<option value="<?php echo $fetch_cat['scid'];?>" <?php echo $selected;?>><?php echo $fetch_cat['subcatname'];?></option>
									<?php }}else{?>
										<option value="">Choose</option>
										<?php }?>
									</select>
								</div>
						</li>
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							<li>
										<label  class="desc">Product Name</label>
								<div><input type="text" tabindex="1" maxlength="255" value="<?php echo $productname;?>" class="field text small" name="productname" /></div>
							</li>
							
																					
							<li>
								<label  class="desc">Product Price</label>
								<div><input type="text" tabindex="1" maxlength="255" value="<?php echo $productprice;?>" class="field text small" name="productprice" /></div>
							</li>	
								<li>
								<label  class="desc">Product Color</label>
								<div><input type="text" tabindex="1" maxlength="255" value="<?php echo $productcolor;?>" class="field text small" name="productcolor" /></div>
							</li>	
							<?php if($cid!="") {
							
							list($width,$height)=getimagesize($productimage);
							if($width>=75)  $width="100px";
							if($height>=75) $height="100px";
						
							?>
							<li>
							<td class="center"><img src="<?php echo $path.$productimage;?>" border="0" width="<?php echo $width;?>" height="<?php echo $height;?>" align="absmiddle"/></td>
							
							</li><?php }?>
							<li>
								<label  class="desc">Product Picture</label>
								<div><?php echo $productimage;?><br /><br /></div>
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
