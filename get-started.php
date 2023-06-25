<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <style>
        /* Glassmorphism CSS styles */
        body {
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 100%;
        }
        
        .container label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .container input[type="text"],
        .container input[type="email"],
        .container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        
        .container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="POST" action="contact.php">
            <?php
                $_token = md5(time());
                $_SESSION["_token"] = $_token;
            ?>
            <input type="hidden" name="_token" value="<?php echo $_token; ?>" />
        
            <p>
                <label>Name</label>
                <input type="text" name="name" required>
            </p>
        
            <p>
                <label>Email</label>
                <input type="email" name="email" required>
            </p>
        
            <p>
                <label>Message</label>
                <textarea name="message" required></textarea>
            </p>
        
            <p>
                <input type="submit" name="contact_us" value="Send message">
            </p>
        </form>
    </div>
</body>
</html>
