<?php 
if (isset($_SESSION['msg'])){
    $notify= "<script>alert('". $_SESSION['msg']."')</script>";
    echo $notify;
    if($notify){
        unset($_SESSION['msg']);
    }
}
   
?>