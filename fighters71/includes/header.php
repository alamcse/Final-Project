
<?php
			$statement=$db->prepare("select * from tbl_banner order by banner_id desc");
			$statement->execute(array());
			$result=$statement->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result as $row) {
			
				$banner_image=$row['banner_image'];
						
			}

?>
<div class="row">
        <header>
            <img style="width: 100%; max-height: 200px;" src="img/<?php echo $banner_image;?>" alt="header">
        </header> <!-- header -->
    </div>