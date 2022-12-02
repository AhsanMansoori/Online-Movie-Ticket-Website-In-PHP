<?php
include 'connect.php';

$check=false;
$check2=false;
$check4=false;
$check5=false;
if(isset($_POST['btnForm']))
{
    if(!empty($_POST['guest_email']) && !empty($_POST['guest_Fname']) && !empty($_POST['guest_Lname']))
    {
        $email = $_POST['guest_email'];
        $F_name = $_POST['guest_Fname'];
        $L_name = $_POST['guest_Lname'];
        $sqlquery="SELECT * FROM `guestinfo` where `Guest_Email`='".$email."' ";
        $result2 = mysqli_query($conn,$sqlquery);
        $num= mysqli_num_rows($result2);
        if($num == 1)
        {
            $check4 =true;
        }
        else
        {
        

            $sql="INSERT INTO `guestinfo`(`Guest_Email`, `First_Name`, `Last_Name`)". 
            "VALUES ('".$email."','".$F_name."','".$L_name."')";
            $result = mysqli_query($conn,$sql);
            if($result)
            {
                $check =true;
            }
            
        }
    
        header("location: payment.php");
    }
    else
    {
        $check2=true;
    }

} 
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">
<head>
	<?php  include "head.php" ?>
</head>
<body style="background-image:url(images/BG.jpg); background-size: cover; background-repeat: no-repeat; ">
	
<?php 
	session_start();
	if(isset($_SESSION['loggedin']))
	{
		include 'Customernavbar.php';
	}
	else if(
		 include 'navbar.php'
	)
	
	?> 
<?php 
    if($check)
    {
        echo "<div class='alert alert-success m-0 p-0' role='alert'>
      Insert Successfully
    </div>";
    }
    if($check2)
    {
        echo "<div class='alert alert-danger m-0 p-0' role='alert'>
      Please Enter! 
      </div>";
    }
    if($check4)
    {
        echo "<div class='alert alert-danger m-0 p-0' role='alert'>
        You Alraedy Fill the Form! 
        </div>";
    }
    ?>
    <div class="container " style="width: 50%; background-color: #14222D; margin-top: 20px; padding: 40px; color: white;">
    <h3>YOUR DETAILS</h3>
    <p>Your movie awaits, just a few details to record your booking.</p>
<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" autocomplete="off" name="guest_email" id="GuestEmail" aria-describedby="emailHelp" placeholder="Enter Email">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">First Name</label>
    <input type="text" class="form-control"  autocomplete="off" name="guest_Fname" id="GuestFN" aria-describedby="emailHelp" placeholder="Enter First Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Last Name</label>
    <input type="text" class="form-control"  autocomplete="off" name="guest_Lname" id="GuestSN" aria-describedby="emailHelp" placeholder="Enter Last Name ">
  </div>

  <button type="Submit" class="btn btn-primary" name="btnForm" id="paymentForm">Make Payment</button>
</form>
</div>




	<footer class="ht-footer">
		<?php include "footer.php" ?>
	</footer>

	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/plugins2.js"></script>
	<script src="js/custom.js"></script>
</body>


</html>