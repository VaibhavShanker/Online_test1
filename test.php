<?php
    require "config.php";
    session_start();
?>
<html>
    <head>
        <title>
             Member Panel
        </title>

        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>


        <div id="head">
            <p>
                <a href="home.php">
                    <u>Home |</u>
                </a>

                <a href="test.php">
                    <u>Test |</u>
                </a>
                
            </p>
         </div>
        

        
<!-- 
        <div id="d">    
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
        </div> -->

        
        <div id="que">

            <?php

                require "config.php";
                $sql = "SELECT * from test WHERE testname='C ++' ";
                $result =$conn->query($sql);
                if ($result->num_rows> 0) {
                while($row =$result->fetch_assoc()) {

                    echo "
                            <h1>".$row['question']."</h1>
                          
                            
                          

                            <tr>

                              <td><input type='radio' /></td>
                              <td>".$row['option_1']."</td>
                            </tr>
                            <br>
                            
                            <tr>
                              <td><input type='radio' /></td>
                              <td>".$row['option_2']."</td>
                            </tr>
                            <br>

                            <tr>
                              <td><input type='radio' /></td>
                              <td>".$row['option_3']."</td>
                            </tr>
                            <br>

                            <tr>
                              <td><input type='radio' /></td>
                              <td>".$row['option_4']."</td>
                            </tr>
                                                     
                    ";
                }
                }
            ?>

                <form action="login.php" method="POST">

                    <p>
                    <input type="submit" name="register" value="Submit" >
                    </p>

                </form>

         </div>

         
         
    </body>
</html>