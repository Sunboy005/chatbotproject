<?php 
include "includes/processing/usedfunctions.php";
?>   
<h2>
    <div class="text-center">Latest Resources</div>
</h2>
    <?php 
    $query ="SELECT * FROM resources ORDER BY date_created DESC LIMIT 10";
    $stmt2 = $conn->prepare($query);
    $stmt2->execute();
    $res=$stmt2->get_result();
    while($rowd=$res->fetch_object())
    {
        $tpreimage=$rowd->image;
        $tid=$rowd->resource_id;
        $tdatet=$rowd->date_created;
        $tdatecreated=get_time_ago(strtotime($tdatet));
        $ttypeId=$rowd->type_id;
        $ttitle=$rowd->title;
        if($ttypeId!==0){
            $tret="select * from type where id = '$ttypeId'";
            $tresult=mysqli_query($conn, $tret);
            while ($row=mysqli_fetch_array($tresult))
            {
                $tcat=$row['name'];
                $tslug=$row['slug'];
            }
        }
        else{
            $tcat="Uncategorized";
        }
        if($tpreimage!=''){
            $timage='<img src="assets/img/resources/'.$tpreimage.'" height="50px" width="50px">';
        }else{
        $timage='<img src="assets/img/template.png" height="50px" width="50">';
        }  
    ?>
        <div class="col-md-12">
            <div class="card mb-4 box-shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-9">
                                <p><a href="viewdetails.php?id=<?php echo $tid;?>"><?php echo $ttitle;?></a></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted"><?php echo $tdatecreated;?></small>
                                </div>
                            </div>
                            <div class="col-sm-3 rotate-img">
                                <?php echo $timage;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    
  