<?php 
    $title="Video";
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
                $statement=$db->prepare("select * from tbl_video_link");
                $statement->execute();
                $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row)
                    {
                        $i++;
            ?>
                <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <?php 
                                        $ytarray=explode("/", $row['video_link']);
                                        $ytendstring=end($ytarray);
                                        $ytendarray=explode("?v=", $ytendstring);
                                        $ytendstring=end($ytendarray);
                                        $ytendarray=explode("&", $ytendstring);
                                        $ytcode=$ytendarray[0];
                                        echo "<iframe width=\"760\" height=\"570\" src=\"http://www.youtube.com/embed/$ytcode\" frameborder=\"0\" allowfullscreen></iframe>";
                                    ?>
                                    
                                </div>

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