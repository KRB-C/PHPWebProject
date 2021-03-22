<?php
include('mycon.php');
if(isset($_POST["btnAbtus"]))
{ 
    $fbQry=mysqli_query($connection,"SELECT FeedbackID FROM tblfeedback ORDER BY FeedbackID DESC LIMIT 1");
    $fbResult =  mysqli_fetch_assoc($fbQry);
    $NextfbID=$fbResult['FeedbackID'];
    $NextfbID+=1;
    $sql = "INSERT into tblfeedback(FeedbackID,Name,Message) Values (?,?,?)";
    $stmt = mysqli_prepare($connection,$sql);
    $stmt->bind_param("iss",$NextfbID, $_POST['FBname'], $_POST['FBtxt']);
    $stmt->execute();
    $connection->close();
    
		Print '<script>alert("Thank you for your evaluation!");</script>';
		Print '<script>window.location.assign("aboutus.html")</script>';
}
?>
