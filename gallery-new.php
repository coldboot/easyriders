<?php 
include("include/dbconnect.php");
include("include/constants.php"); 
?>

	<link rel="stylesheet" href="external/image-gallery-2011.css" />
	<script type="text/javascript" src="external/mootools-core-1.3-full-compat.js"></script>
	<script type="text/javascript" src="external/mootools-more-1.3.1.1.js"></script>
	<script type="text/javascript" src="external/image-gallery-2011.js"></script>
	<style type="text/css">
	.imgCopyright{
		font-size:0.7em;
		font-style:italic;
	}
	.imgCopyright a{
		color:#F00;
	}

	/* Override default styles */
	.dg-image-gallery{
		border:0px solid #AAA;
	}
	.dg-image-gallery-previous{
		background-image:url('images/left-white.png');
		left : 0px;
	}
	.dg-image-gallery-previous-over{
		background-image:url('images/left-white-over.png');
	}
	.dg-image-gallery-next{
		background-image:url('images/right-white.png');
		right : 0px;
	}
	.dg-image-gallery-next-over{
		background-image:url('/images/right-white-over.png');
	}
	.dg-image-gallery-next-autoplay-start{

		background-image:url('images/play-white.png');
	}
	.dg-image-gallery-next-autoplay-stop{

		background-image:url('images/pause-white.png');
	}
	.dg-image-gallery-next-autoplay-start-off{
		background-image:url('images/play-white-off.png');


	}
	.dg-image-gallery-next-autoplay-stop-off{
		background-image:url('images/pause-white-off.png');

	}
	.dg-image-gallery-caption {
		color:#000;
	}
	.dg-image-gallery-thumbnail-highlight{
		border:3px solid #AAA;
	}
	
	
	/* Menu_STYLE*/
	#menu{
		width:350px;
		margin:0px;
		margin-left:0px;
		margin-top:-13px;
		background-color:#181818;
	}
	#menu ul{
		list-style:none;
		padding:0 0px;
	}
	#menu li{
	list-style:none;
	display:block;
	float:left;
	margin:0 0px;
	}
	#menu li a{
		display:block;
		float:left;
		color:#ebdc10;
		font-size:12px;
		font-weight:bold;
		line-height:36px;
		padding:0 0 0 8px;
		text-decoration:none;
		cursor:pointer;
		background-color:#181818;
	}
	#menu li a span{
		display:block;
		float:left;
		color:#ebdc10;
		line-height:36px;
		padding:0 24px 0 10px;
	}
	#menu li a:hover{
		display:block;
		float:left;					
		background:url(menu_013_h_l.png) no-repeat left center;
		height:36px;
	}
	#menu li a:hover span{
		display:block;
		float:left;					
		background:url(menu_013_h_r.png) no-repeat right center;
		color:#000;
		height:36px;
	}
	#menu li a.current{
		display:block;
		float:left;
		color:#000;
		font-size:12px;
		font-weight:bold;
		background:url(images/menu_013_h_l.png) no-repeat left center;
		line-height:36px;
		padding:0 0 0 8px;
		text-decoration:none;
	}
	#menu li a.current span{					
		display:block;
		float:left;
		background:url(menu_013_h_r.png) no-repeat right center;
		color:#000;
		line-height:36px;
		padding:0 24px 0 10px;
	}
	h1, .h1
	{
	font-size:20px;
	color:#f64010;
	font-weight:bold;
	}


	</style>





<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
				  
				  
<!--
		<?php 
		$sel_img=mysql_query("select * from tbl_cycling_adminprofile");
		$fet_img=mysql_fetch_array($sel_img);
		?>
		
		if($gall=="VD") {
		   $gall_select = "where varCategoryname like 'VD%'";
		   $heading_text = "VD&#39;s Travelogue";
		} elseif($gall=="MATT") {
		   $gall_select = "where varCategoryname like 'MATT%'";
		   $heading_text = "Sam and Matt&#39;s Wedding - video <a href=\"http://www.youtube.com/watch?feature=player_embedded&v=mOd2Xdzisdw\" target=\"_blank\">here</a>";
		} else {
		   $gall_select = "where varCategoryname not like 'VD%' and varCategoryname not like 'MATT%'";
		   $heading_text = "ER&#39;s In Action";
		}
-->		
		<td><h1>
		<?php 
		 $gall=$_GET['gallery'];
		 $select="select * from tbl_cycling_galleries where varGallery = '$gall'";
		 $res=mysql_query($select);
		 $fetch=mysql_fetch_array($res);
		 echo $fetch['varDescription'];
		?>
		</h1></td>		  
				  
                  </tr>
                  
                                    <tr>
                                      <td class="body_style">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="body_style"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                       
                                        <tr>
                                          <td> 
					  <div id="dg-image-gallery" class="dg-image-gallery">


					  <?php
		   			   $gall=$_GET['gallery'];

					  $select="select * from tbl_cycling_category where varGallery = '$gall' order by catid DESC";
					  $res=mysql_query($select);
					  $i=0;
					  while($fet=mysql_fetch_array($res))
					  { 
										  
?>
				 
	<div class="dg-image-gallery-image">						  
										
		<img class="dg-image-gallery-thumb" src="deimage1/<?php echo $fet['catimage'];?>">
		
		
		
		<span class="dg-image-gallery-caption bo"><span style="font-size:14px;color:#666;padding-left:5px;padding-right:5px;line-height:20px;text-align:justify;"><?php echo $fet['catDescription'];?></span></span>
		<span class="dg-image-gallery-large-image-path">deimage1/<?php echo $fet['catlargeimage'];?></span>
	</div>
	
	


<?php $i++;} ?></div>

<script type="text/javascript">
var gallery = new DG.ImageGallery({
	el : 'dg-image-gallery',
	autoplay : {
		pause : 2
	}
});
</script>


</td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                        </tr>
                                      </table></td>
                          </tr>
               
                  
                  

                </table>

