<?php 
    $title="Audio";
    include 'includes/head.php';
    include './includes/session.php'; 
?>

<body>
    
    <div class="container-fluid" style="background-color: #BAE6DC;">

        <?php 
            include 'includes/menu.php'; 
            include 'includes/header.php';
        ?> 
        <div class="row">
            <?php  include 'includes/left_menu.php'; ?>

                <div class="col-sm-12 col-md-4 col-lg-6">
                    <?php
                        $i=0;
                        $statement=$db->prepare("select * from tbl_audio_link");
                        $statement->execute();
                        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $row)
                            {
                                $i++;
                    ?>
                <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo $row['audio_code'];?>&amp;color=05ba14&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>

                            </div>
                        </div>
                    </div>
                        <?php 
                            }
                        ?>
            </div>
            
        <?php
            include 'includes/sociallink.php';
            include 'includes/latest_most.php';
            include 'includes/footer.php'; 
        ?>