<?php 
include "connectdb.php";



	$stmt=$mysqli->prepare( "select * from User where u_name = ? " );
		    
		      

		      $stmt->bind_param("s",$_POST["u_name"]);
		      $stmt->execute();
		      
		      if($stmt->fetch())
		      {
		      	$stmt->close();
		      	if($stmt = $mysqli->prepare("update User set u_name=?, password=?,Email=? where u_id = ?"))
		        {
		        	$stmt->bind_param("ssss",$_POST["u_name"],$_POST["password"],$_POST["Email"],$_POST["u_id"]);
		        	$stmt->execute();
		        	$return["u_id"]=$u_id;
			        $return["u_name"]= $user_name;
			        $return["password"] = $password;
			        $return["Email"] = $Email;
			        $return["REMOTE_ADDR"] = $_SERVER["REMOTE_ADDR"];
			        $return["flag"] = "1";
			        $return["message"]= "Update successful!  Please wait a few seconds while you are redirected back to Paymodoro...";

		        }
		         
		      }
		      else
		      {
		        $return["flag"] = "0";
		        $return["message"] = "Username does not exist.  Please try again.  ";
		      }
		      $stmt->close();
		      $mysqli->close();
		  
		 // $return = $_POST;
		 $return["name"] = "success";
	  echo json_encode($return);


 
?>
