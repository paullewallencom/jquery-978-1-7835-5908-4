<?php
    include 'db.php';
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $user_name = $_POST['name'];
    $user_email = $_POST['email'];
    $user_contact = $_POST['contact'];
    $user_facility = $_POST['facility'];

    $sql = "INSERT INTO User_Queries (User_Name, User_Email, User_Contact, User_Facility) VALUES ('$user_name', '$user_email', '$user_contact', '$user_facility')";


    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>