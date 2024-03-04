<?php
    require_once('db_connection.php');

    // This is here to show us errors in our code in the sit has an issue
    // with something server side
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // Get database connection
    $conn = getDBConnection();

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        //TODO: late Check if this email is a valid email
        $email = $_POST['email'];
        $passwd = $_POST['password'];
        $verify_passwd = $_POST['repassword'];

        if ($passwd == $verify_passwd){
            $hashedPassword = password_hash($passwd, PASSWORD_BCRYPT);

            // Creating SQL Query
            $sql_query = "INSERT INTO user_info (email, password, first_name, last_name) VALUES (?,?,?,?)";

            // Create a prepared statement
            $stmnt = $conn->prepare($sql_query);

            // Bind the parameters to the placeholders
            $stmnt->bind_param("ssss",$email,$hashedPassword,$fname,$lname);
            
            // Execute the statement
            if ($stmnt->execute()){
                $accountCreated = true;
            } else{
                die(" Error inserting data: " . $stmnt->error);
            }

            // Close the statement and connection
            $stmnt->close();
            $conn->close();

        } else{
            //TODO: throw an error later in the page if this is set
            // to true. Basically saying that the passwords mismatch
            // and that we could not add the user to the database
            $mismatchedPasswords = true;
            $accountCreated = false;
        }
   }
?>



<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #0E4D92;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #C0C0C0;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-family: fantasy, Papyrus;
            text-align: center;
            font-size: 52px;
            margin-bottom: 20px;
        }
	.footer {
	    text-align: center;
	    margin-top: 50px;
	    padding: 20px;
	    background-color: #0E4D92;
	    color: #fff;
	    font-weight: lighter;
	    font-size: x-small;
	}
        form {
            width: 60%;
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-size: 20px;
        }
        input[type="text"], input[type="email"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #0E4D92;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #E97451;
	    text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Registration</h1>
        <form action="register.php" method="post">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" required>
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" required>
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required="" style="width: 95%; padding: 10px;"><br><br>
    	    <label for="repassword">Re-enter Password:</label>
    	    <input type="password" id="repassword" name="repassword" required="" style="width: 95%; padding: 10px;"><br><br>
	        <input type="submit" value="Register">
        </form>
    </div>
<div class="footer">
<p> SendLater is created by Doug Cerrato and Angel Portillo, we are supported by AutoSource. Privacy Policy. Customer Service. Copyrights reserved.
</p>
</div>
</body>
</html>

