<?php
    // Start session
    session_start();

    // This is here to show us errors in our code in the sit has an issue
    // with something server side
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // Declaring base variable
    $error = false;

    // Database connection
    require_once('db_connection.php');
    $conn = getDBConnection();

    // Check if user is not logged in
    if (!isset($_SESSION["user_id"])){
        // Redirect to login page
        header("Location: login.php");
        exit();
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        // Retrieve form data
        $to = $_POST['to'];
        // Construct subject line with first name and last name
        $subject = $_SESSION["first_name"] . "-" . $_SESSION["last_name"].": ".$_POST['subject'];
        // Encode message to keep its full format
        $message = htmlspecialchars($_POST['message']);
        $send_date = $_POST['send-date'];
        $send_time = $_POST['send-time'];
        $user_id = $_SESSION["user_id"];

        // Creating sql query
        $sql = "INSERT INTO email_info (user_id, receipient_email, subject_line, email_contents, send_date, send_time)
        VALUES (?,?,?,?,?,?)";

        $stmnt = $conn->prepare($sql);
        $stmnt->bind_param("isssss", $user_id, $to, $subject, $message, $send_date, $send_time);
        
        // Execute the statement
        if ($stmnt->execute()){
            // Redirect to confirm.php if executed successfully
            header("Location: confirm.php");
            exit();
        }else{
            // Set error variable to true if there was an error
            $error = true;
        }

    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Main Page</title>
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
        .dropdown {
            position: relative;
	    display: inline-block;
	    align-self: end;
        }
	.dropbtn {
    	   background-color: #0E4D92;
    	   color: #fff;
    	   padding: 10px;
           font-size: 16px;
    	   border: none;
    	   cursor: pointer;
	   float: right;
	}
	.dropdown-content {
    	   display: none;
    	   position: absolute;
   	   background-color: #0E4D92;
    	   min-width: 160px;
    	   box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    	   z-index: 1;
	   right: 0;
	   top: 100%;
	}
	.dropdown-content a {
    	   color: #fff;
   	   padding: 12px 16px;
   	   text-decoration: none;
   	   display: block;
	}
	h1 {
	   font-family: fantasy, Papyrus;
	   font-size: 52px;
	}
	.dropdown-content a:hover {
    	   background-color: #E97451;
	   text-decoration: underline;
	}

	.dropdown:hover .dropdown-content {
   	   display: block;
	}

	.dropdown:hover .dropbtn {
   	    background-color: #97451;
	    text-decoration: underline;
	}
        .email-form {
            width: 100%;
            margin-top: 20px;
        }
        .frequency {
            margin-top: 20px;
        }
        .date-picker {
            margin-top: 20px;
        }
        .send-button {
            margin-top: 20px;
        }
        .time-picker {
            margin-top: 20px;
        }
        .flatpickr-time {
            position: relative;
            margin-left: 11%;
            display: flex;
        }
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr">
    </style>
</head>
<body>
    <div class="container">
        <div class="dropdown">
            <button class="dropbtn">Menu</button>
            <div class="dropdown-content">
                <a href="reset.php">Password Reset</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
        <h1>User Main Page</h1>
	<form action="profile.php" method="post">
        <div class="email-form">
            <label for="to">To:</label>
            <input type="text" id="to" name="to" style="width: 100%;" required pattern=".*@.*"><br><br>
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" style="width: 100%;" required><br><br>
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="4" cols="50" style="width: 100%; height: 110px;" required></textarea>
        </div>
        <div class="date-picker">
            <label for="send-date">Date:</label>
            <input type="date" id="send-date" name="send-date" required>
        </div>
        <div class="time-picker">
            <label for="send-time" >Time:</label> 
            <input type="text" id="send-time" name="send-time" placeholder="Select time" required><br><br>
        </div>
        <?php if($error){
            echo '<p style="color: red;">There was an error trying to send your email.</p>';
        }
        ?>

        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            // Function to update the send-time input
            function updateTimeInput() {
                const hourInput = document.querySelector('.flatpickr-hour');
                const minuteInput = document.querySelector('.flatpickr-minute');

                // Get the selected hour and minute
                const selectedHour = hourInput.value.padStart(2, '0');
                const selectedMinute = minuteInput.value.padStart(2, '0');

                // Set the selected time in the input field
                document.getElementById("send-time").value = selectedHour + ':' + selectedMinute;
            }

            // Initialize Flatpickr with onChange event
            flatpickr("#send-time", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                minuteIncrement: 1,
                placeholder: "Select send time",
                appendTo: document.querySelector('.time-picker'),
                onChange: updateTimeInput // Call updateTimeInput function when time changes
            });

            // Listen for input event on hour and minute inputs
            document.querySelector('.flatpickr-hour').addEventListener('input', updateTimeInput);
            document.querySelector('.flatpickr-minute').addEventListener('input', updateTimeInput);
        
            // Call updateTimeInput function when the page loads to set the default time
            window.addEventListener('load', updateTimeInput);        
        </script>

        <div class="send-button">
            <input type="submit" value="Submit">
        </div>
	</form>
    </div>
</body>
</html>
