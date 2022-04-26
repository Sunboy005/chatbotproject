<?php require_once("../connections/connect.php");

if(!empty($_POST["email"])) {
	$email= $_POST["email"];
	if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

		echo "<span class='warning-validity'><i class='fa fa-info'></i> &nbsp; Invalid email";
	}
	else {
		$result ="SELECT count(*) FROM users WHERE email=?";
		$stmt = $conn->prepare($result);
		$stmt->bind_param('s',$email);
		$stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();
        if($count>0)
        {
            echo "<span class='error-validity'><i class='fa fa-times'></i> &nbsp; Email already exist .</span>";
        }
        else{
            echo "<span class='success-validity'><i class='fa fa-check'></i> &nbsp; Email available .</span>";
        }
    }
}
?>