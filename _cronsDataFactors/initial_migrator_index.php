<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<?php

//echo dirname(__FILE__);
require_once dirname(__FILE__).'/settings.php';

ini_set('memory_limit', '-1');


$connection = initConnection($settingsDB['dbhost'],$settingsDB['dbuser'],$settingsDB['dbpass'],$settingsDB['dbname']);

//var_dump($connection);

//get pkgs types
$data = getQuery('select syske from zcl_mhtrooneww group by syske',$connection);
insertQuery('ALTER TABLE ga_pkg_types AUTO_INCREMENT = 1',$connection);

foreach($data as $obj ){
    
    if($obj['syske'] == '') $obj['syske'] = '-1';
    $sql = 'INSERT INTO `ga_pkg_types`(`description`) VALUES ("'.$obj['syske'].'")';
    echo insertQuery($sql,$connection)."<br>";
     
}


$data = getQuery('SELECT syskeysia FROM `zcl_mhtrooneww` group by syskeysia',$connection);
insertQuery('ALTER TABLE ga_pkg_states AUTO_INCREMENT = 1',$connection);

foreach($data as $obj ){
    
    if($obj['syskeysia'] == '') $obj['syskeysia'] = '-1';
    $sql = 'INSERT INTO `ga_pkg_states`(`description`) VALUES ("'.$obj['syskeysia'].'")';
    echo insertQuery($sql,$connection)."<br>";
     
}


$data = getQuery('SELECT katasxesi FROM `zcl_mhtrooneww` group by katasxesi',$connection);
insertQuery('ALTER TABLE ga_conf_types AUTO_INCREMENT = 1',$connection);

foreach( $data as $obj ){
    
    if($obj['katasxesi'] == '') $obj['katasxesi'] = '-1';
    $sql = 'INSERT INTO `ga_conf_types`(`description`) VALUES ("'.$obj['katasxesi'].'")';
    echo insertQuery($sql,$connection)."<br>";
     
}


$data = getQuery('SELECT eidos_ylikon FROM `zcl_mhtrooneww` group by eidos_ylikon',$connection);
insertQuery('ALTER TABLE ga_material_types AUTO_INCREMENT = 1',$connection);

foreach( $data as $obj ){
    
    if($obj['eidos_ylikon'] == '') $obj['eidos_ylikon'] = '-1';
    $sql = 'INSERT INTO `ga_material_types`(`description`) VALUES ("'.$obj['eidos_ylikon'].'")';
    echo insertQuery($sql,$connection)."<br>";
     
}



$data = getQuery('SELECT thermokrasia FROM `zcl_mhtrooneww` group by thermokrasia',$connection);
insertQuery('ALTER TABLE ga_temp_types AUTO_INCREMENT = 1',$connection);

foreach( $data as $obj ){
    
    if($obj['thermokrasia'] == '') $obj['thermokrasia'] = '-1';
    $sql = 'INSERT INTO `ga_temp_types`(`description`) VALUES ("'.$obj['thermokrasia'].'")';
    echo insertQuery($sql,$connection)."<br>";
     
}


//twra arxizei to wraio me tous dimous

$data = getQuery('SELECT Kgeodescr,Kgeoid,Kpenid,Kpefid FROM `zcl_mhtrooneww` group by Kgeodescr',$connection);



foreach( $data as $obj ){
    
    if($obj['Kgeodescr'] == '') $obj['Kgeodescr'] = '-1';
    $sql = 'INSERT INTO `ga_dimos`(`description`,`id`,`per_id`,`per_enotita_id`) VALUES ("'.$obj['Kgeodescr'].'","'.$obj['Kgeoid'].'","'.$obj['Kpefid'].'","'.$obj['Kpenid'].'")';
    echo insertQuery($sql,$connection)."<br>";
     
}




$data = getQuery('SELECT descr FROM `zcl_mhtrooneww` group by descr ',$connection);



foreach( $data as $obj ){
    
    //if($obj['Kgeodescr'] == '') $obj['Kgeodescr'] = '-1';
    $sql = 'INSERT INTO `ga_waste_category`(`description`) VALUES ("'.$obj['descr'].'")';
    echo insertQuery($sql,$connection)."<br>";
     
}


