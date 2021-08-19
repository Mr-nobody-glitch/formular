<?php
$title = 'success';

require_once 'includes/header.php';
require_once 'db/conn.php';

if (isset($_POST['done'])) {
    # code...
    $name = $_POST['name'];
    $lastname =  $_POST['lastname'];
    $date = $_POST['date'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];
    $exp = $_POST['exp'];



    $orig_file = $_FILES["avtr"]["tmp_name"];
    $ext=pathinfo( $_FILES["avtr"]["name"],PATHINFO_EXTENSION);

    $target_dir = 'uploads/';
    $destination ="$target_dir$phone.$ext";
    move_uploaded_file($orig_file, $destination);

   // exit();


    $issuccess = $crud->insert($name, $lastname, $date, $mail, $phone, $exp, $destination);
    if ($issuccess) {
        # code...
        // echo '<h1 class="text-center  text-success"> You Have been Registered </h1>';
        include 'includes/successmssg.php';
    } else {
        //  echo '<h1 class="text-center  text-danger">There Was  Ab Error In Processing</h1>';
        include 'includes/errormssg.php';
    }
}


?>
<!-- //<h1 class="text-center  text-success"> You Have been Registered </h1> -->
<img src="<?php echo$destination?>"class="rounded-circle" style="width:20%;height:20%" />
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?php
                                echo $_POST['name'];
                                echo $_POST['lastname']; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['exp'];
                                                    ?></h6>
        <p class="card-text">Date Of Birth: <?php
                                            echo $_POST['date'];

                                            ?></p>
        <p class="card-text">Email Adress: <?php
                                            echo $_POST['mail'];

                                            ?></p>
        <p class="card-text">Contact Number: <?php
                                                echo $_POST['phone'];

                                                ?></p>


    </div>
</div>

<?php
// echo $_GET['name'];
// echo $_GET['lastname'];
// echo $_GET['date'];
// echo $_GET['exp'];
// echo $_GET['mail'];
// echo $_GET['phone'];
// echo $_GET['done'];




?>

<br>
<br>
<br>
<br>
<br>
<?php
require_once 'includes/footer.php';
?>