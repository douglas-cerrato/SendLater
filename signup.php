<?php
   require_once('db_connection.php');

   if ($_SERVER["REQUEST_METHOD"] == "POST"){
      if (!empty($_POST['fname_textbox'])){
         // If FirstName text box isn't empty, declare it's variable
         $fname = $_POST['fname_textbox'];
      } else{
         die("First name is required!!!");
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
         <div>

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
