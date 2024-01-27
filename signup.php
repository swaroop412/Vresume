<?php
    
    $name=$_POST["name"];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $con=new mysqli('localhost','root','','vresume');
    if($con->connect_error) {   
    die("connectionn failed".$con->connect_error);
        }
    else{
        $stmt = $con->prepare("select * from login where email = ?");
        $stmt->bind_param("s", $email); 
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            header('Location:index.html');
            
        }
        else{
            echo "Invalid Username";
        }
    }


