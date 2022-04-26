<?php
//include connection file
include "../connections/connect.php";

// Add a new Resource
if (isset($_POST['addresources'])){ 
    if($_FILES["imagefile"]["name"]){
		//$target_dir="../../assets/img/";
		$imgname=$_FILES["imagefile"]["name"];
		$type = $_FILES["imagefile"]["type"];
		$size = $_FILES["imagefile"]["size"];
		$temp = $_FILES["imagefile"]["tmp_name"]; 
		$error = $_FILES["imagefile"]["error"];//size
		  if($error>0)
		  {
			$_SESSION['msgtype']="alert-warning";
		$_SESSION['msg']="Error uploading your image!";
		  }
		  else{ 
				if ($type=="images/" || $size > 5000000){
				  
		$_SESSION['msgtype']="alert-warning";
		$_SESSION['msg']="The Image format is not allowed or file size is too big!";
				}else{ 
                    echo "<script>alert('".$imgname."')</script>";
				    move_uploaded_file($temp,"../../assets/img/".$imgname); 
				}
			}
            $imgname=$_FILES["imagefile"]["name"];
    } 
		else{
		  }
   $title = $_POST['title'];
   $summary = $_POST['summary'];
   $typeId = $_POST['type'];
   $details = $_POST['details'];
   $date=date('Y-m-d H:i:s');
   $set_fk_checkr=mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=0;");
   $ret="INSERT INTO resources (`title`, `summary`, `type_id`,`image`,`details`, date_created) VALUES ('$title', '$summary', '$typeId','$imgname','$details','$date');";
   $result=mysqli_query($conn,$ret);
   //chek if query successful
   if(!$result){
       $_SESSION['msg'] = "Resource failed to add!";
       header("location:../../addresources.php");
   }else{
       $_SESSION['msg'] = "Resource added successfully";   
       header("location:../../resourcesadmin.php");
   }
}

if (isset($_POST['editresources'])){ 
    $id=$_GET['id'];
   $title = $_POST['title'];
   $summary = $_POST['summary'];
   $typeId = $_POST['type'];
   $details = $_POST['details'];
   $set_fk_checkr=mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=0;");
   $ret="UPDATE resources SET `title`= '$title', `summary`= '$summary', `type_id`='$typeId',`details`='$details' WHERE resource_id='$id'";
   $result=mysqli_query($conn,$ret);
   //chek if query successful
   if(!$result){
       $_SESSION['msg'] = "Resource failed to edit!";
       header("location:../../addresources.php");
   }else{
       $_SESSION['msg'] = "Resource edited successfully";   
       header("location:../../resourcesadmin.php");
   }
}

