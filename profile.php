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
            width: 50%;
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
            margin-left: 30%;
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
                <a href="#">Password Reset</a>
                <a href="#">Logout</a>
            </div>
        </div>
        <h1>User Main Page</h1>
	<form action="submit_profile.php" method="post">
        <div class="email-form">
            <label for="to">To:</label>
            <input type="text" id="to" name="to" style="width: 100%;" required><br><br>
            <label for="cc">CC:</label>
            <input type="text" id="cc" name="cc" style="width: 100%;" required><br><br>
            <label for="from">From:</label>
            <input type="text" id="from" name="from" style="width: 100%;" required><br><br>
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" style="width: 100%;" required><br><br>
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="4" cols="50" style="width: 100%;" required></textarea>
        </div>
        <div class="frequency">
            <label for="frequency">Frequency:</label>
            <select id="frequency" name="frequency">
                <option value="once">Once</option>
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
                <option value="monthly">Monthly</option>
            </select>
        </div>
        <div class="date-picker">
            <label for="send-date">Date:</label>
            <input type="date" id="send-date" name="send-date" required>
        </div>
        <div class="time-picker">
            <label for="send-time" >Time:</label> 
            <input type="text" id="send-time" name="send-time" placeholder="Select time" required><br><br>
        </div>

            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#send-time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        minuteIncrement: 1,
        placeholder: "Select send time",
        appendTo: document.querySelector('.time-picker')
    });
</script>
        <div class="send-button">
            <input type="submit" value="Submit">
        </div>
	</form>
    </div>
</body>
</html>



