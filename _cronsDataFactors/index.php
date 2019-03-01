<?php
header('Content-Type: text/html; charset=UTF-8');
//echo dirname(__FILE__);
require_once dirname(__FILE__).'/settings.php';

ini_set('memory_limit', '-1');

function colVal($input){
    $temp = '-';
    if($input != '' ){
        $temp = $input;
    }
    return $temp;
}

$testMode = false;
if(!empty($_REQUEST['test']))$testMode = $_REQUEST['test'];


$connection = initConnection($settingsDB['dbhost'],$settingsDB['dbuser'],$settingsDB['dbpass'],$settingsDB['dbname']);

$columnsAvailableArray = [];
if($testMode == true){
    $mitrwo_columns_sql = "SELECT COLUMN_NAME   FROM INFORMATION_SCHEMA.COLUMNS  WHERE table_name = 'zcl_mhtrooneww'  AND table_schema = 'gorilla_app'   ";
    $res = getQuery($mitrwo_columns_sql,$connection);
    foreach($res as $cntr=>$mitrwoColumns){
        array_push($columnsAvailableArray,$mitrwoColumns['COLUMN_NAME']);
    }


}

$sqlDelete =  "delete from zcl_mhtrooneww ";
insertQuery($sqlDelete,$connection);
echo "deleted<hr>";

$files = array();
foreach (glob("xml/*/*.xml") as $file) {
    $files[] = $file;
    echo "<h1>".$file."</h1><br>=====================================<hr>";
    insertFiles($file,$connection,$testMode,$columnsAvailableArray);
}


function insertFiles($fileName,$connection,$testMode,$columnsAvailableArray){

    //$xml=simplexml_load_file("xml/2016/Mitroo_2016_01.xml") or die("Error: Cannot create object");
    $xml=simplexml_load_file($fileName) or die("Error: Cannot create object");
    mysqli_query($connection,"SET NAMES utf8");
    $counter = 0;
    foreach($xml as $row){
        if($testMode == true){
            $xmlArrayColumns = array_keys((array)$row);
            foreach(array_keys((array)$row) as $in =>  $column){
                if(!in_array($column,$columnsAvailableArray) ){
                    echo $in." Column Not in database: ".$column."<br>";;
                }else{
                    //echo $in." Column in database: ".$column."<br>";;
                }
            }


            echo "<pre>";
            echo count($row)."<br>";
            print_r($row);
            echo "</pre>";
            if($counter == 0)break;
            $counter++;
        }else{

            $sqlInsert =  "insert into zcl_mhtrooneww (";

            $rowValues = (array)$row;
            $lastElement = count($rowValues);
            foreach(array_keys((array)$row) as $in => $column){

                if(!empty($row->{$column})){
                    $sqlInsert .=$column;
                    $sqlInsert .= ",";
                }

            }

            $sqlInsert .=  ") values ";

            $sqlInsert .=  "(";
            $countNotEmpty = 0;
            foreach(array_keys((array)$row) as $in => $column){

                if(!empty($row->{$column})){
                    if(!is_numeric($row->{$column})){
                        $sqlInsert .="'".$row->{$column}."'";
                    }else{
                        $sqlInsert .=$row->{$column};
                    }
                    $sqlInsert .= ",";
                    $countNotEmpty++;
                }

            }

            //            foreach($rowValues as $in => $column){
            //                //if(empty($column))$column = null;
            //                if(!is_numeric($column)){
            //                    $sqlInsert .="'".$column."'";
            //                }else{
            //                    $sqlInsert .=$column;
            //                }
            //
            //                $sqlInsert .= ",";
            //            }

            $sqlInsert .=  ")";
            $sqlInsert = str_replace(',)',')',$sqlInsert);
            echo "Count Values: ".$countNotEmpty;
            echo "<hr>";
            echo $sqlInsert." ";
            echo "<br>";
            
            insertQuery($sqlInsert,$connection);
            //if(!empty($row->pinakida))exit;



            //        echo "<br>Id Πελάτη: ";
            //        echo colVal($row->cusid);
            //        echo "<br>Πελάτης: ";
            //        echo colVal($row->cus_diakritikos);
            //        echo "<br>Δικτυο: ";
            //        echo colVal($row->diktyo);


        }
        echo "<hr>";
    }

}



closeConnection($connection);
?>