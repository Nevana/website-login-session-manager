<?php
	//Creates a session
	session_start();
	$errorNotification = "";
	//If already logged in direct to index.php
	if ($_SESSION['login'] === true) {
		header("Location: index.php");
		die();
	}
	//DB connection
	try {
        //Modify with you db connection!!! Below is an example
		$conn = new PDO('sqlite:/you/location/of/the/db/login.db');
	//If connection fails session dies
	} catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
    }
	//If fields are filled and button was pressed run verification
	if(isset($_POST['name']) && isset($_POST['pw'])){
		//Save the password an username which were written in the form
		$user = $_POST['name'];
        $pass = $_POST['pw'];
        //DB query to get the username
        //Modify with you table!
		$result = $conn->query("SELECT * FROM login WHERE name = '$user'");
		$i = 0;
		//Check the possible usernames
	    foreach ($result as $row) {
            $myData[$i] = $row;
            $i++;
	    }
		//If only one username fits the verification will be executed
		if((count($myData) == 1)){
			//If password is correct save the username and turn login var to == true;
			if (password_verify($pass, $myData[0]["password"])) {
				//if  authentication was successful safe user to display later if you want
				$_SESSION['login'] = true;
				$_SESSION['userName'] = $user;
				//Allow acces and direct to the index.php
				header("Location: index.php");
			}else{
				//Error
				$errorNotification = "ERROR";
			}
		}else{
			//Error
			$errorNotification = "ERROR";
		}
	}
?>
<html>
    <head>
	    <link rel="icon" href="files/favicon.ico" type="image" sizes="16x16"/>
        <!-- Source implemetation -->
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
        <script src="bootstrap/bootstrap.min.js"></script>
        <script src="bootstrap/jquery.min.js"></script>
        <style>
        /* Here you can style you login mask */
        </style>
    </head>
    <body>
        <!--Loginmask -->
        <h1>LOGIN</h1>
        <form action="login.php" method="post">
            name:<input type="text" name="name">
    	    password:<input type="password" name="pw">
	        <input type=submit name=submit value="Login">
			<span class="tooltiptext"><?=$meldung?></span>
        </form>
    </body>
</html>