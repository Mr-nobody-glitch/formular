<?php
require 'db/conn.php';


if (isset($_POST['done'])) {
    # code...
    $id=$_POST['id'];
    $name = $_POST['name'];
    $lastname =  $_POST['lastname'];
    $date = $_POST['date'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];
    $exp =$_POST['exp'];
    $result=$crud->edit($id, $name, $lastname, $date, $mail, $phone, $exp);
    if ($result) {
        # code...
        header("location:viewrecords.php");
    }
    else{
       // echo "ERROR";
       include 'includes/errormssg.php';

    
    }
}
else{
    //echo "ERROR";
    include 'includes/errormssg.php';

}

?>