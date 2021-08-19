<?php
$title = 'Index';

require_once 'includes/header.php';
require 'db/conn.php';
$results = $crud->getspec();


?>
<!-- 
        - First name
        - Last Name
        - Date of Birth (Use DatePicker)
        - Specialty (Database Admin, SOftware Developer, Web Administrator, Other)
        - Email Address
        - Contact Number
     -->
<h1 class="text-center">Registration for IT Conference </h1>

<form method="post" action="success.php" enctype="multipart/form-data">
</div>
  <div class="mb-3">
    <label for="name" class="form-label">First Name</label>
    <input type="text" required class="form-control" id="name" name="name">
  </div>

  <div class="mb-3">
    <label for="lastname" class="form-label">Last Name</label>
    <input type="text" required class="form-control" id="lastname" name="lastname">
  </div>

  <div class="mb-3">
    <label for="date" class="form-label"> Date Of Birth</label>
    <input type="date" class="form-control" id="date" name="date">
  </div>

  <div class="form-group">
    <label for="exp" class="form-label">Experince</label>
    <select class="form-select" id="exp" name="exp">
      
      <?php while($r = $results->fetch(PDO::FETCH_ASSOC))  { ?>
        <option value="<?php echo$r['Specialty_id'] ?>"> <?php echo$r['name'] ?></option>

        <?php   }   ?>
  <!-- <option value="1">Database Admin</option>
  <option value="3"> SOftware Developer</option>
  <option value="4">Web Administrator</option> -->
</select>

</div>

  <div class="mb-3">
    <label for="mail" class="form-label">Email address</label>
    <input type="email" required class="form-control" id="mail" name="mail" aria-describedby="emailHelp">
  
    <div class="mb-3">
    <label for="phone" class="form-label">Contact Number</label>
    <input type="text" class="form-control" id="phone" name="phone">
  </div>
  <div class="custom-file">
    
    <input type="file" accept="image/*" class="custom-file-input" id="avtr" name="avtr">
    <label class="custom-file-label" for="avtr">Choose File </label>

  </div>
 
  
  <button type="submit" id="done"  name="done" class="btn btn-primary">Submit</button>
</form>


<br>
<br>
<br>
<br>
<br>
<?php
 require_once 'includes/footer.php'; 
 ?>