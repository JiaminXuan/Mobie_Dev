<?php include "connectdb.php";?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>log in</title>
</head>
<body>

<?php 
  //$_SESSION["user_name"] = '1';
  
if(isset($_SESSION["u_name"]))
{
  echo "you have successfully login \n";
  echo "you will be redirected in 1 seconds or click <a href = \"http://websys3.stern.nyu.edu/websysS15GB/websysS15GB2/public_html/websys/ajax/home.html\">here</a>. \n";
  header( "refresh: 1; http://websys3.stern.nyu.edu/websysS15GB/websysS15GB2/public_html/websys/ajax/home.html");
}
else
{
  if(isset($_POST["u_name"])&&isset($_POST["password"]))
  {   echo "we are here1";
      $stmt=$mysqli->prepare( "select u_id, u_name,password from User where u_name = ? and password = ?" );
    
      echo "we are here2";

      $stmt->bind_param("ss",$_POST["u_name"],$_POST["password"]);
      $stmt->execute();
      $stmt->bind_result($u_id,$user_name,$password);
      echo $u_id;
      if($stmt->fetch())
      {
        echo "we are here3";
        $_SESSION["u_id"]=$u_id;
        echo "$u_id";
        $_SESSION["u_name"]= $user_name;
        $_SESSION["password"] = $password;
        $_SESSION["REMOTE_ADDR"] = $_SERVER["REMOTE_ADDR"];
        echo "login successfully \n";
        echo "you will be redirected in 1 seconds or click <a href=\"http://websys3.stern.nyu.edu/websysS15GB/websysS15GB2/public_html/websys/ajax/home.html\">here</a>.\n";
        header("refresh:1; http://websys3.stern.nyu.edu/websysS15GB/websysS15GB2/public_html/websys/ajax/home.html");
      }
      else
      {
        echo "we are here4";
        sleep(1);
        echo "your username and password are not correct.\n";
        echo "click <a href = \"login.php\">here</a> to log in.\n";
        header("refresh:1;login.php");
      }
      $stmt->close();
      $mysqli->close();
  }
  else
  {
    echo "we are here5";
    echo "enter you username , password below.\n";
    echo '<form action= "login.php" method="post">';
    echo '<input type="text" name="u_name" value="laomiao"><br>';
    echo '<input type="text" name="password" value="123456"><br>';
    echo '<input type="submit" name="submit" value="submit"><br>';
    echo '</form>';

  }
}
  
?>

<form action = "register.php" method = "post">
<input type = "submit" name = "register" value = "register">
</form>









</body>
</html>