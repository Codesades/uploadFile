<?php
    session_start();

    //print_r($_POST);
    //print_r($_FILES);

    //die();

    if(empty($_POST['fileName'])){
        $_SESSION['error'] = 'Please provide a valid file name.';
        header('Location:exercise1.php');
        die();
    }
    else if(empty($_POST['myFile'])){
        $_SESSION['error'] = 'Please choose a file';
        header('Location:exercise1.php');
        die();
    }
    $savedName = $_POST['fileName'];
    $file = $_FILES['myFile'];

    $name = $file['name'];
    $type = $file['type'];
    $temp_name = $file['tmp_name'];
    $error = $file['error'];
    $size = $file['size'];      //bytes 

    $ext = pathinfo($name, PATHINFO_EXTENSION);

    $supported_files = array('txt','doc','docx','xls','xlsx','jpg','png','mp3','mp4','pdf','rar','zip');
    if(!in_array($ext,$supported_files)){
        $_SESSION['error'] = 'This type of file is not supported.';
        header('Location:exercise1.php');
        die();
    }
    //echo $ext;
?>