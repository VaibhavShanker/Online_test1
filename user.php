<?php
    require "config.php";
    session_start();
?>
<!DOCTYPE html>
<html>
  <head>
      <title>
            Online Test Platform
     </title>

     <link rel="stylesheet" type="text/css" href="home.css">
  </head>
<body>
            <div id="wrapper">
                      
                    <div id="topright">
        
                        <div id="logout">
                                    <p>
                                    <a href="login.php">
                                        <u style='font-family: sans-serif'>Logout</u>
                                        </a>
                                    </p>
                        </div>

                    </div>

                        <div id="header">
                                <h1 id="logo">Welcome to Online Test Platform</h1>
                                              
                        </div>
            </div>

                <div id="content">
                        <div id="subcontent1">
                                
                              
                                <?php

                                    if (isset($_SESSION['userdata'])) {//p

                                        echo "<h2>Hello</h2>" 
                                        .$_SESSION['userdata']['username']."</h1>";

                                        session_unset();//p
                                        session_destroy();//p

                                    } else {
                                        
                                        echo "<script>alert('Member logout, please login again to continue');
                                        window.location='login.php';
                                        </script>";
                                    }
                                 ?>  
                             
                             <form action="result.php" method="POST">

                                <p>
                                <input type="submit" name="register" value="View Result" >
                                </p>

                            </form>
                            
                            </div>

         
           <div class='Heading'>
                        
            <?php

                require "config.php";
                $sql = "SELECT * from testcat" ;
                $result =$conn->query($sql);
                if ($result->num_rows> 0) {
                while($row =$result->fetch_assoc()) {

                    echo "<div class='Heading'>
                            <a><img src=".$row['chooseimage']." /></a>

                            
                            <h1>".$row['testname']."</h1>
                            <h4>".$row['test_descr']."</h4>
                            <p>
                              <b>
                                <a href='test.php'>Start Test</a>
                                
                              </b>
                            </p>

                            </div>
                                               
                          ";
                }
                }

             ?>

   </div>

            <div id="footer">
              <div id="footerL">
                  <p>COPYRIGHT @2020</p>
              </div>
              <div id="footerR">
                  <p>Online test platform</p>
              </div>
          </div>

        </div>

</body>
</html>