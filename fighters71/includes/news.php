
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-3">
                <div class="panel panel-default">
                
                    <div class="panel-heading">
                        <h4 style="text-align:center;"><?php if($lang_id=='bn'){echo "নিউজ বোর্ড";}else{echo "News Board";}?></h4>
                    </div>
                    <div class="panel-body" style="overflow-y: scroll;height: 191px;">
                    <?php
                                    $i=0;
                                    $statement=$db->prepare("select * from tbl_news where lang_id=?");
                                    $statement->execute(array($lang_id));
                                    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result as $row)
                                     {
                                        $i++;

                                ?>
                        <p>
                            <?php echo $row['news_description'];?>

                        </p>
                    </div>
                    <?php 

                        if($i==1){
                            break;
                        }

                    }

                    ?>
                </div>
            </div>