<?php include("../../service/patient_service.php");?>

<?php
 
  $name=$username=$password=$re_password=$email=$address=$contact="";
  $nameErr=$usernameErr=$passwordErr=$re_passwordErr=$emailErr=$addressErr=$contactErr="";

  $successmess="";


  if($_SERVER['REQUEST_METHOD']=="POST"){

    $gender=$_POST['gender'];
    $blood_group=$_POST['bloodgroup'];
    global $password;
    $password=$_POST['password'];
    
    $name_valid=nameValidation();
    $user_name_valid=usernameValidation();
    $password_valid=passwordValidation();
    $re_password_valid=re_passValidation();
    $email_valid=emailValidation();
    $contact_valid=contactValidation();
    $address_valid=addressValidation();

    
    if($name_valid==true && $user_name_valid==true && $password_valid==true && $re_password_valid==true && $email_valid==true && $address_valid==true && $contact_valid){
      add_patients($name, $username, $password, $gender, $email, $blood_group, $address, $contact);
        $successmess="Registration Confirm";
        echo "<script>setTimeout(\"location.href = '../index.php';\",1500);</script>";
      
    }
  }

?>
<?php

  //method for name validation 
  function nameValidation(){
    global $name,$nameErr;
    $name=$_POST['name'];
    if($name==""){
      $nameErr="Name Required";
      return false;
    }
    else{
      if(preg_match("/^[a-zA-Z. ]*$/",$name)){
        return true;
      }
      else{
        $nameErr="Invalid Name";
        return false;
      }
      
    }
  }

  //method for user_name validation 
  function usernameValidation(){
    global $username,$usernameErr;
    $username=$_POST['username'];
    if($username==""){
      $usernameErr="Username Required";
      return false;
    }
    else{
      if(preg_match("/^[a-zA-Z. ]*$/",$username)){
        return true;
      }
      else{
        $usernameErr="Invalid Username";
        return false;
      }
      
    }
  }

  //method for password validation
  function passwordValidation(){
    global $passwordErr;
    $password=$_POST['password'];
    if($password==""){
      $passwordErr="Password Required";
      return false;
    }
    else{
      if(strlen($password)>=5){
        if(preg_match("(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$)",$password)){
          return true;
        }
        else{
          $passwordErr="Password should contain 1 uppercase 1 lowercase 1 digit";
          return false;
        }
      }
      else{
        $passwordErr="Password length should be 5 character";
        return false;
      }
    }
  }

  //method for confirem password
  function re_passValidation(){
    global $re_passwordErr;
    $re_password=$_POST['re_password'];
    if($re_password==""){
      $re_passwordErr="Confirm password Required";
      return false;
    }
    else{
      $password=$_POST['password'];
      if($password==$re_password){
        return true;
      }
      else{
        $re_passwordErr="Password And Confirm password not matched";
        return false;
      }
    }

  }

   //method for mail validation
  function emailValidation(){
    global $email,$emailErr;
    $email=$_POST['email'];
    if($email==""){
      $emailErr="Email Required";
      return false;
    }
    else{
      if(preg_match("/^[a-z][a-zA-Z_0-9]*@[a-zA-Z]*\.[a-z]{2,6}$/",$email)){
        return true;
      }
      else{
        $emailErr="Invalid Email";
        return false;
      }
    }
  }


  //method for addess validation 
  function addressValidation(){
    global $address,$addressErr;
    $address=$_POST['address'];
    if($address==""){
      $addressErr="Address Required";
      return false;
    }
    else{
      return true;
    }
  }


  //method for contact no validation
  function contactValidation(){
    global $contact,$contactErr;
    $contact=$_POST['contact'];
    if($contact==""){
      $contactErr="Contact No Required";
      return false;
    }
    else{
      if(preg_match("/^[0-9]{1,12}$/",$contact)){
        return true;
      }
      else{
        $contactErr="Please Enter Correct Contact No";
        return false;
      }
    }
  }
 
?>