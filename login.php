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
        <a href="forgot_password.php" style="margin-left: -6%;">Forgot Password?</a>
    </div>
</body>

