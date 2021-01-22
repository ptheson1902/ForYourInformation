<?php
    include_once('config.php');
    include_once('conn.php');
    if(isset($_POST['submit'])){
        $full_name = $_REQUEST['full_name'];
        $katakana = $_REQUEST['katakana'];
        $sex = $_REQUEST['sex'];
        $tel = $_REQUEST['tel'];
        $email = $_REQUEST['email'];
        $birthday = $_REQUEST['birthday'];
        $selected_id = $_REQUEST['selected_id'];
        $selected_tablename = $_REQUEST['selected_tablename'];
        $sql = "INSERT INTO groupf_save_data (full_name, katakana, sex, tel, email, birthday, selected_id, selected_tablename) 
        VALUES ('$full_name', '$katakana', '$sex', '$tel', '$email', '$birthday', '$selected_id', '$selected_tablename')";
        $run = mysqli_query($conn, $sql);
        if($run){
            echo '<script> alert("'.$lang['mess'].'");window.location.assign("index.php");</script>';
            //header('Location: index.php');
        }else{ echo '<script> '.$lang['error'].' </script>';}
    }
?>