
<style type="text/css">
#disp{
	display:none;
}
</style>


	
    
    <div id="disp">
    <!-- here message will be displayed -->
	</div>
        
 	
	 <form method='post' id='emp-SaveAudio' action="#">
 
    <table class='table table-bordered'>
 
        <tr>
            <td>Audio Title</td>
            <td><input type='text' name='audio_title' class='form-control' placeholder='Enter audio title' required /></td>
        </tr>
 
        <tr>
            <td>Audio Code</td>
            <td><input type='text' name='audio_code' class='form-control' placeholder='Enter soundcloud audio code' required></td>
        </tr>
 
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-saveAudio" id="btn-saveAudio">
        		    <span class="glyphicon glyphicon-plus"></span> Save this Record
    			</button>  
            </td>
        </tr>
 
    </table>
</form>