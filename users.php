<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowers</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <main>
        <div class="container py-4">
            <header class="pb-3 mb-4 border-bottom d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <a href="./index.php" class="d-flex align-items-center text-body-emphasis text-decoration-none">
                        <img src="icon-logo.svg" alt="person on top of ple of books" width="55">
                        <span class="fs-4 ms-3">Trimex Library System</span>
                    </a>

                    <a href="./users.php" class="text-body-emphasis mx-4">Users</a>
                    <a href="./books.php" class="text-body-emphasis mx-2">Books</a>
                </div>
                <a href="user_form.php" type="button" class="btn btn-warning my-2 text-dark">New Record</a>
            </header>
            <?php
            if (isset($_GET['message'])) {
                echo '<span class="d-flex justify-content-center text-warning mb-3" role="alert">' . $_GET['message']  . '</span>';
                header("refresh:4;url=users.php");
            }
            ?>
            <div class="row align-items-md-stretch">

                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center" scope=" col">Name</th>
                            <th class="text-center" scope="col">Mobile</th>
                            <th class="text-center" scope="col">Email</th>
                            <th class="text-center" scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'db_connection.php';
                        $sql = "SELECT * FROM borrowers";
                        $result = $sql_connection->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr class="text-center">
                                    <th><?php echo $row['name']; ?></th>
                                    <td><?php echo $row['mobile']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td>
                                        <a href="user_form.php?borrowers_id=<?php echo $row['borrowers_id']; ?>" class="mx-2 text-white btn btn-sm btn-info">
                                            Edit
                                        </a>
                                        <a href="borrower_process.php?action=delete_book&borrowers_id=<?php echo $row['borrowers_id']; ?>" class="mx-2 text-white btn btn-sm btn-danger">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                        <?php

                            }
                        } else {
                            echo '<div class="alert alert-danger col-12 my-5 text-center text-white">No records found!</div>';
                        }
                        ?>
                    </tbody>

                </table>

            </div>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>