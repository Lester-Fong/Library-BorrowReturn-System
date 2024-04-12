<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = $_POST["book_id"];
    $borrower_id = $_POST["borrower_id"];

    if (empty($book_id) || empty($borrower_id)) {
        header("Location: book_transaction_form.php?message=Please fill all the fields!");
    } else {
        $one_week = date('Y-m-d', strtotime('+7 days'));
        $sql = "INSERT INTO booktransaction (book_id, user_id, due_date) VALUES ('$book_id', '$borrower_id', '$one_week')";

        if ($sql_connection->query($sql) === TRUE) {
            $update_sql = "UPDATE books SET is_available=0 WHERE id='$book_id'";
            $sql_connection->query($update_sql);
            header("Location: books.php?message=Record saved successfully!");
        } else {
            echo "Error: " . $sql . "<br>" . $sql_connection->error;
        }
    }
}

if (isset($_GET['booktransactionId']) && $_GET['booktransactionId'] !== '' && isset($_GET['book_id']) && $_GET['book_id'] !== '') {
    $date_now = date('Y-m-d');
    $booktransactionId = $_GET['booktransactionId'];
    $book_id = $_GET["book_id"];
    $update_sql = "UPDATE booktransaction SET return_date='$date_now' WHERE booktransaction_id='$booktransactionId'";

    if ($sql_connection->query($update_sql) === TRUE) {
        $update_sql = "UPDATE books SET is_available=1 WHERE id='$book_id'";
        $sql_connection->query($update_sql);
        header("Location: books.php?message=Record saved successfully!");
    } else {
        echo "Error: " . $sql . "<br>" . $sql_connection->error;
    }
}
