<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trimex Library</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <main>
        <div class="container py-4">
            <header class="pb-3 mb-4 border-bottom d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <a class="d-flex align-items-center text-body-emphasis text-decoration-none">
                        <img src="icon-logo.svg" alt="person on top of ple of books" width="55">
                        <span class="fs-4 ms-3">Trimex Library System</span>
                    </a>

                    <a href="./users.php" class="text-body-emphasis mx-4">Users</a>
                    <a href="./books.php" class="text-body-emphasis mx-2">Books</a>
                </div>
                <a href="form.php" type="button" class="btn btn-warning my-2 text-dark">New Record</a>
            </header>
            <?php
            if (isset($_GET['message'])) {
                echo '<span class="d-flex justify-content-center text-warning" role="alert">' . $_GET['message']  . '</span>';
                header("refresh:4;url=index.php");
            }
            ?>
            <div class="row align-items-md-stretch">
                <?php
                include 'db_connection.php';
                $sql = "SELECT * FROM books";
                $result = $sql_connection->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="col-md-6 my-2">
                            <div class="py-3 px-4 text-bg-success rounded-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <h4 class="d-inline me-2"><?php echo $row['title']; ?></h4>
                                        <span class="badge fs-10px text-bg-info rounded-pill"><?php echo $row['genre']; ?></span>
                                    </div>
                                    <small class="text-info"><?php echo $row['published_year']; ?></small>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <small class="fs-small"> <?php echo $row['isbn']; ?> </small>
                                        <p>By: <?php echo $row['author']; ?></p>
                                    </div>
                                    <!-- <div>
                                       
                                        
                                    </div> -->

                                    <div class="btn-group btn-sm">
                                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Actions &nbsp;</button>
                                        <ul class="dropdown-menu bg-secondary">
                                            <li> <a href="form.php?books_id=<?php echo $row['id']; ?>" class="dropdown-item bg-secondary">Edit</a></li>
                                            <li><a href="process.php?action=delete&books_id=<?php echo $row['id']; ?>" class="dropdown-item bg-secondary">Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>

            <?php include 'footer.php'; ?>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>