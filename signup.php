<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,email,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: index.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
		body {
    height: 100vh;
    width: 100%;
    background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);
}
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{
       border-radius:5px;
		background-color: white;
		margin: auto;
		width: 300px;
		padding: 20px;
		position: absolute;
		bottom: 150px;;
		right: 550px;;
	}
	#button:hover{

padding: 10px;
width: 100px;
color: white;
background-color: green;
border: none;
}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color:black;">SIGN UP</div>

            Email
			<input id="text" type="text" name="email"><br><br>
			Password
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="index.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>