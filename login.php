<?php

$loginError=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include '_dbconnect.php';
    $name=$_POST['loguser'];
    $pass=$_POST['logpass'];
    $type=$_POST['logtype'];

    if($type=='Admin')
    {
        echo "I am admin session";
        $sql="SELECT * from admin_details where name='$name' and password='$pass'";
        $result=mysqli_query($conn,$sql);
    
        if($result->num_rows==1)
        {
            session_start();
            $_SESSION['username']=$name;
            $_SESSION['password']=$pass;
            $_SESSION['type']=$type;
            header("location:welcome.php");
        }
        
        else{
            // echo "Invalid Login Credentials";
            $loginError=true;
        }
    }
    else{
        
        // $sql="SELECT * from user_details where name='$name' and password='$pass'";
        $sql="SELECT * from user_details where name='$name'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
    
        if($result->num_rows==1 && password_verify($pass,$row['password']))
        {
            session_start();
            $_SESSION['username']=$name;
            $_SESSION['password']=$pass;
            $_SESSION['type']=$type;
            header("location:welcome.php");
        }
        
        else{
            // echo "Invalid Login Credentials";
            $loginError=true;
        }
    }
 
}
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/login_styles.css">
    <script src="https://kit.fontawesome.com/0c077e7e73.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    
    <div class="row">

        <div class="col-md-6 left-box" style="background-color: black;">
            <img src="images/logo5.png" alt="" class="title-pic">
            <img src="images/logo2.png" alt="" class="title-pic-2">
            <!-- <div class="description">
                <p class="des">Discover the world of cinema like never before with our premier movie database
                    Explore your favorite titles, actors, and directors with ease, and stay up-to-date
                    on the latest news and reviews. Immerse yourself in the magic of film with our
                    sleek and sophisticated platform, where knowledge and entertainment collide.</p>            </div> -->
                    <img src="images/logo3.png" alt="" class="title-pic">
        </div>
        <div class="col-md-6 right-box" >
            <div class="container box">
                <?php
                        if($loginError==true)
                        {
                            echo '<h2>Invalid Login Credentials</h2>
                            <hr>
                            <h4>Please Check your Username and Password
                                <br>
                                or If you dont have an Account,Please do create One.
                            </h4>
                            <button class="btn btn-dark"><a href="index.php">Back</a></button>';
                        }
                    ?> 
                    
                   
            </div>
                
        </div>
    </div>
    
    
</body>
</html>