//Adding a new Product
if (isset($_POST['addproduct'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $userid = $_POST['myid'];
    $categoryid = $_POST['category'];
    $created_date=date("Y-m-d : H:i:s", time());

    //Insert into the database
    $set_fk_checkr=mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=0;");
    $ret="INSERT INTO products (name, description, category_id, price, user_id, date_created)
    VALUES ('$name', '$description', '$categoryid', '$price', '$userid', '$created_date');";
    $result=mysqli_query($conn,$ret);
    //chek if query successful
    if($result){
        $_SESSION['msgtype']="success";
        $_SESSION['msg'] = "Product added successfully";
        header("location:../../userhome.php");
    }else{
        $_SESSION['msg'] = "Product failed to add";  
        echo "<script>window.open('../../userhome.php','_self')</script>";
    }
}

//Updating a Product
if (isset($_POST['updateproduct'])){
    $id=$_GET['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $categoryid = $_POST['category'];

    //Insert into the database
    $set_fk_checkr=mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=0;");
    $ret="UPDATE products SET name='$name', description='$description', category_id='$categoryid', price='$price' WHERE product_id='$id'";
    $result=mysqli_query($conn,$ret);
    //chek if query successful
    if($result){
        $_SESSION['msg'] = "Product updated successfully";
        echo "<script>alert('Success!', '".$_SESSION['msg']."');</script>";
        header("location:../../userhome.php");
    }else{
        $_SESSION['msg'] = "Product failed to update"; 
        echo"<script>alert(". $_SESSION['msg'].");</script> "; 
        echo "<script>window.open('../../userhome.php','_self')</script>";
    }
}

//Add a new Template
if (isset($_POST['addtemplate'])){
    $title = $_POST['title'];
    $link = $_POST['link']; 
    $templatecategory = $_POST['category'];
    $templatetype = $_POST['type'];
    $date=date('Y-m-d H:i:s');  
    $set_fk_checkr=mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=0;");
    $ret="INSERT INTO templates (`title`,  `dlink`,`templatecategory_id`,`templatetype_id`, `date_created`) VALUES ('$title', '$link', '$templatecategory', '$templatetype', '$date');"; 
    $result=mysqli_query($conn,$ret);
    //chek if query successful
    if(!$result){
        $_SESSION['msg'] = "Template failed to add!";
        header("location:../../templatesadmin.php");
    }else{
        $_SESSION['msg'] = "Template added successfully";   
        echo "<script>window.open('../../templatesadmin.php','_self')</script>";
    }
}



//Add a new Query

if (isset($_POST['addquery'])){
    $message =strtolower($_POST['message']);
    $response = $_POST['response'];
    $categoryId = $_POST['category'];
    $set_fk_checkr=mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=0;");
    $ret="INSERT INTO queries 
    (incoming_message, response_id, category_id)
    VALUES ('$message', '$response', '$categoryId');";
    $result=mysqli_query($conn,$ret);
    //chek if query successful
    if(!$result){
        $_SESSION['msg']="Query failed to add!";
        header("location:../../queriesadmin.php");
    }else{
        $_SESSION['msg']="Question added successfully"; 
        echo "<script>window.open('../../queriesadmin.php','_self')</script>";
    }
}

//Update a new Query
if (isset($_POST['updatequery'])){
    $id=$_POST['id'];
    $categoryId = $_POST['categoryId'];
    if($_POST['response']!=''){
        $addresponse = $_POST['response'];
        $link = $_POST['link'];
        $set_fk_checkr=mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=0;");
        $ret="INSERT INTO responses (response, link) VALUES ('$addresponse','$link');";
        $result=mysqli_query($conn,$ret);
        $query="SELECT * FROM responses WHERE response='$addresponse'";
        $result=mysqli_query($conn,$query);
        while($row = mysqli_fetch_array($result)){
            $responseId=$row['response_id']; 
        }
    }else{
        $responseId = $_POST['responseId'];
    }  
    $message =strtolower($_POST['message']);
    $set_fk_checkr=mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=0;");
    $ret="UPDATE  queries SET incoming_message='$message', response_id='$responseId', category_id='$categoryId' WHERE query_id='$id';";
    $result2=mysqli_query($conn,$ret);
    //check if query successful
    if(!$result2){
        $_SESSION['msg']="Query failed to update!";
        echo "<script>window.open('../../unansweredadmin.php','_self')</script>";
    }else{ 
        $_SESSION['msg']="Query updated successfully";
        header("location:../../unansweredadmin.php");
    }
}

//Add a category
include_once("usedfunctions.php");
if (isset($_POST['updatecat'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $slug = slugify($name);
    $ret="UPDATE category SET name='$name', description='$description', slug='$slug' WHERE category_id='$id'";
    $result=mysqli_query($conn,$ret);
    //chek if query successful
    if($result){
        $_SESSION['msg']="Category updated successfully";
        header("location:categoriesadmin.php");
    }else{     
        $_SESSION['msg']="Category failed to update";
        echo "<script>window.open('../../categoriesadmin.php','_self')</script>";
    }
}

//Adding a new Customer
if (isset($_POST['addcustomer'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $userid = $_POST['myid'];
    $created_date=date("Y-m-d : H:i:s", time());

    //Insert into the database
    $set_fk_checkr=mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=0;");
    $ret="INSERT INTO customers (first_name, last_name, phone, user_id, date_created)
    VALUES ('$fname', '$lname', '$phone', '$userid', '$created_date');";
    $result=mysqli_query($conn,$ret);
    //chek if query successful
    if($result){
        $_SESSION['msg'] = "Customer added successfully";
        
        header("location:../../userhome.php");
    }else{ 
        $_SESSION['msg']="Customer failed to add!";
        echo "<script>window.open('../../userhome.php','_self')</script>";
    }
}

//Adding a new Response
if (isset($_POST['addresponse'])){
    $response = $_POST['response'];
    $link = $_POST['link'];

    //Insert into the database
    $set_fk_checkr=mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=0;");
    $ret="INSERT INTO responses (response, link) VALUES ('$response','$link');";
    $result=mysqli_query($conn,$ret);
    //chek if query successful
    if($result){
        $_SESSION['msg']="Response added successfully";
        header("location:../../addresponse.php");
    }else{ 
        $_SESSION['msg']="Response failed to add!";
        echo "<script>window.open('../../addresponse.php','_self')</script>";
    }
}
?>