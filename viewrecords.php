<?php
$title = 'View Records';

require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require 'db/conn.php';

$results = $crud->getattendees();

?>

<table class="table table-dark table-striped">
    <tr>

        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <!-- <th>Date Of Birth</th>
        <th>Email Address</th>
        <th>Contact Number</th> -->
        <th>EXP</th>
        <th>Action</th>
    </tr>

    <?php
    while ($r = $results->fetch(PDO::FETCH_ASSOC)) {


    ?>
        <tr>
            <td> <?php echo $r['Client_id'] ?> </td>
            <td> <?php echo $r['Firstname'] ?> </td>
            <td> <?php echo $r['Lastname'] ?> </td>


            <!-- <td> <echo $r['Dateofbirth'] ?> </td>
            <td> < echo $r['Email_address'] ?> </td>
            <td> < echo $r['Contact_number'] ?> </td> -->


            <td> <?php echo $r['name'] ?> </td>

            <td>
            <a href="view.php?id= <?php echo $r['Client_id'] ?>" class=" btn btn-primary">View</a>
            <a href="edit.php?id= <?php echo $r['Client_id'] ?>" class=" btn btn-warning">edit</a>
            <a onclick="return confirm('Are You Sure You Want To Delete This Record');" href="delete.php?id= <?php echo $r['Client_id'] ?>" class=" btn btn-danger">Delete</a>

            </td>

        </tr>
    <?php
    }

    ?>
</table>




<br>
<br>
<br>
<br>
<br>
<?php
require_once 'includes/footer.php';
?>