$data = getQuery('SELECT distinct(cusid),customer,Kgeodescr,Ygeoid,Ypenid,Ypefid,Kgeoid,Kpenid,Kpefid,diktyo,occupation FROM `zcl_mhtrooneww` order by cusid',$connection);



foreach( $data as $obj ){
    
    if($obj['diktyo'] != ''){
        $obj['diktyo'] = '1';
        $sql = 'INSERT INTO `ga_customer`(`id` , `parent_diktyo` ,`name`,`is_diktyo`,`periferia`,`perif_enotita`,`dimos`,`occupation`) VALUES ("'.$obj['cusid'].'", "'.$obj['cusid'].'" , "'.$obj['customer'].'","'.$obj['diktyo'].'",'.$obj['Ypefid'].','.$obj['Ypenid'].','.$obj['Ygeoid'].',"'.$obj['occupation'].'")';
    }else{
            
        $sql = 'INSERT INTO `ga_customer`(`id` , `parent_diktyo` ,`name`,`is_diktyo`,`periferia`,`perif_enotita`,`dimos`,`occupation`) VALUES ("'.$obj['cusid'].'", 0 , "'.$obj['customer'].'","'.$obj['diktyo'].'",'.$obj['Kpefid'].','.$obj['Kpenid'].','.$obj['Kgeoid'].',"'.$obj['occupation'].'")';
        
    }
    

    echo insertQuery($sql,$connection)."<br>";
     
}



$data = getQuery('SELECT * FROM `zcl_mhtrooneww` limit 0,20',$connection);

foreach( $data as $obj ){
    
        if($obj['Ypefid'] == 0)$obj['Ypefid'] = $obj['Kpefid'];
        if($obj['Ypenid'] == 0)$obj['Ypenid'] = $obj['Kpenid'];
        if($obj['Ygeoid'] == 0)$obj['Ygeoid'] = $obj['Kgeoid'];
        
    
        
    
        $obj['diktyo'] = '1';
        $sql = 'INSERT INTO `ga_fortio` ';
        $sql .='(`cust_id` ,`qty`,`qty2`,`date1`,`date2`,`date3`,`emporiko`,`emporiko2`,`perifereia`,`perif_enotita`,`tradecode`,`tradecode2`,`waste_category`,`material_type`,`pkg_type`,`conf_type`,`temp_type`,`diktyo`,`pkg_state`) VALUES ';
    
        $sql .= '(';
        $sql .= $obj['cusid'].',';
        $sql .= $obj['qty'].',';    
        $sql .= $obj['qty2'].',';        
        $sql .= "'".$obj['ftrdate']."',";
        $sql .= "'".$obj['ftrdate2']."',";
        $sql .= "'".$obj['ftrdate3']."',";
        $sql .= "'".$obj['zcl_emporiko']."',";
        $sql .= "'".$obj['emporiko2']."',";
        $sql .= $obj['Ypefid'].',';
        $sql .= $obj['Ypenid'].',';
        $sql .= $obj['Ygeoid'].',';   
        $sql .= "'".$obj['tradecode']."',";
        $sql .= "'".$obj['tradecode2']."',";
        $sql .= '(select id from ga_waste_category where description = "'.$obj['descr'].'" limit 0,1 ),';
        $sql .= '(select id from ga_material_types where description = "'.$obj['eidos_ylikon'].'" limit 0,1 ),';    
        $sql .= '(select id from ga_pkg_types where description = "'.$obj['syske'].'" limit 0,1 ),';    
        $sql .= '(select id from ga_conf_types where description = "'.$obj['katasxesi'].'" limit 0,1 ),';        
        $sql .= '(select id from ga_temp_types where description = "'.$obj['thermokrasia'].'" limit 0,1 ),';            
        $sql .= '(select id from ga_pkg_states where description = "'.$obj['syskeysia'].'" limit 0,1 )';            
    
    
        $sql .= ')';
    
    

    echo insertQuery($sql,$connection)."<br>";
    //echo $sql."<br>";
    //exit;
     
}





closeConnection($connection);

?>