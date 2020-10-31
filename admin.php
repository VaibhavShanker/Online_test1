<!DOCTYPE html>
<html>
<head>
      <title>
            Add_Test
      </title>
      
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div id="wrapper">
    <div id="login">

        <p>
            <a id="login1" href="login.php">
                    <u style='font-family: sans-serif'>        
                      Logout
                    </u>
            </a>
        </p>


    </div>
        <div id="signup-form" >
            <br>
          <h2>Add TEST</h2>
            <form action="admin.php" method="POST">

                <p>
                   <label for="testname">Test Name: &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp;<input type="text" 
                   name="testname" required></label>
                </p>

               <p>
                  <label for="chooseimage">Image: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                  <input type="file" name="chooseimage" value="Choose image" required/> 
                  </label>
                </p>

                <p>
                    <label for="test_descr">Test Description: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                    <textarea name="test_descr" cols="40" rows="5" required></textarea>
                    </label>
                </p>

                <p>
                   <input type="submit" name="submit" value="Next">
                </p>
            </form>
        </div>
    </div>

    <?php
        require "config.php";
        $errors=array();

        if (isset($_POST['submit'])) {
            $testname=isset($_POST['testname'])?$_POST['testname']:'';
            $chooseimage=isset($_POST['chooseimage'])?$_POST['chooseimage']:'';
            $test_descr=isset($_POST['test_descr'])?$_POST['test_descr']:'';
          
                       if (count($errors)==0) {
                $sql="INSERT INTO testcat (testname, chooseimage, test_descr)

                VALUES ('".$testname."','".$chooseimage."','".$test_descr."')";

                if ($conn->query($sql) == true) {
                    echo "<script>alert('Test Add Successfully,Click OK to Add Question ');
                    window.location='addtest.php?t=".$testname."' ;</script>";
                    
                    
                } else {
                    $errors[]=array("input"=>"form","msg"=>"Test not add");
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