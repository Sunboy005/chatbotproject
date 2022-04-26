<?php 
if(isset($_POST['register'])){    
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $occupation=$_POST["occupation"];
    $industry=$_POST["industry"];
    $password=$_POST["password"];
    $designation=2;
    $salt = 'shfdyewencnhcsdsewe'.$password;
    $hashed_password = md5($salt);            
    $date=date("Y-m-d h:i:s");

    $to = $email. "\r\n";
    $subject = 'Welcome to Josey MSME';
    $name = "Josey Marion";
    $lemail = "info@msmebyjosey.com"; 

  $message = "************************************************** \r\n" .
  	         "Welcome to  MSME by Josey!  \r\n" .
             "************************************************** \r\n" .	
            "Thank you for registering with us. \r\n" .
            "Your account has been created. \r\n" .
            "You can login with your password and email. \r\n" .
  	        "Name: " . $name . "\r\n" .
  	        "E-mail: " . $email . "\r\n" .
  	        

  $headers = "From: " . $name . "<" . $lemail . "> \r\n" .
  	         "Reply-To: " . $lemail . "\r\n" .
             "MIME-Version: 1.0" . "\r\n" .
             "Content-type:text/html;charset=UTF-8" . "\r\n";
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) ==0) {
        //Insert into the database
        $set_fk_checkr=mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=0;");
        $sql="INSERT INTO users (first_name, last_name, email, phone,designation_id, occupation, industry_id, password, date_created) VALUES ('$fname','$lname','$email','$phone','$designation','$occupation','$industry','$hashed_password','$date')";
        if (!mysqli_query($conn,$sql))
        {
        $_SESSION['msgtype']="error";
        $_SESSION['msg']="User registration failed";
        header("location:index.php");
        }else{
            mail($to, $subject, $message, $headers); 
            $_SESSION['msgtype']="success";
            $_SESSION['msg']="User registration successful";
            header("location:index.php");
        }
    }else{
        $_SESSION['msgtype']="error";
        $_SESSION['msg']="User already exists";
        header("location:index.php");
    }
}
  


//check if form is submitted
if (isset($_POST['login'])) {      
    $username = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $salt = 'shfdyewencnhcsdsewe'.$password;
    $hashed_password = md5($salt);                     
    $query = "SELECT * FROM users WHERE email = '$username' AND password = '$hashed_password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) >= 1) {
        $row = mysqli_fetch_array($result);
        $_SESSION['user'] = $row['email'];
        $_SESSION['msgtype']="success";
        $_SESSION['msg']="Login successful";
        $mydesignationcode=$row['designation_id'];
        if($mydesignationcode == 1){
            header("Location:resourcesadmin.php");
        }else{
            header("location:userhome.php");
        }
    }else {
        $_SESSION['msgtype']="error";
        $_SESSION['msg']="username or password is incorrect";        
    }                                 
}
?>