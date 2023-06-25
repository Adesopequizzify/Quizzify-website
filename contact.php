<?php
    session_start();
 
    // check if the form submits
    if (isset($_POST["contact_us"]))
    {
        $_token = $_POST["_token"];
 
        // check CSRF token
        if (isset($_SESSION["_token"]) && $_SESSION["_token"] == $_token)
        {
            // remove the token so it cannot be used again
            unset($_SESSION["_token"]);
 
            // connect with the database
            $conn = mysqli_connect("pld110.truehost.cloud", "quizwift_muiz", "Adeniyi20#", "quizwift_contact");
 
            // get and validate input fields from SQL injection
            $name = mysqli_real_escape_string($conn, $_POST["name"]);
            $email = mysqli_real_escape_string($conn, $_POST["email"]);
            $message = mysqli_real_escape_string($conn, $_POST["message"]);
            $is_read = 0;
 
            // saving in the database
            $sql = "INSERT INTO inbox(name, email, message, is_read, created_at) VALUES ('$name', '$email', '$message', $is_read, NOW())";
            mysqli_query($conn, $sql);
 
            echo "<p>Your message has been received. Thank you.</p>";
        }
        else
        {
            echo "<p>Something went wrong.</p>";
        }
 
        header("refresh: 5; url=contact.php");
    }
?>
