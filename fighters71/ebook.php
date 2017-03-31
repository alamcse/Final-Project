<?php 
    $title="E-book";
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

			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-6">

            <div class="page-header" style="margin-top: -15px;">
                <h2> <?php if($lang_id=='bn'){echo "অনলাইন বই সমূহ ";}else{echo "E-book of War";}?></h2>
            </div>
 
                <?php
                                    $i=0;
                                    $statement=$db->prepare("select * from tbl_book");
                                    $statement->execute();
                                    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result as $row)
                                     {
                    //                     $i++;
                    // $sql="SELECT * FROM tbl_deed";
                    // $result_set=mysql_query($sql) or die(mysql_error());
                    // $i=0;
                    // while($row=mysql_fetch_array($result_set))
                    // {
                ?>
                <div class="media">
                    <div class="pull-left"><img src="img/pdf.png" width="48" height="48"></div>
                    <div class="media-body"><strong><?php echo $row['book_name']; ?> <span class="label label-default"> <?php echo $row['book_size']; ?> MB</span></strong>
                        <div><strong><a href="uploads/book/<?php echo $row['book_name']; ?>" target="_blank"><?php if($lang_id=='bn'){echo "দেখ/ডাউনলোড";}else{echo "View / Download";}?></a></strong></div>
                    </div>
                </div>
                    <br>
                <?php 
                    $i++; 
                    } 
                ?>
			</div>

		<?php
            include 'includes/sociallink.php';
            include 'includes/latest_most.php';
            include 'includes/footer.php'; 
        ?>