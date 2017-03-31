<?php 
    $title="Gallery";
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

                
    <style type="text/css">
        .fancybox-custom .fancybox-skin {
            box-shadow: 0 0 50px #222;
        }
    </style>

    
<script type="text/javascript">
        $(document).ready(function() {
        
            /*
             *  Button helper. Disable animations, hide close button, change title type and content
             */

            $('.fancybox-buttons').fancybox({
                openEffect  : 'none',
                closeEffect : 'none',

                prevEffect : 'none',
                nextEffect : 'none',

                closeBtn  : false,

                helpers : {
                    title : {
                        type : 'inside'
                    },
                    buttons : {}
                },

                afterLoad : function() {
                    this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
                }
            });
        });
    </script>

    <h3>Photos Gallery</h3>
	<?php
			$statement=$db->prepare("select * from tbl_image");
			$statement->execute();
			$result=$statement->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result as $row)
			{
			                      	
			?>
                <a class="fancybox-buttons" data-fancybox-group="button" href="img/upload/<?php echo $row['image'];?>"><img src="img/upload/<?php echo $row['image'];?>" alt="" width="155"height="120" style="vertical-align: baseline;"/></a>
            
    <?php
            }
    ?>
               
            </div>

        <?php
            include 'includes/sociallink.php';
            include 'includes/latest_most.php';
            include 'includes/footer.php'; 
        ?>