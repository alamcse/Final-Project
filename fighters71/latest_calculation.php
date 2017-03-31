<?php
    $statement=$db->prepare("create table tbl_latest_count (
    
    id int,
    table_name varchar(266), post_title_id int, time varchar(255) );");
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
    	$ftime=$row['ftime'];
    	$statement1=$db->prepare("insert into tbl_latest_count(table_name,post_title_id,time) value(?,?,?)");

    	$statement1->execute(array($table1,$post_title_id,$ftime));

    }


    $statement=$db->prepare("select * from $table2 where lang_id=?");
    $statement->execute(array($lang_id));
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row)
    {
    	$post_title_id=$row['bid'];
    	$btime=$row['btime'];
    	$statement1=$db->prepare("insert into tbl_latest_count(table_name,post_title_id,time) value(?,?,?)");

    	$statement1->execute(array($table2,$post_title_id,$btime));

    }


    $statement=$db->prepare("select * from $table3 where lang_id=?");
    $statement->execute(array($lang_id));
    $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row)
    {
    	$post_title_id=$row['sid'];
    	$stime=$row['stime'];
    	$statement1=$db->prepare("insert into tbl_latest_count(table_name,post_title_id,time) value(?,?,?)");

    	$statement1->execute(array($table3,$post_title_id,$stime));

    }

?>

