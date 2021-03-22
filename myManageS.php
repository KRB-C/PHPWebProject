<?php
	   include('mycon.php');


  if(isset($_POST["btnUpdCus"])||isset($_POST["btnDelCus"]))
  {
        $resultCustomer=mysqli_query($connection,"SELECT * from tblcustomer");

	$DBcusID=mysqli_real_escape_string($connection,$_POST["cusID"]);
	$DBcusFname=mysqli_real_escape_string($connection,$_POST["cusFirstName"]);
	$DBcusLname=mysqli_real_escape_string($connection,$_POST["cusLastName"]);
	$DBcusAddr=mysqli_real_escape_string($connection,$_POST["cusAddr"]);
    $DBcusEmail=mysqli_real_escape_string($connection,$_POST["cusemail"]);
	$DBcusContact=mysqli_real_escape_string($connection,$_POST["cuscontack"]);
  }
	
if(isset($_POST["btnUpdCus"]))
{
	$UpdQRYCus="UPDATE tblcustomer SET CustID='$DBcusID', CustFName='$DBcusFname', CustLName='$DBcusLname', CustAddress='$DBcusAddr', CustEmail='$DBcusEmail', CustContactNo='$DBcusContact' WHERE CustID='$DBcusID';";
	
	if(mysqli_query($connection,$UpdQRYCus))
	{
		Print '<script>alert("Updated!");</script>';
		Print '<script>window.location.assign("admin.php")</script>';
	}
}

if(isset($_POST["btnDelCus"]))
{
	$DelQRYCus="DELETE FROM tblcustomer WHERE CustID='$DBcusID'; ";
	if(mysqli_query($connection,$DelQRYCus))
	{
		Print '<script>alert("Record Deleted!");</script>';
		Print '<script>window.location.assign("admin.php")</script>';
	}
}
 if(isset($_POST["btnUpdOrd"])||isset($_POST["btnDelOrd"]))
 {
    $resultOrder=mysqli_query($connection,"SELECT * from tblorder");

	$DBordID=mysqli_real_escape_string($connection,$_POST["ordID"]);
	$DBordCusID=mysqli_real_escape_string($connection,$_POST["ordCusID"]);
	$DBordStatus=mysqli_real_escape_string($connection,$_POST["ordstatus"]);
	$DBordEvent=mysqli_real_escape_string($connection,$_POST["ordEvent"]);
    $DBordDate=mysqli_real_escape_string($connection,$_POST["ordDate"]);
	$DBordGuest=mysqli_real_escape_string($connection,$_POST["ordGuest"]);
    $DBordPrice=mysqli_real_escape_string($connection,$_POST["ordPricing"]);
	$DBordBalance=mysqli_real_escape_string($connection,$_POST["ordBalance"]);
 }
	
if(isset($_POST["btnUpdOrd"]))
{
	$UpdQRYOrd="UPDATE tblorder SET OrderID='$DBordID', CustID='$DBordCusID', Status='$DBordStatus', EventType='$DBordEvent', OrderDate='$DBordDate', guestnum='$DBordGuest',Pricing='$DBordPrice',Balance='$DBordBalance' WHERE OrderID='$DBordID';";
	
	if(mysqli_query($connection,$UpdQRYOrd))
	{
		Print '<script>alert("Updated!");</script>';
		Print '<script>window.location.assign("admin.php")</script>';
	}
}

if(isset($_POST["btnDelOrd"]))
{
	$DelQRYOrd="DELETE FROM tblorder WHERE OrderID='$DBordID'; ";
	if(mysqli_query($connection,$DelQRYOrd))
	{
		Print '<script>alert("Record Deleted!");</script>';
		Print '<script>window.location.assign("admin.php")</script>';
	}
}


 if(isset($_POST["btnUpdProd"])||isset($_POST["btnDelProd"]))
 {
    $resultProd=mysqli_query($connection,"SELECT * from tblproduct");

	$DBprodID=mysqli_real_escape_string($connection,$_POST["ProductID"]);
	$DBprodName=mysqli_real_escape_string($connection,$_POST["ProductName"]);
	$DBprodType=mysqli_real_escape_string($connection,$_POST["ProductType"]);
     

 }
	
