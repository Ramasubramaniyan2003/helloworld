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

			//read from database
			$query = "select * from users where email = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index2.php");
						die;
					}
				}
			}
			
			echo "<script>alert('!wrong username or password!!!!')</script>";
		}else
		{
			echo "<script>alert('Please enter a username or password')</script>";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<style>
    @import url("https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap");
* {
    margin: 0;
    padding: 0;
    outline: none;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}
.login {
  color: inherit;
  text-decoration: none;
  text-align: center;
  height: 100%;
    width: 300%;
    position: absolute;
    left: -100%;
    top: 10px;
    box-shadow:0 6px 6px rgba(0,0,0,0.6);
   
  
 }
.btn{
    text-align: center;
}
body {
    height: 100vh;
    width: 100%;
    background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);
}
.show-btn {
    background: #fff;
    padding: 10px 20px;
    font-size: 20px;
    font-weight: 500;
    color: #3498db;
    cursor: pointer;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}
.show-btn,
.container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
input[type="checkbox"] {
    display: none;
}
.container {
    display: none;
    background: #fff;
    width: 410px;
    padding: 30px;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
}
#show:checked ~ .container {
    display: block;
}
.container .close-btn {
    position: absolute;
    right: 20px;
    top: 15px;
    font-size: 18px;
    cursor: pointer;
}
.container .close-btn:hover {
    color: #3498db;
}
.container .text {
    font-size: 35px;
    font-weight: 600;
    text-align: center;
}
.container form {
    margin-top: -20px;
}
.container form .data {
    height: 45px;
    width: 100%;
    margin: 40px 0;
}
form .data label {
    font-size: 18px;
}
form .data input {
    height: 100%;
    width: 100%;
    padding-left: 10px;
    font-size: 17px;
    border: 1px solid silver;
}
form .data input:focus {
    border-color: #3498db;
    border-bottom-width: 2px;
}
form .forgot-pass {
    margin-top: -8px;
}
form .forgot-pass a {
    color: #3498db;
    text-decoration: none;
}
form .forgot-pass a:hover {
    text-decoration: underline;
}
form .btn {
    margin: 30px 0;
    height: 45px;
    width: 100%;
    position: relative;
    overflow: hidden;
}
form .btn .inner {
    height: 50%;
    width: 300%;
    position: absolute;
    left: -100%;
    
    background: -webkit-linear-gradient(
        right,
        #56d8e4,
        #9f01ea,
        #56d8e4,
        #9f01ea
    );
    transition: all 0.4s;
}
form .btn:hover .inner {
    left: 0;
}
form .btn button {
    height: 100%;
    width: 100%;
    background: none;
    border: none;
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
    cursor: pointer;
}
form .signup-link {
    text-align: center;
}
form .signup-link a {
    color: #3498db;
    text-decoration: none;
}
form .signup-link a:hover {
    text-decoration: underline;
}
</style>

	<!-- <div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>
            <label>User Name</label>
			<input id="text" type="text" name="email"><br><br>
			<label>Password</label>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div> -->
	<body>
        <div class="center">
            
            <input type="checkbox" id="show" />
            <label for="show" class="show-btn">WelCome</label>
            <div class="container">
                <label
                    for="show"
                    class="close-btn fas fa-times"
                    title="close"
                ></label>
                <div class="text">Login Form</div>
                <form  method="post">
                    <div class="data">
                        <label>Email or Phone</label>
                        <input type="text" id="user" name="email" required  >
                    </div>
                    <div class="data">
                        <label>Password</label>
                        <input type="password" id="pass" name="password" required  />
                    </div>
                    <div class="forgot-pass">
                        <a href="#">Forgot Password?</a>
                    </div>
                    <div class="btn">
                         <!-- <div class="inner"></div>  -->
                        <input type="submit"  class="login" name="submit" value="Go"
                        >
                    </div>
                    <div class="signup-link">
                        Not a member? <a href="signup.php">sign up</a>
                    </div>
                </form>
            </div>
        </div>
        
    </body>
</body>
</html>