<?php
    header("Access-Control-Allow-Origin:*");


    //ヘッダーにコンテンツの種類を設定する
    header("Content-Type:application/json");
    
    $servername = "localhost";
        $username = "ptheson";
        $password = "eccMyAdmin";
        $db = "ptheson";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);
    
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    mysqli_set_charset($conn, 'uft8');
    
    $sql = " SELECT * FROM groupf_work ";
    
    $result = mysqli_query( $conn , $sql );
    
    $work = mysqli_fetch_all($result,MYSQLI_ASSOC);
    // $row = mysqli_fetch_assoc($result);
    print_r($work);
    //mysqli_close($conn);
?>