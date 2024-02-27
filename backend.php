 <?php
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root'; 
    $DATABASE_PASS = ''; 
    $DATABASE_NAME  = 'mv';

    $con = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);  

    if(mysqli_connect_error())
    {
        exit('Error connecting to the Database' . mysqli_connect_error());
    }

    // if(isset($_POST['username'],$_POST['email'],$_POST['password'],$_POST['type']))
    // {
    //     exit('Empty Fiels(s)');
    // }
    
        if($stmt = $con->prepare('SELECT user_id FROM user_details WHERE name = ?'))
        {
            $stmt->bind_param('s',$_POST['logname']);
            $stmt->execute();
            $stmt->store_result();
            
            if($stmt->num_rows>0)
            {
                echo 'Username already exists';
            }
            else
            {
                if($stmt = $con->prepare('INSERT INTO user_details(name,email,password,type) VALUES(?,?,?,?)'))
                {
                    $password = password_hash($_POST['logpass'], PASSWORD_DEFAULT);
                    $stmt->bind_param('ssss',$_POST['logname'],$_POST['logemail'],$password,$_POST['logtype']);
                    $stmt->execute();
                    echo 'Successfully Registered';
                }
                else{
                    echo 'Modda kudu';
                }
            }
            $stmt->close();
        }
        else{
            echo 'Modda kudu ra';
        }



$con->close();
?> 