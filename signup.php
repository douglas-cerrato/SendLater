<?php
   require_once('db_connection.php');

   if ($_SERVER["REQUEST_METHOD"] == "POST"){
      // Check if First Name box is empty, if not then declare variable
      if (!empty($_POST['fname_textbox'])){
         $fname = $_POST['fname_textbox'];
      } else{
         die("First name is required!!!");
      }
      
      // Check if Last Name box is empty, if not then declare variable
      if (!empty($_POST['lname_textbox'])){
         $lname = $_POST['lname_textbox'];
      } else{
         die("Last name is required!!!");
      }

      // Check if Email box is empty, if not then declare variable
      if (!empty($_POST['email_textbox'])){
         //TODO: late Check if this email is a valid email
         $email = $_POST['email_textbox'];
      } else{
         die("Email is required!!!");
      }

      // Check if Password box is empty, if not then declare variable
      if (!empty($_POST['password1_box'])){
         $passwd = $_POST['password1_box'];
         $passwd1 = true;
      } else{
         $passwd1 = false;
         die("Password is required");
      }

      // Check if Password Verification box is empty, if not then declare variable
      if (!empty($_POST['verify_password'])){
         $verify_passwd = $_POST['verify_password'];
         $passwd2 = true;
      } else{
         $passwd2 = false;
         die("Verify Password is required!!!");
      }
   }

   // Checks if both password boxes were filled
   if ($passwd1 == true && $passwd2 == true){
      if ($passwd == $verify_passwd){
         //TODO: Hash password and save it to the database
      } else{
         die("Passwords don't match: $passwd and $verify_passwd");
      }
   }


?>

<!DOCTYPE html>
<html>
   <head>
      <title> Signup Page </title>
   </head>
   <body>
      <p> Create an Account </p>
      <form action="signup.php" method="post">
         <div>
            <label for="fname">Enter First Name:</label>
            <input type="text" id="fname" name="fname_textbox">
         </div>
         
         <div>
            <label for="lname">Enter Last Name:</label>
            <input type="text" id="lname" name="lname_textbox"></input>
         </div>
         
         <div>
            <label for="email">Enter Email:</label>
            <input type="text" id="email" name="email_textbox"></input>
         </div>

         <div>
            <label for="psswd">Enter Password:</label>
            <input type="password" id="psswd" name="password1_box"></input>
         </div>

         <div>
            <label for="verify_psswd">Re-Enter Password:</label>
            <input type="password" id="verify_psswd" name="verify_password"></input>
         </div>

         <button type="submit">Submit</button>
      </form>
   </body>
</html>
