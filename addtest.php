<!DOCTYPE html>
<html>
<head>
      <title>
            Add_Question
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
          <h2>Add Question:</h2>
            <form action="addtest.php" method="POST">

                <p>
                <label for="testname">Test Name: &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp;<input type="text" 
                name="testname" value="<?php echo $_GET['t']; ?>" required></label>
                </p>

                <p>
                   <label for="question">Question: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp;<input type="text" 
                   name="question" required></label>
                </p>
                <p>
                   <label for="option_1">Option 1: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp;<input type="text" 
                   name="option_1" required></label>
                </p>
                <p>
                   <label for="option_2">Option 2: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp;<input type="text" 
                   name="option_2" required></label>
                </p>
                <p>
                   <label for="option_3">Option 3: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp;<input type="text" 
                   name="option_3" required></label>
                </p>
                <p>
                   <label for="option_4">Option 4: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp;<input type="text" 
                   name="option_4" required></label>
                </p>
                <p>
                   <label for="correct_option">Correct Option:
                    &nbsp; &nbsp;<input type="text" 
                   name="correct_option" required></label>

               
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
            $question=isset($_POST['question'])?$_POST['question']:'';
            $option_1=isset($_POST['option_1'])?$_POST['option_1']:'';
            $option_2=isset($_POST['option_2'])?$_POST['option_2']:'';
            $option_3=isset($_POST['option_3'])?$_POST['option_3']:'';
            $option_4=isset($_POST['option_4'])?$_POST['option_4']:'';
            $correct_option=isset($_POST['correct_option'])
            ?$_POST['correct_option']:'';

            if (count($errors)==0) {
                $sql="INSERT INTO test (testname, question, option_1, option_2, option_3, option_4, correct_option)

                VALUES ('".$testname."','".$question."','".$option_1."',
                '".$option_2."','".$option_3."','".$option_4."',
                '".$correct_option."')";

                if ($conn->query($sql) == true) {
                    echo "<script>alert('Question Add Successfully');
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