<?php
$title = 'Edit record';

require_once 'includes/header.php';
require_once 'includes/auth_check.php';

require 'db/conn.php';
$results = $crud->getspec();
if(!isset($_GET['id']))
{
    //echo 'EROOR';
    include 'includes/errormssg.php';
    header("location:viewrecords.php");
}
else{
    $id = $_GET['id'];
    $attendee =$crud->getattendeedetails($id);



?>


<h1 class="text-center"> Edit Record </h1>

<form method="post" action="editpost.php" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $attendee['Client_id']?>">
</div>
  <div class="mb-3">
    <label for="name" class="form-label"  >First Name</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo $attendee['Firstname']?>">
  </div>

  <div class="mb-3">
    <label for="lastname" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $attendee['Lastname']?>" >
  </div>

  <div class="mb-3">
    <label for="date" class="form-label"> Date Of Birth</label>
    <input type="date" class="form-control" id="date" name="date"value="<?php echo $attendee['Dateofbirth']?>">
  </div>

  <div class="mb-3">
    <label for="exp" class="form-label">Experince</label>
    <select class="form-select" id="exp" name="exp" value="<?php echo $attendee['name']?>">
      
      <?php while($r = $results->fetch(PDO::FETCH_ASSOC))  { ?>
        <option  value="<?php echo $r['Specialty_id'] ?>" <?php  if ($r['Specialty_id']==$attendee['Specialty_id']) echo 'selected' ?>>
        <?php echo$r['name'] ?>
    </option>

        <?php   }   ?>
  <!-- <option value="1">Database Admin</option>
  <option value="3"> SOftware Developer</option>
  <option value="4">Web Administrator</option> -->
</select>

</div>

  <div class="mb-3">
    <label for="mail" class="form-label">Email address</label>
    <input type="email" class="form-control" id="mail" name="mail"  value="<?php echo $attendee['Email_address']?>"aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

    <div class="mb-3">
    <label for="phone" class="form-label">Contact Number</label>
    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $attendee['Contact_number']?>">
  </div>
 
  
  <button type="submit" id="done"  name="done" class="btn btn-success">Save Changes</button>
</form>
<?php } ?>

<br>
<br>
<br>
<br>
<br>
<?php
 require_once 'includes/footer.php'; 
 ?>