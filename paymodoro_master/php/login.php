<?php 
include "connectdb.php";




	$stmt=$mysqli->prepare( "select u_id, u_name,password, Email from User where u_name = ? and password = ?" );
		    
		      

		      $stmt->bind_param("ss",$_POST["u_name"],$_POST["password"]);
		      $stmt->execute();
		      $stmt->bind_result($u_id,$user_name,$password,$Email);
		      if($stmt->fetch())
		      {
		        
		        $return["u_id"]=$u_id;
		        $return["u_name"]= $user_name;
		        $return["password"] = $password;
		        $return["Email"] = $Email;
		        $return["REMOTE_ADDR"] = $_SERVER["REMOTE_ADDR"];
		        $return["flag"] = "1";
		        $return["message"]= "Login successful!  You'll be redirected in 5 seconds to Paymodoro..."; 
		      }
		      else
		      {
		        $return["flag"] = "0";
		        $return["message"] = "Login not successful.  That's a bummer.  Please try again.";
		      }
		      $stmt->close();
		      //$mysqli->close();
		  
		 // $return = $_POST;
		 $return["name"] = "success";
	  echo json_encode($return);


 
?>
