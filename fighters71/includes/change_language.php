
<?php
    ob_start();
    if ($_SESSION['lang_name']=='english') {
        $lang_id = 'en';
    }
    else{
       
        
        $_SESSION['lang_name'] = 'bangla';
        $lang_id = 'bn';
    }
    include('config.php');
 ?>