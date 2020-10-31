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
                        <ul id="menu1">
                            <li><a href='login.php'><u>Login</u></a></li>
                            <li><a href='register.php'><u>Register</u></a></li>
                            
                        </ul>

                      </div>

                        <div id="header">
                                <h1 id="logo">Online Test Platform</h1>
                                              
                        </div>
            </div>

                <div id="content">
                        <div id="subcontent">
                                <h1>Online Examination</h1>
                              
                                <p style="color:white">
                                   Free online test to practice for Competitive exams.<br>
                                   Aptitude, Logical Reasoning, Computer Questions <br>
                                   will help you to prepare for Online Exam,Entrance <br>
                                   and Interview. Learn and Practice online test for <br>
                                   Free and Prepare for your exam online with many <br> 
                                   free tests.
                                </p>

                                <button>Learn More</button>

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
                                      <a href='login.php'>Start Test</a>
                                      
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