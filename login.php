<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
        <div id="wrapper">
            <div id="login-form">
                <br>
                <h1>Login</h1>
                <form action="login.php" method="POST">

                    <p>
                       <label for="username">Username: &nbsp; <input type="text"
                       name="username" required></label>
                    </p>

                    <p>
                       <label for="password">Password: &nbsp;
                        &nbsp; <input type="password"
                        name="password" required></label>
                    </p>

                    <br>
                    <p>
                       <input type="submit" name="submit" value="Login">
                    </p>
                  
                </form>
               

                <form action="login.php" method="POST">

                    <p>
                     <input type="submit" name="register" value="New Registration" >
                    </p>

                </form>

            </div>

        </div>

    <?php
            require "config.php";
            session_start();
            $errors=array();
       
            if (isset($_POST['submit'])) {
                    $username=isset($_POST['username'])?$_POST['username']:'';
                    $password=isset($_POST['password'])?$_POST['password']:'';

                    $sql="SELECT * from users WHERE username='".$username."'
                    AND password='".$password."'";
                    $result=$conn->query($sql);
                
                    if ($result->num_rows > 0) {
                    while ($row= $result->fetch_assoc()) {
                        if ($row['role']=="customer") {
                            $_SESSION['userdata']=array("username"=>$row['username'],
                            "user_id"=>$row['user_id']);
                            header("Location: user.php");
                        } elseif ($row['role']=="admin") {
                            $_SESSION['admindata']=array
                            ("adminname"=>$row['username'],
                            "admin_id"=>$row['user_id']);
                            header("Location: admin.php");
                        }
                        
                    }
                } else {
                    $errors[] = array("input"=>"form","msg"=>"Invalid Username
                     Or Password!!");
                }

                if (count($errors)!=0 ) {
                        foreach ($errors as $error) {
                            echo  "<script>alert('* ".$error['msg']."')</script>";
                        }
                    }
                    $conn->close();
                }
                if (isset($_POST['register'])) {
                    header("Location: register.php");
                }
    ?>

</body>
</html>