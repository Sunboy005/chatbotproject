<?php 
    include "../connections/connect.php";
    $messageVal=$_POST['bal'];   
    if(isset($messageVal)){
        $msg=mysqli_real_escape_string($conn,$messageVal);
        $sql=mysqli_query($conn,"SELECT * FROM queries WHERE incoming_message RLIKE '[[:<:]]".$msg."[[:>:]]' LIMIT 0,1");
        $count=mysqli_num_rows($sql);
        if($count==0){
            $set_fk_checkr=mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=0;");
            $sql=mysqli_query($conn,"INSERT INTO queries(incoming_message) VALUES('$messageVal')");
            echo "Sorry , I don't understand you. Please try again.";
        }else{
        while($row=mysqli_fetch_array($sql)){
            $responseId=$row['response_id'];  
            if($responseId==0){
                echo "Sorry , I don't understand you. Please try again.";
            }          
            $sql2 ="SELECT * FROM responses WHERE response_id='$responseId'";
            $result2 = mysqli_query($conn, $sql2);
            while($row2 = mysqli_fetch_array($result2)){
                $response=$row2['response'];
                $link=$row2['link'];                
                if($link!=''){
                    $response = $response ."<a href='http://".$link."'target='_blank' class='btn btn-primary btn-block'> Click here</a>";
                }
                
               echo $response;
           }      
        }
                
    }
}     
?>