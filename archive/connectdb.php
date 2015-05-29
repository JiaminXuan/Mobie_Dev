<?php 
	session_start();
	$mysqli = new mysqli("websys3.stern.nyu.edu","websysS15GB2","websysS15GB2!!","websysS15GB2");

	// if($mysqli) echo "connection success <br>";
	if (mysqli_connect_errno()) {

    exit();
    }

    if(isset($SESSION["REMOTE_ADDR"]) && $SESSION["REMOTE_ADDR"] != $SERVER["REMOTE_ADDR"]) {
		session_destroy();
		session_start();
	}

?>
