<?php 
include "connectdb.php";




	if($stmt=$mysqli->prepare( "select u_name from User where u_name = ? " ));
	{	    
		      

		    $stmt->bind_param("s",$_POST["u_name"]);
		    $stmt->execute();
		    $stmt->bind_result($u_name);
		    if($stmt->fetch())
		      {
		        	$return["flag"] = "0";
		        	$return["message"] = "The user name already exists.";
		      }

		      else
		      {
		      	$stmt->close();
		      	$number = 0;
		      	if($stmt = $mysqli->prepare("insert into User(u_name,password,Email,honor) value(?,?,?,?) "))
		      	{
		      		$stmt->bind_param("sssi",$_POST["u_name"],$_POST["password"],$_POST["Email"],$number);
		      		$stmt->execute();
		      		$return["flag"] = "1";
		        	$return["message"] = "Registration successful! You will be redirected in a few seconds. Get ready for Paymodoro!";
		      	}
		        
		      }
		      $stmt->close();
		      
		  
		 // // $return = $_POST;
		 $return["name"] = "success";
	  echo json_encode($return);
	}

 
?>
