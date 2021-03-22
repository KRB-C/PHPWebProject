<?php
    include('mycon.php');
    session_start();


    $username = mysqli_real_escape_string($connection,$_POST['uname']);
    $password = mysqli_real_escape_string($connection,$_POST['pword']);
    
    $query1 = mysqli_query($connection,"SELECT * from tbladmin WHERE AdminUsername = '$username'");
    $exists1 = mysqli_num_rows($query1);

    $table_users1 = "";
    $table_password1 = "";
    
    if($exists1 > 0)
    {
        while($row =  mysqli_fetch_assoc($query1))
        {
            $table_users1 = $row['AdminUsername'];
            $table_password1 = $row['AdminPassword'];
        }
        if(($username == $table_users1) && ($password == $table_password1))
        {
         $_SESSION['username'] = $username; header("Location: admin.php");
        }
        else
        {
            Print '<script>alert("Incorrect Password!";</script>';
            Print '<script>window.location.assign("login-main.php")</script>';
        }
    }
    else
    {
        Print '<script>alert("Incorrect Username!";</script>';
        Print '<script>window.location.assign("login-main.php")</script>';
    }    
?>
