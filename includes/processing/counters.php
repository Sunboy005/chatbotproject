<?php 
include('includes/connections/connect.php');

$result ="SELECT count(*) FROM users";
$stmt = $conn->prepare($result);
$stmt->execute();
$stmt->bind_result($users_count);
$stmt->fetch();
$stmt->close();

$result ="SELECT count(*) FROM resources";
$stmt = $conn->prepare($result);
$stmt->execute();
$stmt->bind_result($resources_count);
$stmt->fetch();
$stmt->close();


?>