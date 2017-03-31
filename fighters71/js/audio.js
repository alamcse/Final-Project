// JavaScript Document

$(document).ready(function(){
	
	/* Data Insert Starts Here */
	$(document).on('submit', '#emp-SaveAudio', function() {
	  
	   $.post("audio_create.php", $(this).serialize())
        .done(function(data){
			$("#disp").fadeOut();
			$("#disp").fadeIn('slow', function(){
				 $("#disp").html('<div class="alert alert-info">'+data+'</div>');
			     $("#emp-SaveAudio")[0].reset();
		     });	
		 });   
	     return false;
    });
	/* Data Insert Ends Here */
	
	
	/* Data Delete Starts Here */
	$(".delete-linkAudio").click(function()
	{
		var id = $(this).attr("id");
		var del_id = id;
		var parent = $(this).parent("td").parent("tr");
		if(confirm('Are you sure to Delete ID no = ' +del_id+'?'))
		{
			$.post('audio_delete.php', {'del_id':del_id}, function(data)
			{
				parent.fadeOut('slow');
			});	
		}
		return false;
	});
	/* Data Delete Ends Here */
	
	/* Get Edit ID  */
	$(".edit-linkAudio").click(function()
	{
		var id = $(this).attr("id");
		var edit_id = id;
		if(confirm('Are you sure to Edit ID no = ' +edit_id+'?'))
		{
			$(".content-loaderAudio").fadeOut('slow', function()
			 {
				$(".content-loaderAudio").fadeIn('slow');
				$(".content-loaderAudio").load('audio_edit.php?edit_id='+edit_id);
				$("#btn-addAudio").hide();
				$("#btn-viewAudio").show();
			});
		}
		return false;
	});
	/* Get Edit ID  */
	
	/* Update Record  */
	$(document).on('submit', '#emp-UpdateAudio', function() {
	 
	   $.post("audio_update.php", $(this).serialize())
        .done(function(data){
			$("#disp").fadeOut();
			$("#disp").fadeIn('slow', function(){
			     $("#disp").html('<div class="alert alert-info">'+data+'</div>');
			     $("#emp-UpdateAudio")[0].reset();
				 $("body").fadeOut('slow', function()
				 {
					$("body").fadeOut('slow');
					window.location.href="audio.php";
				 });				 
		     });	
		});   
	    return false;
    });
	/* Update Record  */
});
