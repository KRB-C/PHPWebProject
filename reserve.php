<?php
function addCustomer($custCount) {
    include('mycon.php');
    $sql = "INSERT into tblcustomer(CustID,CustFName,CustLName,CustAddress,CustEmail,CustContactNo) Values (?,?,?,?,?,?)";
    $cusID = "C-".$custCount;
    $stmt = mysqli_prepare($connection,$sql);
    $stmt->bind_param("ssssss",$cusID, $_POST['fname'], $_POST['lname'], $_POST['addr'], $_POST['email'], $_POST['contact']);
    $stmt->execute();
    return $cusID;
    $connection->close();
}
function parseDate(){
    $date_array = date_parse($_POST['inputdate']);
    $string_date= date('Y-m-d', mktime($date_array['hour'], $date_array['minute'], $date_array['second'], $date_array['month'], $date_array['day'], $date_array['year']));
    return $string_date;
}
function validDate(){
    $date_array = date_parse($_POST['inputdate']);
    $string_date= date('Y-m-d', mktime($date_array['hour'], $date_array['minute'], $date_array['second'], $date_array['month'], $date_array['day'], $date_array['year']));

    $input_date = new DateTime($string_date);
    $now = new DateTime();
    $result = $now->format('Y-m-d');

    if($input_date < $now) {
        return false;
    } 
    else{
        return true;}
   
}
function norepeatDate($date){
     include('mycon.php');
    $query1 = mysqli_query($connection,"SELECT * from tblorder WHERE OrderDate = '$date'");
    $exists1 = mysqli_num_rows($query1);
     $dbDate = "";
    if($exists1 > 0)
    {   while($row =  mysqli_fetch_assoc($query1))
        {
            $dbDate = $row['OrderDate'];
        }
        if($date == $dbDate) 
        {
           return false;
        }   
    }
    else{
        return true;
    }
    $connection->close();
}
function computeBalance(){
    return $_POST['numguest'] * $_POST['price'];
}

function addOrder($ordCount,$balance,$CID,$inputdate){
    include('mycon.php');
     $sql = "INSERT into tblorder(OrderID,CustID,Status,EventType,OrderDate,guestnum,Pricing,Balance) Values (?,?,?,?,?,?,?,?)";
    $ordID = "O-".$ordCount;
    $status = "Open";
    $stmt = mysqli_prepare($connection,$sql);
    $stmt->bind_param("sssssiii",$ordID, $CID, $status, $_POST['event'], $inputdate, $_POST['numguest'],$_POST['price'],$balance);
    $stmt->execute();
    $connection->close();
}
function addOrderdetails($ordCount,$ordt_count){
     $ordID = "O-".$ordCount;
     $orddetailsID = "OD-".$ordt_count;
    
    if(isset($_POST['chicken'])){
    include('mycon.php');
    $sql = "INSERT into tblorderdetails(orderdetails,OrderID,ProdID) Values (?,?,?)";
    $stmt = mysqli_prepare($connection,$sql);
    $stmt->bind_param("ssi",$orddetailsID, $ordID, $_POST['chicken']);
    $stmt->execute();
    $connection->close();
         $ordt_count+=1;
    $orddetailsID = "OD-".$ordt_count;
    }
    
   
    
    if(isset($_POST['pork'])){
    include('mycon.php');
    $sql = "INSERT into tblorderdetails(orderdetails,OrderID,ProdID) Values (?,?,?)";
    $stmt = mysqli_prepare($connection,$sql);
    $stmt->bind_param("ssi",$orddetailsID, $ordID, $_POST['pork']);
    $stmt->execute();
    $connection->close();
         $ordt_count+=1;
    $orddetailsID = "OD-".$ordt_count;
    }
    
   
    
    if(isset($_POST['beef'])){
    include('mycon.php');
    $sql = "INSERT into tblorderdetails(orderdetails,OrderID,ProdID) Values (?,?,?)";
    $stmt = mysqli_prepare($connection,$sql);
    $stmt->bind_param("ssi",$orddetailsID, $ordID, $_POST['beef']);
    $stmt->execute();
    $connection->close();
        $ordt_count+=1;
    $orddetailsID = "OD-".$ordt_count;
    }
    
    
    
    if(isset($_POST['pastaveg'])){
    include('mycon.php');
    $sql = "INSERT into tblorderdetails(orderdetails,OrderID,ProdID) Values (?,?,?)";
    $stmt = mysqli_prepare($connection,$sql);
    $stmt->bind_param("ssi",$orddetailsID, $ordID, $_POST['pastaveg']);
    $stmt->execute();
    $connection->close();
         $ordt_count+=1;
    $orddetailsID = "OD-".$ordt_count;
    }
    
   
    
    if(isset($_POST['dessert'])){
    include('mycon.php');
    $sql = "INSERT into tblorderdetails(orderdetails,OrderID,ProdID) Values (?,?,?)";
    $stmt = mysqli_prepare($connection,$sql);
    $stmt->bind_param("ssi",$orddetailsID, $ordID, $_POST['dessert']);
    $stmt->execute();
    $connection->close();
    }
}
function reserveDB($tblName){ //counts number of records in a table
    include('mycon.php');
    $countQuery = mysqli_query($connection,"SELECT * from ".$tblName); 
    $custcount = mysqli_num_rows($countQuery) + 1; 
    return $custcount;
    $connection->close();
    
}

//main()
$date=parseDate();

if(validDate() && norepeatDate($date)){
    $orderCount = reserveDB('tblorder');
    $balance=computeBalance();
    $currentCID=addCustomer(reserveDB('tblcustomer'));
    addOrder($orderCount,$balance,$currentCID,$date);
    addOrderdetails($orderCount,reserveDB('tblorderdetails'));
    Print '<script>alert("Thank You for making a reservation! Please Wait for your confirmation. Order Code:'.$orderCount.' ");</script>';
    Print '<script>window.location.assign("index.html")</script>';
    
}
else{
header("Location: reservation.html");
    echo "<script>
    alert('Invalid Date/Date has been taken!');
</script>";
}
?>
