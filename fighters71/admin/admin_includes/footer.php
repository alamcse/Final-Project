 <div class="col-xs-12 copyright"style="text-align:center; background:black;height:50px">
	 <h5 style="margin-top:20px;color:#fff;">
	 	<?php
							
			$statement=$db->prepare("select * from tbl_footer where footer_id=1");
			$statement->execute();
			$result=$statement->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result as $row)
			{
				echo $row['footer_text'];				
			}
		?>
	 </h5>
 </div>
 
 		<script type="text/javascript" src="../assets/datatables.min.js"></script>
 		<script type="text/javascript" src="../js/audio.js"></script>
		<script type="text/javascript" src="../js/video.js"></script>

		<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$('#example').DataTable();

			$('#example')
			.removeClass( 'display' )
			.addClass('table table-bordered');
		});
		</script>

</div>

</body>
</html>
