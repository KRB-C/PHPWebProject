<!DOCTYPE html>
<html>

<head>
    <title>D Corporate</title>
    <link rel="StyleSheet" href="CSS/bootstrap.min.css" type="text/css">
    <link rel="StyleSheet" href="CSS/styles.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
</head>

<body class="adminbody">
    <div class="container-fluid">
        <header class="header">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <a class="navbar-brand" href="index.html">
                    <img src="Images/Icons/Logo.svg" width="30" height="30" alt="">
                    <span id="logoName">D Corporate</span>
                </a>
                <ul class="nav" style="position: absolute; right: 0;">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Welcome <?php 
                            session_start();
                            echo $_SESSION['username'];?></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <ul class="nav nav-pills my-5 mx-5" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active text-center" id="pills-home-tab" data-toggle="pill" href="#pills-customer" role="tab" aria-controls="pills-home" aria-selected="true">Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-reservation" role="tab" aria-controls="pills-profile" aria-selected="false">Reservation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-ordDetail" role="tab" aria-controls="pills-profile" aria-selected="false">Order Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-product" role="tab" aria-controls="pills-profile" aria-selected="false">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-feedback" role="tab" aria-controls="pills-contact" aria-selected="false">Feedback and Suggestion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-admin-tab" data-toggle="pill" href="#pills-admin" role="tab" aria-controls="pills-contact" aria-selected="false">Administrators</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-customer" role="tabpanel" aria-labelledby="pills-home-tab">

                    <?php 
                            include('mycon.php');
                            $result=mysqli_query($connection,"SELECT * from tblcustomer");
                            echo "
                            <TABLE class='table' align='center'> "; echo "
                                <TR align='center'>
                                    <b>
				<TH>Customer ID</TH>
				<TH> First Name </TH>
                <TH> Last Name </TH>
				<TH> Address </TH>
				<TH> Email </TH>
                <TH> Contact Number </TH>
				<TH colspan='2'> Action </TH>
	</b>
                                </TR>"; while($myrow=mysqli_fetch_array($result)) { echo"
                                <form action='myManageS.php' method='post'>"; echo"
                                    <TR align='center'>"; echo"

                                        <TD>"; echo"
                                            <input type='text' name='cusID' value='".$myrow['CustID']."' readonly>"; echo"
                                        </TD>"; echo"

                                        <TD>"; echo"
                                            <input type='text' name='cusFirstName' value='".$myrow['CustFName']."'>"; echo"
                                        </TD>"; echo"

                                        <TD>"; echo"
                                            <input type='text' name='cusLastName' value='".$myrow['CustLName']."'>"; echo"
                                        </TD>"; echo"

                                        <TD>"; echo"
                                            <input type='text' name='cusAddr' value='".$myrow['CustAddress']."'>"; echo"
                                        </TD>"; echo"
                                        
                                        <TD>"; echo"
                                            <input type='text' name='cusemail' value='".$myrow['CustEmail']."'>"; echo"
                                        </TD>"; echo"
                                        
                                        <TD>"; echo"
                                            <input type='text' name='cuscontack' value='".$myrow['CustContactNo']."'>"; echo"
                                        </TD>"; echo"

                                        <TD>"; echo"
                                            <button type='submit' name='btnUpdCus' class='btn btn-outline-primary'>Update</button>"; echo"
                                        </TD>"; echo"
                                        <TD>"; echo"
                                            <button type='submit' name='btnDelCus' class='btn btn-outline-primary'>Delete</button>"; echo"
                                        </TD>"; echo"

                                    </TR>"; echo"
                                </form>"; } echo "</TABLE>"; ?>

                </div>
                <div class="tab-pane fade" id="pills-reservation" role="tabpanel" aria-labelledby="pills-profile-tab">

                    <?php 
                            include('mycon.php');
                            $result=mysqli_query($connection,"SELECT * from tblorder");
                            echo "
                            <TABLE class='table' align='center'> "; echo "
                                <TR align='center'>
                                    <b>
				<TH>Order ID</TH>
				<TH> Customer ID </TH>
                <TH> Status </TH>
				<TH> Event Type </TH>
				<TH> Order Date </TH>
                <TH> Number of Guests </TH>
                <TH> Pricing </TH>
                <TH> Balance </TH>
				<TH colspan='2'> Action </TH>
	</b>
                                </TR>"; while($myrow=mysqli_fetch_array($result)) { echo"
                                <form action='myManageS.php' method='post'>"; echo"
                                    <TR align='center'>"; echo"

                                        <TD>"; echo"
                                            <input type='text' name='ordID' value='".$myrow['OrderID']."' readonly>"; echo"
                                        </TD>"; echo"

                                        <TD>"; echo"
                                            <input type='text' name='ordCusID' value='".$myrow['CustID']."'readonly>"; echo"
                                        </TD>"; echo"
                                        
                                        <TD>"; echo"
                                            <input type='text' name='ordstatus' value='".$myrow['Status']."'>"; echo"
                                        </TD>"; echo"

                                        <TD>"; echo"
                                            <input type='text' name='ordEvent' value='".$myrow['EventType']."'>"; echo"
                                        </TD>"; echo"

                                        <TD>"; echo"
                                            <input type='text' name='ordDate' value='".$myrow['OrderDate']."'readonly>"; echo"
                                        </TD>"; echo"
                                        
                                        <TD>"; echo"
                                            <input type='text' name='ordGuest' value='".$myrow['guestnum']."'>"; echo"
                                        </TD>"; echo"
                                        
                                        <TD>"; echo"
                                            <input type='text' name='ordPricing' value='".$myrow['Pricing']."'>"; echo"
                                        </TD>"; echo"
                                        
                                        <TD>"; echo"
                                            <input type='text' name='ordBalance' value='".$myrow['Balance']."'>"; echo"
                                        </TD>"; echo"

                                        <TD>"; echo"
                                            <button type='submit' name='btnUpdOrd' class='btn btn-outline-primary'>Update</button>"; echo"
                                        </TD>"; echo"
                                        <TD>"; echo"
                                            <button type='submit' name='btnDelOrd' class='btn btn-outline-primary'>Delete</button>"; echo"
                                        </TD>"; echo"

                                    </TR>"; echo"
                                </form>"; } echo "</TABLE>"; ?>

                </div>

                <div class="tab-pane fade" id="pills-ordDetail" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <?php 
                            include('mycon.php');
                            $result=mysqli_query($connection,"SELECT * from tblorderdetails order by OrderID");
                            echo "
                            <TABLE class='table' align='center'> "; echo "
                                <TR align='center'>
                                    <b>
				<TH>Order Details ID</TH>
				<TH> Order ID </TH>
                <TH> Product ID </TH>
	</b>
                                </TR>"; while($myrow=mysqli_fetch_array($result)) { echo"
                                <form>"; echo"
                                    <TR align='center'>"; echo"

                                        <TD>"; echo
                                            $myrow['orderdetails']; echo"
                                        </TD>"; echo"

                                        <TD>"; echo
                                            $myrow['OrderID']; echo"
                                        </TD>"; echo"
                                        
                                        <TD>"; echo
                                            $myrow['ProdID']; echo"
                                        </TD>"; echo"

                                    </TR>"; echo"
                                </form>"; } echo "</TABLE>"; ?>

                </div>
                <div class="tab-pane fade" id="pills-product" role="tabpanel" aria-labelledby="pills-contact-tab">

                    <?php 
                            include('mycon.php');
                            $result=mysqli_query($connection,"SELECT * from tblproduct");
                            echo "
                            <TABLE class='table' align='center'> "; echo "
                                <TR align='center'>
                                    <b>
				<TD>Product ID</TD>
				<TD> Product Name </TD>
                <TD> Product Type </TD>
				<TD colspan='2'> Action </TD>
	</b>
                                </TR>"; while($myrow=mysqli_fetch_array($result)) { echo"
                                <form action='myManageS.php' method='post'>"; echo"
                                    <TR align='center'>"; echo"

                                        <TD>"; echo"
                                            <input type='text' name='ProductID' value='".$myrow['ProdID']."'readonly>"; echo"
                                        </TD>"; echo"

                                        <TD>"; echo"
                                            <input type='text' name='ProductName' value='".$myrow['ProdName']."'>"; echo"
                                        </TD>"; echo"

                                        <TD>"; echo"
                                            <input type='text' name='ProductType' value='".$myrow['ProdType']."'>"; echo"
                                        </TD>"; echo"
                                        <TD>"; echo"
                                            <button type='submit' name='btnUpdProd' class='btn btn-outline-primary'>Update</button>"; echo"
                                        </TD>"; echo"
                                        <TD>"; echo"
                                            <button type='submit' name='btnDelProd' class='btn btn-outline-primary'>Delete</button>"; echo"
                                        </TD>";
                                    echo"</TR>";echo"</form>";}
                    
                    
                    
                    echo"<TR align='center'>";
                    echo"<TD>";
                    echo"<form action='myManageS.php' method='post'>";
                    echo"<input type='text' name='NewProdID' value='' disabled>";
                    echo"</TD>";
                    
                     echo"<TD>"; 
                    echo"<input type='text' name='NewProdName' value=''>";
                    echo"</TD>";
                    
                     echo"<TD>"; 
                    echo"<input type='text' name='NewProdType' value=''>";
                    echo"</TD>";
                    
                    echo"<TD colspan='2'>";
                    
                    echo"<button type='submit' name='btnAddProducts' class='btn btn-outline-primary'>Add</button>";
                    echo"</form>";
                    echo"</TD>"; 
                    echo"</TR>";
                    
                    echo "</TABLE>"; 
                    ?>

                </div>
                <div class="tab-pane fade" id="pills-feedback" role="tabpanel" aria-labelledby="pills-contact-tab">

                    <?php 
                            include('mycon.php');
                            $result=mysqli_query($connection,"SELECT * from tblfeedback");
                            echo "
                            <TABLE class='table' align='center'> "; echo "
                                <TR align='center'>
                                    <b>
				<TD>Feedback ID</TD>
				<TD> Name </TD>
                <TD> Message </TD>
				
				<TD > Action </TD>
	</b>
                                </TR>"; while($myrow=mysqli_fetch_array($result)) { echo"
                                <form action='myManageS.php' method='post'>"; echo"
                                    <TR align='center'>";

                                   echo "<TD>"; 
                                   echo"<input type='text' name='fbID' value='".$myrow['FeedbackID']."'readonly>"; 
                                   echo"</TD>"; 
                                    
                                    echo"<TD>";
                                    echo $myrow['Name'];
                                    echo"</TD>";
                                                                                   
                                    echo"<TD>";
                                    echo $myrow['Message'];
                                    echo"</TD>";
                                    echo"<TD>"; 
                                    echo"<button type='submit' name='btnDelFb' class='btn btn-outline-primary'>Delete</button>";
                                    echo"</TD>";
                                    echo"</TR>";
                                                                                  } 
                    echo"</form>";
                    echo "</TABLE>"; 
                    ?>

                </div>
                <div class="tab-pane fade" id="pills-admin" role="tabpanel" aria-labelledby="pills-contact-tab">

                    <?php 
                            include('mycon.php');
                            $result=mysqli_query($connection,"SELECT * from tbladmin");
                            echo "
                            <TABLE class='table' align='center'> "; echo "
                                <TR align='center'>
                                    <b>
				<TD>Admin ID</TD>
				<TD> Admin Name </TD>
                <TD> Admin Username </TD>
                <TD> Admin Password </TD>
				
				<TD colspan='2'> Action </TD>
	</b>
                                </TR>"; while($myrow=mysqli_fetch_array($result)) { echo"
                                <form action='myManageS.php' method='post'>"; echo"
                                    <TR align='center'>"; echo"

                                        <TD>"; echo"
                                            <input type='text' name='AdminID' value='".$myrow['AdminID']."'readonly>"; echo"
                                        </TD>"; echo"

                                        <TD>"; echo"
                                            <input type='text' name='AdminName' value='".$myrow['AdminName']."'>"; echo"
                                        </TD>"; echo"

                                        <TD>"; echo"
                                            <input type='text' name='AdminUname' value='".$myrow['AdminUsername']."'>"; echo"
                                        </TD>"; echo"
                                        
                                        <TD>"; echo"
                                            <input type='text' name='AdminPword' value='".$myrow['AdminPassword']."'>"; echo"
                                        </TD>"; echo"

                                        

                                        <TD>"; echo"
                                            <button type='submit' name='btnUpdAdmin' class='btn btn-outline-primary'>Update</button>"; echo"
                                        </TD>"; echo"
                                        <TD>"; echo"
                                            <button type='submit' name='btnDelAdmin' class='btn btn-outline-primary'>Delete</button>"; echo"
                                        </TD>";
                                    echo"</TR>";echo"</form>";}
                    
                     echo"<TR align='center'>";
                    echo"<TR align='center'>";
                    echo"<form action='myManageS.php' method='post'>";
                    echo"<TD>";
                    echo"<input type='text' name='NewAdminID' value=''disabled>";
                    echo"</TD>";
                    
                     echo"<TD>"; 
                    echo"<input type='text' name='NewAdminName' value=''>";
                    echo"</TD>";
                    
                     echo"<TD>"; 
                    echo"<input type='text' name='NewAdminUname' value=''>";
                    echo"</TD>";
                    
                    echo"<TD>"; 
                    echo"<input type='text' name='NewAdminPword' value=''>";
                    echo"</TD>";
                    
                    echo"<TD>"; 
                    echo"<button type='submit' name='btnAddAdmin' class='btn btn-outline-primary'>Add</button>";
                    echo"</TD>"; 
                    echo"</TR>";
                    echo"</form>";
                    echo "</TABLE>"; 
                    ?>

                </div>
            </div>
        </main>
        <footer class="footer">
            <div class="foot-txt text-white text-center font-weight-light container-fluid">
                <p>©2018 D'Corporate Catering Services. All rights reserved</p>
            </div>
        </footer>
    </div>
    <script src="JS/jquery-3.3.1.min.js"></script>
    <script src="JS/popper.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
</body>

</html>