if(isset($_POST["btnUpdProd"]))
{
	$UpdQRYProd="UPDATE tblproduct SET ProdID='$DBprodID', ProdName='$DBprodName', ProdType='$DBprodType' WHERE ProdID='$DBprodID';";
	if(mysqli_query($connection,$UpdQRYProd))
	{
		Print '<script>alert("Updated!");</script>';
		Print '<script>window.location.assign("admin.php")</script>';
	}
}

if(isset($_POST["btnDelProd"]))
{
	$DelQRYProd="DELETE FROM tblproduct WHERE ProdID='$DBprodID'; ";
	if(mysqli_query($connection,$DelQRYProd))
	{
		Print '<script>alert("Record Deleted!");</script>';
		Print '<script>window.location.assign("admin.php")</script>';
	}
}

if(isset($_POST["btnAddProducts"]))
{
     function addDB($tblName){ //counts number of records in a table
    include('mycon.php');
    $countQuery = mysqli_query($connection,"SELECT * from ".$tblName);
    $custcount = mysqli_num_rows($countQuery) + 1;
    return $custcount;
    $connection->close();
}
    
    
    $NextProdID=addDB('tblproduct');
    $sql = "INSERT into tblproduct(ProdID,ProdName,ProdType) Values (?,?,?)";
    $stmt = mysqli_prepare($connection,$sql);
    $stmt->bind_param("iss",$NextProdID, $_POST['NewProdName'], $_POST['NewProdType']);
    $stmt->execute();
    $connection->close();
    
		Print '<script>alert("Record Added!");</script>';
		Print '<script>window.location.assign("admin.php")</script>';
	
}

 if(isset($_POST["btnDelFb"]))
 {
    $resultFb=mysqli_query($connection,"SELECT * from tblfeedback");

	$DBfbID=mysqli_real_escape_string($connection,$_POST["fbID"]);
 }

if(isset($_POST["btnDelFb"]))
{
	$DelQRYfb="DELETE FROM tblfeedback WHERE FeedbackID='$DBfbID'; ";
	if(mysqli_query($connection,$DelQRYfb))
	{
		Print '<script>alert("Record Deleted!");</script>';
		Print '<script>window.location.assign("admin.php")</script>';
	}
}



if(isset($_POST["btnUpdAdmin"])||isset($_POST["btnDelAdmin"]))
 {
    $resultProd=mysqli_query($connection,"SELECT * from tbladmin");

	$DBadminID=mysqli_real_escape_string($connection,$_POST["AdminID"]);
	$DBadminName=mysqli_real_escape_string($connection,$_POST["AdminName"]);
	$DBadminUname=mysqli_real_escape_string($connection,$_POST["AdminUname"]);
    $DBadminPword=mysqli_real_escape_string($connection,$_POST["AdminPword"]);
     

 }
	
if(isset($_POST["btnUpdAdmin"]))
{
	$UpdQRYAdmin="UPDATE tbladmin SET AdminID='$DBadminID', AdminName='$DBadminName', AdminUsername='$DBadminUname', AdminPassword='$DBadminPword' WHERE AdminID='$DBadminID';";
	if(mysqli_query($connection,$UpdQRYAdmin))
	{
		Print '<script>alert("Updated!");</script>';
		Print '<script>window.location.assign("admin.php")</script>';
	}
}

if(isset($_POST["btnDelAdmin"]))
{
	$DelQRYAdmin="DELETE FROM tbladmin WHERE AdminID='$DBadminID'; ";
	if(mysqli_query($connection,$DelQRYAdmin))
	{
		Print '<script>alert("Record Deleted!");</script>';
		Print '<script>window.location.assign("admin.php")</script>';
	}
}

if(isset($_POST["btnAddAdmin"]))
{ 
    $adminQry=mysqli_query($connection,"SELECT AdminID FROM tbladmin ORDER BY AdminID DESC LIMIT 1");
    $adminResult =  mysqli_fetch_assoc($adminQry);
    $NextAdminID=$adminResult['AdminID'];
    $NextAdminID+=1;
    $sql = "INSERT into tbladmin(AdminID,AdminName,AdminUsername,AdminPassword) Values (?,?,?,?)";
    $stmt = mysqli_prepare($connection,$sql);
    $stmt->bind_param("isss",$NextAdminID, $_POST['NewAdminName'], $_POST['NewAdminUname'], $_POST['NewAdminPword']);
    $stmt->execute();
    $connection->close();
    
		Print '<script>alert("Record Added!");</script>';
		Print '<script>window.location.assign("admin.php")</script>';
}



?>
