<?php include_once('session-active.php'); ?>
<?php include("../../service/admin_service.php");?>
<title>index</title>

<?php
  $namefield = $_POST['namefield'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $contact = $_POST['contact'];

  $gender = $_POST['gender'];
  $bloodgroup = $_POST['bloodgroup'];
  $organ = $_POST['organ'];

  //??question
  //organ id 

  add_donar($namefield, $gender, $email, $bloodgroup, $address, $contact, $organ);

    echo "Successfully Added";

 /* if(!){
    echo '<spam style="color:red">Error: failed to add person. please try again !!</spam>';
  }
  else{
    echo "person added successfully";
  }*/
?>