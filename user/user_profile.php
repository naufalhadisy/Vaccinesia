<?php 
 session_start();
 $identifier = 4;
 include("page_header.php");
 $account = $_SESSION["user_email"];

 error_reporting(0);
 $submit = $_POST['submit123'];


if(isset ($submit)) {

                
$password  = $_POST['Password'];
$newpassword1 = $_POST['newPass1'];
$newpassword2 = $_POST['newPass2'];

$query4 = "SELECT Password FROM user WHERE Email = '$account'";
$result2 = mysqli_query($con, $query4);
$data  = mysqli_fetch_array($result2);

if ($data['Password'] == md5($password))
{
   
    if ($newpassword1 == $newpassword2)
    {
        $newencryptedpassword = md5($newpassword1);
         
        $query5 = "UPDATE user SET Password = '$newencryptedpassword' WHERE Email = '$account' ";
        $result3 = mysqli_query($con, $query5);
        
        if ($result3) echo "<script>alert('Password Changed')</script>";
    }
    else echo "<script>alert('Incorrect New Password')</script>";
}
else echo "<script>alert('Current Password is Incorrect')</script>";
}

?>

</div>
</section>
        <section class="s6">
            <div class="main-container">
                <div class="hero-centertitle">
                    <h1>User Profile</h1>
                </div>

                <?php 
                     $province = null;
                ?>

                <div class="hero-subtitle">

                    <?php 
                         $result1 = mysqli_query($con, "select * from user where Email = '$account' ");
                         $num1 = mysqli_num_rows($result1);
                        
                         if ($num1 == 1) {
                            while($account1 = mysqli_fetch_array($result1)){
                            ?>
                    

                    <h5>User Profile Information:</h5>
                    <br>

                    <p>Name : <?php echo $account1['Name']; ?> </p>
                    <p>Phone Number : (+62) <?php echo $account1['PhoneNum']; ?> </p>
                    <p>Email : <?php echo $account1['Email']; ?> </p>

                    <?php 
                        }
                    }
                    ?>
                     
                     <br>
                    <div class="bg-white p-3 border rounded" style="width: 450px;">
                        <form method="POST" action="">
                        <table style="border: none;">
                            <tr>
                                <td style="border: none;">Old Password</td>
                                <td style="border: none;">: </td>
                                <td style="border: none;"><input class="form-control" type="password" name="Password" required></td>
                            <tr>
                            <tr>
                                <td style="border: none;">New Password</td>
                                <td style="border: none;">: </tdstyle=>
                                <td style="border: none;"><input class="form-control" type="password" name="newPass1" required></td>
                            <tr>
                            <tr>
                                <td style="border: none;">Confirm Password</td>
                                <td style="border: none;">: </td>
                                <td style="border: none;"><input class="form-control" type="password" name="newPass2" required></td>
                            <tr>
                        </table>
                        <button class="btn btn-danger" type="submit" name="submit123">Change</button>
                    </form>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="hero-subtitle">
                    <h5>History:</h5>
                    <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-wrap">	
                                        <?php 
                                                    while ($info = $result1->fetch_assoc()) {
                                                        $myvalue = $info['Name'];
                                                    }

                                                    $result = mysqli_query($con, "select * from reg_vac where name = '$myvalue'");
                                                    $num = mysqli_num_rows($result);

                                                    if ($num > 0) {
                                                    ?>
                                                        <table class="table table-responsive-xl container table table-bordered bg-white">
                                                            <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Address</th>
                                                                    <th>Hospital</th>
                                                                    <th>Vaccine Type</th>
                                                                    <th>Phase</th>
                                                                    <th>Date</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                    <?php
                                                    while($d = mysqli_fetch_array($result)){
                                                        ?>  
                                                        <tbody>
                                                            <tr>
                                                                <td> <?php echo $d['Name']; ?> </td>
                                                                <td> <?php echo $d['Address']; ?> </td>
                                                                <td> <?php echo $d['Hospital']; ?> </td>      
                                                                <td> <?php echo $d['VaccineType']; ?> </td>
                                                                <td> <?php echo $d['Phase']; ?> </td>
                                                                <td> <?php echo $d['Date']; ?> </td>
                                                                <td> <?php echo $d['Status']; ?> </td>
                                                            </tr>
                                                        </tbody>
                                                        
                                                    <?php 
                                                    }
                                                    } else {
                                                        ?>
                                                            <h5>No History</h5><br>
                                                        <?php
                                                    }
                                                    ?>
                                            </table>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
        </section>
    
        
<?php include("page_footer.php"); ?>