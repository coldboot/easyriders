<?php	
include("../../include/dbconnect.php");

ini_set("max_execution_time","900");

			$csv_output = "S.No,FirstName,LastName,Phone,Email";
			
			$csv_output .= "\n"; 
			
			$filepath="member_export.csv";
			
			

          $sel="select * from `tbl_side_user`";
		  $res=mysql_query($sel) or die(mysql_error());
			$i=0;
           while($rs=mysql_fetch_array($res))
		{
		     $i++;
          	 $fname=$rs['Firstname'];
			 $lname=$rs['Lastname'];			
			 $phone=$rs['contactnumber'];
			 $email=$rs['Email'];
			 /*$establish=$rs['establish'];
			 $establish=str_replace('|',',',$establish);
			 $capital_provider=$rs['capital_provided'];
			 $investment_size=$rs['investment_size'];
			 $industry=$rs['industry'];
			 $geo_state=$rs['geo_state'];
			 $last_investment=$rs['last_investment'];
			 $last_investment=str_replace('|',',',$last_investment);
			 $fund_establish=$rs['fund_establish'];
			 $fund_establish=str_replace('|',',',$fund_establish);
			 $fund_capital=$rs['fund_capital'];
			 $capital_need=$rs['capital_need'];
			 $fund_industry=$rs['fund_industry'];
			 $fund_raised=$rs['fund_raised'];
			 $fund_howlong=$rs['fund_howlong'];
			 $fund_howlong=str_replace('|',',',$fund_howlong);
			 
			 
			 if($establish!="") 
			 	{
			 	$answer= $establish.",".$capital_provider.",".$investment_size.",".$industry.",".$geo_state.",".$last_investment;
				}
			else
				{
				$answer=$fund_establish.",".$fund_capital.",".$capital_need.",".$fund_industry.",".$fund_raised.",".$fund_howlong;
				}*/

			 $csv_output.= "\"$i\",\"$fname\",\"$lname\",\"$phone\",\"$email\""; //,\"$answer\"" ;
			 $csv_output .= "\n"; 
		  }
		  
			$filepath="member_export.csv";
			if(file_exists($filepath))
			{
			
				unlink($filepath);
				$FilePointer=fopen($filepath,'w+');
				fwrite($FilePointer,$csv_output);
				fclose($FilePointer);				
			}
			else
			{
				$FilePointer=fopen($filepath,'w+');
				fwrite($FilePointer,$csv_output);
				fclose($FilePointer);
			}
			
			
		//$dir      = ""; 
		if ((isset($filepath))&&(file_exists($filepath))) 
		{ 
		   header("Content-type: application/force-download"); 
		   header('Content-Disposition: inline; filename="'.$filepath.'"'); 
		   header("Content-Transfer-Encoding: Binary"); 
		   header("Content-length: ".filesize($filepath)); 
		   header('Content-Type: application/octet-stream'); 
		   header('Content-Disposition: attachment; filename="'.$filepath.'"'); 
		   readfile("$filepath"); 
		} 
		else 
		{ 
		   echo "No file selected"; 
		} //end if 

?>
