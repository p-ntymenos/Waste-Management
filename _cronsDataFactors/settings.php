<?php

$settingsDB = array();

$settingsDB = array(
    'dbhost'      => 'localhost',
    'dbname'    => 'gorilla_app',
    'dbuser'    => 'root',
    'dbpass'    => '',    

);



function initConnection($servername,$username,$password,$dbname){

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    return $conn ;

}

function getQuery($sql,$conn){

    mysqli_set_charset($conn ,'utf8');
    
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        //return mysqli_fetch_assoc($result);
        //$result->fetch_assoc();
        $data = array();
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                array_push($data,$row);
            }
        } else {
            $data =  "0 results";
        }


    } else {
        $data =  "0 results";
    }
    
    return $data;

}

function insertQuery($sql,$conn){

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

function closeConnection($conn){
    $conn->close();
}



?>