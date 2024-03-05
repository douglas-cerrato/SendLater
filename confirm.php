<!DOCTYPE html>
<html>
<head>
    <title>Email Confirmation</title>
    <style>
        body {
            font-family: fantasy, papyrus;
            margin: 20px;
            padding: 0;
            background-color: #0E4D92;
            color: #000;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #C0C0C0;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
	    font-size: 48px;
        }
        .message {
            text-align: center;
            margin-bottom: 20px;
	    font-size: 16px;
	    font-family: Arial, sans-serif;
        }
        .buttons {
            text-align: center;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 0 10px;
            background-color: #0E4D92;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
	    font-family: Arial, sans-serif;
        }
        .btn:hover {
            background-color: #E97451;
	    text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Email Confirmation</h1>
        <div class="message">Your message was successfully sent.</div>
        <div class="buttons">
            <a href="profile.php" class="btn">Return</a>
            <a href="logout.php" class="btn">Logout</a>
        </div>
    </div>
</body>
</html>

