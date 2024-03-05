<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #0E4D92;
	    font-size: 18px;
        }
        .container {
	    display: flex;
	    flex-direction: column;
	    align-items: flex-start;
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
            width: auto;
            align-items: center;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 30px;
            display: flex;
        }
        h2 {
            margin-top: 50px;
            text-align: left;
            font-size: 36px;
            padding-left: 20px;
            font-family: fantasy, Papyrus;
        }
	h3 {
            margin-top: 8%;
	    margin-bottom: -25px;
            text-align: left;
            font-size: 36px;
            padding-left: 20px;
            font-family: fantasy, Papyrus;
        }
	h4 {
	    text-align: right;
	    font-size: 36px;
	}
	.buttons {
	    display: flex;
    	    justify-content: center;
    	    width: 100%;
    	    margin-bottom: 5px;
	    padding-right: 10px;
            margin-top: 30px;            
        }
.btn {
    display: inline-block;
    padding: 10px 20px;
    margin-right: 20px;
    background-color: #0E4D92;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
    font-size: 16px;
    width: 100px;  
}

.btn:hover {
    background-color: #E97451;
    color: #fff;
    text-decoration: underline;
    padding: 10px 20px; 
}
        ul {
            list-style-type: disclosure-closed;
            padding: 2%;
            font-size: 20px;
        }
        li {
            padding: 5px 0;
        }
	.sidebar {
	    width: 200px;
	    background-color: #f0f0f0;
	    padding: 20px;
	    border-radius: 5px;
	    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
	    /*! margin-right: 20px; */
        position: relative;
        top: unset;
        right: 20px;
	    /*! align-items: end; */
	    /*! display: flex; */
	}
    .sidebar h2 {
        text-align: center;
        pointer-events: absolute;
        top: 0;
        left: 0;
        right: 0;
        margin: 0;
        padding: 10px 0;
    }
	.advertisement {
	    /*! background-color: #007bff; */
	    /*! color: #fff; */
	    /*! padding: 20px; */
	    /*! border-radius: 5px; */
	    /*! text-align: center; */
        /*! margin-top: 20px; */
	}
    .flex-container {
        display: flex;
        justify-content: space-around;
}
    	form {
	    margin-left: 5%;
            margin-right: 5%;
	    align-self: center;
	    width: 60%;
	}
    </style>
</head>
<body>
    <div class="container">
        <h1 style="margin-top: 30px;margin-right: auto;">Reset Password</h1>
        <form action="submit_reset.php" method="post">
            <label for="email">Enter Email:</label>
            <input type="email" id="email" name="email" required="" style="width: 100%; padding: 10px; margin-bottom: 10px;"><br><br>
            <label for="old-password">Old Password:</label>
            <input type="password" id="old-password" name="old-password" required="" style="width: 100%; padding: 10px; margin-bottom: 10px;"><br><br>
            <label for="new-password">New Password:</label>
            <input type="password" id="new-password" name="new-password" required="" style="width: 100%; padding: 10px; margin-bottom: 10px;"><br><br>
            <label for="confirm-new-password">Re-enter New Password:</label>
            <input type="password" id="confirm-new-password" name="confirm-new-password" required="" style="width: 100%; padding: 10px; margin-bottom: 10px;"><br><br>
            <div class="buttons">
                <button type="submit" class="btn">Submit</button>
                <button onclick="history.back()" class="btn">Back</button>
            </div>
        </form>
    </div>
</body>
</html>
