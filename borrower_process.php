<?php
include 'db_connection.php';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];

    // Validate the form data (you can add your own validation rules here)
    if (empty($name) || empty($email) || empty($mobile)) {
        header("Location: user_form.php?message=Please fill all the fields!");
    } else {
        if (isset($_GET['borrowers_id']) && $_GET['borrowers_id'] !== '') {
            // Edit Process
            $borrowers_id = $_GET['borrowers_id'];
            $sql = "UPDATE borrowers SET name='$name', email='$email', mobile='$mobile' WHERE borrowers_id='$borrowers_id'";
        } else {
            // Insert Process
            $sql = "INSERT INTO borrowers (name, email, mobile) VALUES ('$name', '$email', '$mobile')";
        }

        if ($sql_connection->query($sql) === TRUE) {
            header("Location: users.php?message=Record saved successfully!");
        } else {
            echo "Error: " . $sql . "<br>" . $sql_connection->error;
        }
    }
}

if (isset($_GET['borrowers_id']) && $_GET['borrowers_id'] !== '' && isset($_GET['action']) && $_GET['action'] === 'delete_book') {
    $borrowers_id = $_GET['borrowers_id'];

    // delete the data from the database
    $sql = "DELETE FROM borrowers WHERE borrowers_id='$borrowers_id'";

    if ($sql_connection->query($sql) === TRUE) {
        header("Location: users.php?message=Record has deleted successfully!");
    } else {
        echo "Error: " . $sql . "<br>" . $sql_connection->error;
    }
}
