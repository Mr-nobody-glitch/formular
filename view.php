<?php
$title = 'View only one  Record';


require_once 'includes/header.php';
require_once 'includes/auth_check.php';

require 'db/conn.php';
// get client by id
if (!isset($_GET['id'])) {
    echo "<h1 class='text-danger'> Please Check Details And Try Againe</h1>";

    // $id=$_GET['id'];
    // $result=$crud->getattendeedetails($id);

}else{
    $id=$_GET['id'];
    $result=$crud->getattendeedetails($id);
   // echo "<h1 class='text-danger'> Please Check Details And Try Againe</h1>";

?>
<img src="<?php echo empty($result ['avtr_path']) ? "uploads/blank.png" :$result ['avtr_path']; ?>"class="rounded-circle" style="width:20%;height:20%" />
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?php
                                echo $result ['Firstname'];
                                echo $result ['Lastname']; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['name'];
                                                    ?></h6>
        <p class="card-text">Date Of Birth: <?php
                                            echo $result['Dateofbirth'];

                                            ?></p>
        <p class="card-text">Email Adress: <?php
                                            echo $result['Email_address'];

                                            ?></p>
        <p class="card-text">Contact Number: <?php
                                                echo $result['Contact_number'];

                                                ?></p>


    </div>
</div>
<br>
<a href="viewrecords.php" class=" btn btn-info">Back To List</a>
<a href="edit.php?id= <?php echo $result['Client_id'] ?>" class=" btn btn-warning">edit</a>
<a onclick="return confirm('Are You Sure You Want To Delete This Record');" href="delete.php?id= <?php echo $result['Client_id'] ?>" class=" btn btn-danger">Delete</a>

<?php }?>
<br>
<br>
<br>
<br>
<br>
<?php
 require_once 'includes/footer.php'; 
 ?>