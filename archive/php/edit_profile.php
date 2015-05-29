<?php 
include "connectdb.php";


$mysqli = new mysqli("localhost","root","","timeowner");

	$stmt=$mysqli->prepare( "select * from User where u_name = ? " );
		    
		      

		      $stmt->bind_param("s",$_POST["u_name"]);
		      $stmt->execute();
		      
		      if($stmt->fetch())
		      {
		      	$stmt->close();
		      	if($stmt = $mysqli->prepare("insert into User(u_name,password,Email) value(?,?,?)"))
		        {
		        	$stmt->bind_param("sss",$_POST["u_name"],$_POST["password"],$_POST["Email"]);
		        	$stmt->execute();
		        	$return["u_id"]=$u_id;
			        $return["u_name"]= $user_name;
			        $return["password"] = $password;
			        $return["Email"] = $Email;
			        $return["REMOTE_ADDR"] = $_SERVER["REMOTE_ADDR"];
			        $return["flag"] = "1";
			        $return["message"]= "change success";

		        }
		         
		      }
		      else
		      {
		        $return["flag"] = "0";
		        $return["message"] = "user do not exist";
		      }
		      $stmt->close();
		      $mysqli->close();
		  
		 // $return = $_POST;
		 $return["name"] = "success";
	  echo json_encode($return);


 
?>
