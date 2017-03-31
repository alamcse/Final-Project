<!DOCTYPE html>
<html lang="BN">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta property="og:url" content="http://www.fighters71.com/" />
    <title><?php echo $title; ?></title>
    <link rel="icon"type="images/png" href="../img/icon.png"/>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/customize.css">

    <!-- Bootstrap Dropdown Hover CSS -->
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/bootstrap-dropdownhover.min.css">
    <link rel="stylesheet" href="fonts/fontawesome-webfont.eto">

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-dropdownhover.js"></script>


    <!-- Fancybox jQuery -->
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="lib/jquery.mousewheel-3.0.6.pack.js"></script>
    <script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" />
    <link rel="stylesheet" type="text/css" href="source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
    <script type="text/javascript" src="source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>  
    <!--Fancybox jQuery -->
    
    	<!-- Share This START-->
    	<!--<script type="text/javascript">var switchTo5x=true;</script>
	<script type="text/javascript" id="st_insights_js" src="http://w.sharethis.com/button/buttons.js?publisher=bea1c4bc-604f-43a7-9b13-2878a277e313"></script>
	<script type="text/javascript">stLight.options({publisher: "bea1c4bc-604f-43a7-9b13-2878a277e313", doNotHash: true, doNotCopy: false, hashAddressBar: false});</script>-->
	<!-- Share This END-->

<!-- Pagination jQuery -->
<script type="text/javascript">
$(document).ready(function(){
    change_page('0');
});
function change_page(page_id){
     $(".flash").show();
     $(".flash").fadeIn(400).html('Loading <img src="img/ajax-loader.gif" />');
     var dataString = 'page_id='+ page_id;
     $.ajax({
           type: "POST",
           url: "load_data.php",
           data: dataString,
           cache: false,
           success: function(result){
           $(".flash").hide();
                 $("#page_data").html(result);
           }
      });
}
</script>
	
</head>
