<?php include './includes/session.php'; ?>
<?php include'./includes/change_language.php';?>  

 <?php if($lang_id=='en'){$p='Photo';$n='Fighters  Name';}else{$p='ছবি';$n='মুক্তিযোদ্ধাদের নাম';};?>

<?php
 
  $sqlQuery = $db->prepare("SELECT * FROM tbl_fighters where lang_id=?");
  $sqlQuery->execute(array($lang_id));

  $count    = $sqlQuery->rowCount();

  $adjacents = 2;
  $records_per_page = 6;
  
  $page = (int) (isset($_POST['sector_page_id']) ? $_POST['sector_page_id'] : 1);
  $page = ($page == 0 ? 1 : $page);
  $start = ($page-1) * $records_per_page;
  
  $next = $page + 1;    
  $prev = $page - 1;
  $last_page = ceil($count/$records_per_page);
  $second_last = $last_page - 1; 

  
  $pagination = "";
  if($last_page > 1){
        $pagination .= "<div class='pagination'>";
    
    if ($page > 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_sector_page(".($prev).");'>&laquo; Previous&nbsp;&nbsp;</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Previous&nbsp;&nbsp;</span>";   
    
        if ($last_page < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $last_page; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class='current'>$counter</span>";
                else
                    $pagination.= "<a href='javascript:void(0);' onClick='change_sector_page(".($counter).");'>$counter</a>";     
                         
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
                        $pagination.= "<a href='javascript:void(0);' onClick='change_sector_page(".($counter).");'>$counter</a>";     
                }
                $pagination.= "...";
                $pagination.= "<a href='javascript:void(0);' onClick='change_sector_page(".($second_last).");'> $second_last</a>";
                $pagination.= "<a href='javascript:void(0);' onClick='change_sector_page(".($last_page).");'>$last_page</a>";   
           
           }
           elseif($last_page - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_sector_page();'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_sector_page(2);'>2</a>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<span class='current'>$counter</span>";
                   else
                       $pagination.= "<a href='javascript:void(0);' onClick='change_sector_page(".($counter).");'>$counter</a>";     
               }
               $pagination.= "..";
               $pagination.= "<a href='javascript:void(0);' onClick='change_sector_page(".($second_last).");'>$second_last</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_sector_page(".($last_page).");'>$last_page</a>";   
           }
           else
           {
               $pagination.= "<a href='javascript:void(0);' onClick='change_sector_page(1);'>1</a>";
               $pagination.= "<a href='javascript:void(0);' onClick='change_sector_page(2);'>2</a>";
               $pagination.= "..";
               for($counter= $last_page - (2 + ($adjacents * 2)); $counter <= $last_page; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                   else
                        $pagination.= "<a href='javascript:void(0);' onClick='change_sector_page(".($counter).");'>$counter</a>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<a href='javascript:void(0);' onClick='change_sector_page(".($next).");'>Next &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Next &raquo;</span>";
    
        
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
                    <th>'.$p.'</th>
                    <th>'.$n.'</th>
                  </tr>
                </thead>';
    foreach($records as $row) {
    
    $HTML.='<tbody><tr><td rowspan=2> <img src="img/fighters/'.$row['fphoto'].'" style="width:50px; height:52px;"></td>';
    $HTML.='<td>'.$row['fname'].'</td>';
    $HTML.='<td ><a href="fighters_details.php?fid='.$row['fid'].'"><button type="button" class="btn btn-primary btn-xs btn-block" style="padding:0;">Details</button></a></td></tr>';

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