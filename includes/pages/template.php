   
    <?php 
    $result = mysqli_query($conn,"SELECT * FROM `templatecategory`");
    $counter1=mysqli_num_rows($result);
    while($row = mysqli_fetch_array($result)){?>
    <div class="col text-center"> 
        <?php
            if($counter1 <= 0){?>
                    No templates available
                <?php
            }else{
                $tempcatid=$row['templatecategory_id'];
                $tempcatname=$row['name'];
                ?>
            
                <h3><?php echo strtoupper($tempcatname); ?></h3>
        <?php }?>
    </div>	
    <div class="row">

        <?php        
            $result1 = mysqli_query($conn,"SELECT * FROM `templates` WHERE templatecategory_id='$tempcatid'");
            while($row1 = mysqli_fetch_array($result1)){
                if(count($row1)<=0){?>
                    <div class="col text-center">
                        No template under this category
                    </div>
                    <?php
                }else{
                    $template_id=$row1['template_id'];
                    $templatename=$row1['title'];
                    $tempdownloadlink=$row1['dlink'];
                    $temptypeid=$row1['templatetype_id'];
                }
                $ret3="select * from templatetype where templatetype_id = '$temptypeid'";
                    $result3=mysqli_query($conn, $ret3);
                    while ($rows=mysqli_fetch_array($result3))
                    {
                        $temptype=$rows['name'];
                        if ($temptype=='doc'||$temptype=='docx'){
                            $temptype1='file-word-o text-primary';
                        }else if ($temptype=='ppt'){
                            $temptype1='file-powerpoint-o text-warning';
                        }else if ($temptype=='pdf'){
                            $temptype1='file-pdf-o text-danger';
                        }else if ($temptype=='xls'||$temptype=='xlsx'){
                            $temptype1='file-excel-o text-success';
                        }else{
                            $temptype1='file-text-o text-info';
                        } 
                    }
                ?>
                      <div class="card col-sm-2" style="margin:5px; padding-top:15px">
                        <a href="<?php echo $tempdownloadlink;?>">
                            <div class="template-doc">
                                <i class="fa fa-<?php echo $temptype1;?> fa-5x"></i>
                                <p class="template-details"><?php echo $templatename; ?></p>
                            </div>
                        </a>
                    </div>      
                <?php               
            } ?>
            </div>
            <?php
    } ?>



