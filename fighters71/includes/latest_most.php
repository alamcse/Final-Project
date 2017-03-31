<div class="panel">
                    <div class="panel-body">

                <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active">
                                <a data-toggle="tab" href="#latest" role="tab">Latest</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#MostViewed" role="tab">Most Viewed</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content" style="height:400px;overflow-y:scroll;">
                            <div class="tab-pane fade in active" id="latest" role="tabpanel">
                                <?php 
                                        include'latest_calculation.php';
                                    
                                        $i=0;
                                        $statement=$db->prepare("select * from tbl_latest_count order by time desc");
                                        $statement->execute();
                                        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($result as $row)
                                        {
                                            $i++;
                                            
                                            ?>
                                            <li style="list-style:none;margin-bottom: 10px;"><span class="glyphicon glyphicon-hand-right" aria-hidden="true" style="margin-right:15px;"></span>
                                                <?php
                                                        $table=$row['table_name'];

                                                        if($table=='tbl_fighters')
                                                        {

                                                            $post_title_id=$row['post_title_id'];
                                                            $statement1=$db->prepare("select * from $table where fid=?");
                                                            $statement1->execute(array($post_title_id));
                                                            $result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
                                                            foreach ($result1 as $row1)
                                                            {
                                                                $post_title=$row1['fname'];
                                                            }

                                                            ?>
                                                            <a href="fighters_details.php?fid=<?php echo $post_title_id; ?>"> <?php if($lang_id=='en'){echo'Freedom Fighter '.$post_title.'\'s Speech';}else{echo'মুক্তিযোদ্ধা '.$post_title.' এর কথা';};?></a>
                                                            <?php
                                                        }

                                                        else if($table=='tbl_birsrestho')
                                                        {
                                                            $post_title_id=$row['post_title_id'];
                                                            $statement1=$db->prepare("select * from $table where bid=?");
                                                            $statement1->execute(array($post_title_id));
                                                            $result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
                                                            foreach ($result1 as $row1)
                                                            {
                                                                $post_title=$row1['bname'];
                                                            }

                                                            ?>
                                                                <a href="birsrestho.php?id=<?php echo $row['post_title_id']; ?>"><?php if($lang_id=='en'){echo'Details of Birsrestho '.$post_title;}else{echo'বীরশ্রেষ্ঠ'.$post_title.' এর বিস্তারিত';};?></a>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            $post_title_id=$row['post_title_id'];
                                                            $statement1=$db->prepare("select * from $table where sid=?");
                                                            $statement1->execute(array($post_title_id));
                                                            $result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
                                                            foreach ($result1 as $row1)
                                                            {
                                                                $post_title=$row1['sector_name'];
                                                            }

                                                            ?>
                                                                <a href="sector.php?id=<?php echo $row['post_title_id']; ?>"><?php if($lang_id=='en'){echo'Description of The '.$post_title;}else{echo $post_title.' এর বিস্তারিত';};?></a>
                                                            <?php
                                                        }

                                                    ?>
                                                
                                            </li>

                                        <?php

                                            if($i==10){
                                                break;
                                            }
                                        }

                                        $statement=$db->prepare("drop table tbl_latest_count");
                                        $statement->execute();


                                    ?>
                            </div>
                            <div class="tab-pane fade" id="MostViewed" role="tabpanel">
                                <?php 
                                        include'most_view_calculation.php';
                                    
                                        $i=0;
                                        $statement=$db->prepare("select * from tbl_view_count order by view desc");
                                        $statement->execute();
                                        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($result as $row)
                                        {
                                            $i++;
                                            
                                            ?>
                                            <li style="list-style:none;margin-bottom: 10px;"><span class="glyphicon glyphicon-hand-right" aria-hidden="true" style="margin-right:15px;"></span>
                                                <?php
                                                        $table=$row['table_name'];

                                                        if($table=='tbl_fighters')
                                                        {

                                                            $post_title_id=$row['post_title_id'];
                                                            $statement1=$db->prepare("select * from $table where fid=?");
                                                            $statement1->execute(array($post_title_id));
                                                            $result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
                                                            foreach ($result1 as $row1)
                                                            {
                                                                $post_title=$row1['fname'];
                                                            }

                                                            ?>
                                                             <a href="fighters_details.php?fid=<?php echo $post_title_id; ?>"> <?php if($lang_id=='en'){echo'Details of The Fighter '.$post_title;}else{echo'মুক্তিযোদ্ধা '.$post_title.' এর কথা';};?></a>
                                                            <?php
                                                        }

                                                        else if($table=='tbl_birsrestho')
                                                        {
                                                            $post_title_id=$row['post_title_id'];
                                                            $statement1=$db->prepare("select * from $table where bid=?");
                                                            $statement1->execute(array($post_title_id));
                                                            $result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
                                                            foreach ($result1 as $row1)
                                                            {
                                                                $post_title=$row1['bname'];
                                                            }

                                                            ?>
                                                                <a href="birsrestho.php?id=<?php echo $row['post_title_id']; ?>"><?php if($lang_id=='en'){echo'Details of Birsrestho '.$post_title;}else{echo'বীরশ্রেষ্ঠ '.$post_title.' এর বিস্তারিত';};?></a>
                                                            <?php
                                                        }
                                                        else if($table=='tbl_sectors')
                                                        {
                                                            $post_title_id=$row['post_title_id'];
                                                            $statement1=$db->prepare("select * from $table where sid=?");
                                                            $statement1->execute(array($post_title_id));
                                                            $result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
                                                            foreach ($result1 as $row1)
                                                            {
                                                                $post_title=$row1['sector_name'];
                                                            }

                                                            ?>
                                                                <a href="sector.php?id=<?php echo $row['post_title_id']; ?>"><?php if($lang_id=='en'){echo'Description of The '.$post_title;}else{echo $post_title.' এর বিস্তারিত';};?></a>
                                                            <?php
                                                        }

                                                    ?>
                                                
                                            </li>

                                        <?php

                                            if($i==10){
                                                break;
                                            }
                                        }

                                        $statement=$db->prepare("drop table tbl_view_count");
                                        $statement->execute();


                                    ?>

                            </div>
                        </div>   
                    </div>

                </div>
            </div>
        </div>