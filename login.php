<?php
    // Grab database connection
    require_once('db_connection.php');
    
    // Start session
    session_start();

    // This is here to show us errors in our code in the sit has an issue
    // with something server side
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // Check if user is logged in
    if (isset($_SESSION["user_id"])){
        // Redirect to profile page
        header("Location: profile.php");
        exit();
    }

    // Get database connection
    $conn = getDBConnection();

    // Declaring default variables
    $invalidPassword = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $user_email = $_POST['email'];
            $user_password = $_POST['password'];

            // Creating search query for our database
            $sql = "SELECT * FROM user_info WHERE email = '$user_email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0){
                // User found, let's verify password
                $row = $result->fetch_assoc();
                $dbPassword = $row["password"];
                if (password_verify($user_password, $dbPassword)){
                    // Hashed passwords match, start session and redirect to dashboard
                    $_SESSION["user_id"] = $row["id"];
                    $_SESSION["first_name"] = $row["first_name"];
                    $_SESSION["last_name"] = $row["last_name"];
                    $_SESSION["email"] = $row["email"];
                    header("Location: profile.php");
                    exit();
                } else{
                    // Passwords do not match
                    $invalidPassword = true;
                }
            } else{
                // User not found
                header("Location: register.php");
                exit();
            }
        $conn->close();
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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
            font-size: 52px;
            margin-bottom: 20px;
	    font-family: fantasy, papyrus;
        }
        label {
            margin-bottom: 10px;
        }
        input[type="email"],
        input[type="password"],
        button {
            width: 92%;
            padding: 8px;
            margin-bottom: 14px;
            box-sizing: border-box;
        }
        button {
            background-color: #0E4D92;
            color: white;
            border: none;
            cursor: pointer;
	    width: 40%;
	    margin-left: 25%;
        }
        button:hover {
            background-color: #E97451;
	    text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sign In</h1>
        <form action="login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Sign In</button>
        </form>
        <a href="reset.php" style="margin-left: -6%;">Forgot Password?</a>
        <?php if($invalidPassword){
            echo '<p style="color: red;margin-right:6%;">Invalid Password.</p>';
        }
        ?>
    </div>
</body>

