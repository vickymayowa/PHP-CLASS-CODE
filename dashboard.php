<?php
require 'database_con.php';
session_start();

if (isset($_SESSION['id'])) { // Use the correct session key
    $userid = $_SESSION['id'];
    echo $userid;
    $query = "SELECT * FROM students WHERE id= '$userid'";
    $con = $database_con->query($query);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .container {
            width: 400px;
            padding: 20px;
            border: 1px solid #cccccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            text-align: center
        }

        input[type=text],
        input[type=email],
        input[type=password] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        /* Container styling */
        .message-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
        }

        /* Message styling */
        .session-message {
            padding: 10px 20px;
            background-color: #ffdddd;
            /* Light red background */
            border: 1px solid #ffcccc;
            /* Slightly darker red border */
            color: #d8000c;
            /* Dark red text */
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Subtle shadow for depth */
            font-size: 16px;
            /* Adjust as needed */
            width: auto;
            /* Adjust based on your design */
            max-width: 80%;
            /* Ensures it doesn't stretch too wide */
            text-align: center;
            /* Center the text */
            transition: opacity 0.5s ease-in-out;
        }

        /* Optional: Animation for the appearance of the message */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .session-message {
            animation: fadeIn 0.5s ease-in-out;
        }

        h2.text-center {
            color: #333;
        }

        hr {
            border: 0;
            height: 1px;
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
        }

        .message-container {
            margin: 20px 0;
        }

        .session-message {
            color: #dc3545;
            /* Bootstrap 'danger' color */
            font-weight: bold;
        }

        marquee {
            border: none;
        }

        .form-control-file {
            margin-top: 0.5rem;
        }
    </style>
</head>

<body>

    <marquee behavior="alternate" direction="left">
        <div class="container border shadow-lg">
            <h2 class="text-center">Welcome to Dashboard</h2>
            <hr>
            <div class="message-container">
                <?php
                if (isset($_SESSION['message'])) {
                    echo '<div class="session-message text-center text-danger">' . $_SESSION['message'] . '</div>';
                }
                session_unset();
                ?>
    </marquee>
    <hr>

    <div class="container mt-5">
        <h2>Upload Profile Picture</h2>
        <form action="process.php" method="post" enctype="multipart/form-data">
            <div class="custom-file mb-3">
                <label class="custom-file-label" for="customFile">Choose file</label>
                <input type="file" name="image" class="custom-file-input" id="customFile" required>
            </div>
            <button type="submit" name="submit" value="Upload Profile pic" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>

</html>