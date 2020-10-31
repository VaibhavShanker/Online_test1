<!DOCTYPE html>
<html>
<head>
      <title>
       Register
      </title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div id="wrapper">
    <div id="login">

        <p>
            <a id="login1" href="login.php">
                    <u style='font-family: sans-serif'>        
                      Login
                    </u>
            </a>
        </p>


    </div>
        <div id="signup-form" >
            <br>
          <h2>Register Now!</h2>
            <form action="register.php" method="POST">
                <p>
                   <label for="username">Username: &nbsp;
                    &nbsp; &nbsp;<input type="text" 
                   name="username" required></label>
                </p>

                <p>
                   <label for="password">Password: &nbsp;
                    &nbsp; &nbsp; <input type="password"
                   name="password" required></label>
                </p>

                <p>
                   <label for="password2">Re-Password: <input type="password"
                    name="password2" required></label>
               </p>

                <p>
                   <label for="email">Email: &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp;  <input type="email" 
                   name="email" required></label>
                </p>

                <p>
                  <input type="submit" name="submit" value="Submit">
                </p>
            </form>
        </div>
    </div>

<?php
    require "config.php";
    $errors=array();

if (isset($_POST['submit'])) {
    $username=isset($_POST['username'])?$_POST['username']:'';
    $password=isset($_POST['password'])?$_POST['password']:'';
    $password2=isset($_POST['password2'])?$_POST['password2']:'';
    $email=isset($_POST['email'])?$_POST['email']:'';

    if ($password != $password2) {

        $errors[] = array("input"=>"password","msg"=>"Password Not Match");
    }

    $sql="SELECT * from users WHERE username='".$username."'
	 OR email='".$email."'";
    $result=$conn->query($sql);

    if ($result->num_rows > 0) {

        $errors[] = array("input"=>"form","msg"=>"Username Already Present");

    }
    if (count($errors)==0) {
        $sql="INSERT INTO users (username, password, email)
	    VALUES ('".$username."','".$password."','".$email."')";

        if ($conn->query($sql) == true) {
            echo "<script>alert('Registration Successfully');
             window.location='home.php' ;</script>";//for page change
            //header("Location: login.php");
            
        } else {
            $errors[]=array("input"=>"form","msg"=>"Registration Failed");
        }
        

    } else {
        foreach ($errors as $error) {
            
            echo  "<script>alert('* ".$error['msg']."')</script>";
        
        }
    }
    $conn->close();
}
?>


</body>
</html>