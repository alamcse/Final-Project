    <?php 
    	include './includes/session.php';
        ob_start();
        $_SESSION['lang_name'] = 'bangla';
        $lang_id = 'bn';
        include('index.php');
   ?>
