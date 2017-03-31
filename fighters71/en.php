   <?php 
   		include './includes/session.php';
        ob_start();
        $_SESSION['lang_name'] = 'english';
        $lang_id = 'en';
        include('index.php');
   ?>