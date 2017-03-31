<?php include './includes/session.php'; ?>
<?php include'./includes/change_language.php';?>   

 <?php 
   if($lang_id=='en')
   {
        $fp='Photo';
        $fn='Fighters  Name';
        $fd='District';
        $fg='Gadget No';
        $fs='Sector';
    }
    else
      {
        $fp='ছবি';
        $fn='মুক্তিযোদ্ধার নাম';
        $fd='জেলা';
        $fg='গেজেট নং';
        $fs='সেক্টর';

    };
?>

<?php


  
  $sqlQuery = $db->prepare("SELECT * FROM tbl_fighters where lang_id=?");
  $sqlQuery->execute(array($lang_id));

  $count    = $sqlQuery->rowCount();

  $adjacents = 2;
  $records_per_page = 6;
  
  $page = (int) (isset($_POST['page_id']) ? $_POST['page_id'] : 1);
  $page = ($page == 0 ? 1 : $page);
  $start = ($page-1) * $records_per_page;
  
  $next = $page + 1;    
  $prev = $page - 1;
  $last_page = ceil($count/$records_per_page);
  $second_last = $last_page - 1; 

  
  $pagination = "";
  if($last_page > 1){
        $pagination .= "<div class='pagination'>";
        if($page > 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page(1);'>&laquo; First</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; First</span>";
    
    if ($page > 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page(".($prev).");'>&laquo; Previous&nbsp;&nbsp;</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Previous&nbsp;&nbsp;</span>";   
    
        if ($last_page < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $last_page; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class='current'>$counter</span>";
                else
                    $pagination.= "<a href='javascript:void(0);' onClick='change_page(".($counter).");'>$counter</a>";     
                         
            }
        }
        elseif($last_page > 5 + ($adjacents * 2))
        {
            if($page < 1 + ($adjacents * 2))
            {
                for($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                    else
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page(".($counter).");'>$counter</a>";     
                }
                $pagination.= "...";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page(".($second_last).");'> $second_last</a>";
                $pagination.= "<a href='javascript:void(0);' onClick='change_page(".($last_page).");'>$last_page</a>";   
           
           }
           elseif($last_page - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page(2);'>2</a>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<span class='current'>$counter</span>";
                   else
                       $pagination.= "<a href='javascript:void(0);' onClick='change_page(".($counter).");'>$counter</a>";     
               }
               $pagination.= "..";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page(".($second_last).");'>$second_last</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page(".($last_page).");'>$last_page</a>";   
           }
           else
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_page(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_page(2);'>2</a>";
               $pagination.= "..";
               for($counter = $last_page - (2 + ($adjacents * 2)); $counter <= $last_page; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                   else
                        $pagination.= "<a href='javascript:void(0);' onClick='change_page(".($counter).");'>$counter</a>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page(".($next).");'>Next &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Next &raquo;</span>";
    
    if($page < $last_page)
            $pagination.= "<a href='javascript:void(0);' onClick='change_page(".($last_page).");'>Last &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Last &raquo;</span>";
        
        $pagination.= "</div>";       
    }


$records  = $db->prepare("SELECT * FROM tbl_fighters where lang_id=? LIMIT $start, $records_per_page");
$records->execute(array($lang_id));
$count    = $records->rowCount();
$HTML='';
if($count > 0)
{
  $HTML.='<table class="table table-hover"><thead>
                  <tr>
                    <th>'.$fp.'</th>
                    <th>'.$fn.'</th>
                    <th>'.$fd.'</th>
                    <th>'.$fg.'</th>
                    <th>'.$fs.'</th>
                  </tr>
                </thead>';
    foreach($records as $row) {
    
    $HTML.='<tbody><tr><td rowspan=2> <img src="img/fighters/'.$row['fphoto'].'" style="width:50px; height:52px;"></td>';
    $HTML.='<td>'.$row['fname'].'</td>';
    $HTML.='<td>'.$row['fdistrict'].'</td>';
    $HTML.='<td>'.$row['gadget_no'].'</td>';
    $HTML.='<td>'.$row['fsector'].'</td></tr>';
    $HTML.='<tr><td colspan=4 style="padding:0;"><a href="fighters_details.php?fid='.$row['fid'].'"><button type="button" class="btn btn-primary btn-lg btn-block" style="padding:0;">Details</button></a></td></tr>';

  }
      $HTML.='</tbody></table>';
}
else
{
    $HTML='No Data Found';
}
echo $HTML;
echo $pagination;
?>