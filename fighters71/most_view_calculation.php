
<?php
    $statement=$db->prepare("create table tbl_view_count (
    
    id int,
    table_name varchar(266), post_title_id int, view varchar(255) );");
    $statement->execute();

?>
<?php
  	$table1='tbl_fighters';
  	$table2='tbl_birsrestho';
  	$table3='tbl_sectors';

    $statement=$db->prepare("select * from $table1 where lang_id=?");
    $statement->execute(array($lang_id));
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row)
    {
    	$post_title_id=$row['fid'];
    	$fview=$row['fview'];
    	$statement1=$db->prepare("insert into tbl_view_count(table_name,post_title_id,view) value(?,?,?)");

    	$statement1->execute(array($table1,$post_title_id,$fview));

    }


    $statement=$db->prepare("select * from $table2 where lang_id=?");
    $statement->execute(array($lang_id));
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row)
    {
    	$post_title_id=$row['bid'];
    	$bview=$row['bview'];
    	$statement1=$db->prepare("insert into tbl_view_count(table_name,post_title_id,view) value(?,?,?)");

    	$statement1->execute(array($table2,$post_title_id,$bview));

    }


    $statement=$db->prepare("select * from $table3 where lang_id=?");
    $statement->execute(array($lang_id));
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row)
    {
    	$post_title_id=$row['sid'];
    	$sview=$row['sview'];
    	$statement1=$db->prepare("insert into tbl_view_count(table_name,post_title_id,view) value(?,?,?)");

    	$statement1->execute(array($table3,$post_title_id,$sview));

    }

?>

