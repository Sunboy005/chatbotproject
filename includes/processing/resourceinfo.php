<?php
//include "../connections/connect.php";


if (isset($_POST['addcat'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $slug = slugify($name);
    //insert into database
    $ret="INSERT INTO category (name, description, slug) VALUES ('$name', '$description', '$slug')";
    $result=mysqli_query($conn,$ret);
    //notification
    if($result){
        $_SESSION['msgtype']="success";
        $_SESSION['msg'] = "Category added successfully";
        header("location:categoriesadmin.php");
    }else{
        $_SESSION['msgtype']="danger";
        $_SESSION['msg'] = "Category not added successfully";
        echo "<script>window.open('../../categoriesadmin.php','_self')</script>";
    }
}
   

?>
