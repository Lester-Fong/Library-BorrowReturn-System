<?php
include 'db_connection.php';

if (isset($_GET['books_id']) && $_GET['books_id'] !== '' && !isset($_GET['action'])) {
    if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['genre']) && isset($_POST['year']) && isset($_POST['isbn'])) {
        $books_id = $_GET['books_id'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $genre = $_POST['genre'];
        $year = $_POST['year'];
        $isbn = $_POST['isbn'];

        //validation if isbn is unique
        $sql = "SELECT * FROM books WHERE isbn='$isbn' AND id!='$books_id'";
        $result = $sql_connection->query($sql);
        if ($result->num_rows > 0) {
            header("Location: form.php?books_id=$books_id&message=ISBN already exists!");
            exit();
        }

        // update the data into the database
        $sql = "UPDATE books SET title='$title', author='$author', genre='$genre', published_year='$year', isbn='$isbn' WHERE id='$books_id'";

        if ($sql_connection->query($sql) === TRUE) {
            header("Location: index.php?message=Record has updated successfully!");
        } else {
            echo "Error: " . $sql . "<br>" . $sql_connection->error;
        }
    } else {
        header("Location: form.php?message=Please fill all the fields!");
    }
} else if (isset($_GET['books_id']) && $_GET['books_id'] !== '' && isset($_GET['action']) && $_GET['action'] === 'delete') {
    $books_id = $_GET['books_id'];

    // delete the data from the database
    $sql = "DELETE FROM books WHERE id='$books_id'";

    if ($sql_connection->query($sql) === TRUE) {
        header("Location: index.php?message=Record has deleted successfully!");
    } else {
        echo "Error: " . $sql . "<br>" . $sql_connection->error;
    }
} else {
    // validate the form fields
    if ($_POST['title'] !== '' && $_POST['author'] !== '' && $_POST['genre'] !== '' && $_POST['year'] !== '' && $_POST['isbn'] !== '') {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $genre = $_POST['genre'];
        $year = $_POST['year'];
        $isbn = $_POST['isbn'];

        //validation if isbn is unique
        $sql = "SELECT * FROM books WHERE isbn='$isbn'";
        $result = $sql_connection->query($sql);
        if ($result->num_rows > 0) {
            header("Location: form.php?message=ISBN already exists!");
            exit();
        }

        // insert the data into the database
        $sql = "INSERT INTO books (title, author, genre, published_year, isbn) VALUES ('$title', '$author', '$genre', '$year', '$isbn')";

        if ($sql_connection->query($sql) === TRUE) {
            header("Location: index.php?message=New record created successfully");
        } else {
            echo "Error: " . $sql . "<br>" . $sql_connection->error;
        }
    } else {
        header("Location: form.php?message=Please fill all the fields!");
    }
}
