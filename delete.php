<?php 
require_once 'includes/auth_check.php';
require 'db/conn.php';


if (!$_GET['id']) {

    # code...
    //echo 'ERROR';
    include 'includes/errormssg.php';
    header("location:viewrecords.php");


}
else{
    //get ID values
    $id=$_GET['id'];
        //call delete function

    $result =$crud-> delete($id);
    //redirect to list

    if ($result) {
        header("location:viewrecords.php");
    }
    
    else{
     //   echo 'error';
     include 'includes/errormssg.php';

    }
}



?>