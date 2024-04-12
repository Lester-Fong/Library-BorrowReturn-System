<!DOCTYPE html>
<html>

<head>
    <title>Trimex Library System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-dark">
    <div class="container">
        <header class="pb-3 my-4 border-bottom d-flex align-items-center justify-content-between">
            <a href="./index.php" class="d-flex align-items-center text-body-emphasis text-decoration-none">
                <img src="icon-logo.svg" alt="person on top of ple of books" width="55">
                <span class="fs-4 ms-3 text-white">Trimex Library System</span>
            </a>
        </header>
    </div>
    <div class="container-fluid w-50">
        <?php
        if (isset($_GET['message'])) {
            echo '<span class="d-flex justify-content-center text-warning" role="alert">' . $_GET['message']  . '</span>';
        }
        ?>
        <?php $id = $_GET['books_id'] ?? '' ?>
        <form action="process.php?books_id=<?php echo $id ?>" method="POST">
            <?php
            if (isset($_GET['books_id']) && $_GET['books_id'] !== '') {
                include 'db_connection.php';
                $sql = "SELECT * FROM books WHERE id=" . $_GET['books_id'];
                $result = $sql_connection->query($sql);
                $row = $result->fetch_assoc(); // Fetch the row from the result set
            ?>
                <div class="row">
                    <div class="form-group col-6 mb-4">
                        <label for="title" class="h5 text-white">Title:</label>
                        <input type="text" class="form-control" name="title" id="title" value="<?php echo $row['title']; ?>">
                    </div>

                    <div class="form-group col-6 mb-4">
                        <label for="author" class="h5 text-white">Author:</label>
                        <input type="text" class="form-control" name="author" id="author" value="<?php echo $row['author']; ?>">
                    </div>

                    <div class="form-group col-6 mb-4">
                        <label for="genre" class="h5 text-white">Genre:</label>
                        <input type="text" class="form-control" name="genre" id="genre" value="<?php echo $row['genre']; ?>">
                    </div>

                    <div class="form-group col-6 mb-4">
                        <label for="year" class="h5 text-white">Year Published:</label>
                        <input type="number" class="form-control" name="year" id="year" value="<?php echo $row['published_year']; ?>">
                    </div>
                    <div class="form-group col-6 mb-4">
                        <label for="isbn" class="h5 text-white">ISBN:</label>
                        <input type="number" inputmode="numeric" maxlength="13" min="0" pattern="[0-9]{4}" class="form-control" name="isbn" id="isbn" value="<?php echo $row['isbn']; ?>" />
                    </div>
                </div>

            <?php } else { ?>
                <div class="row">
                    <div class="form-group col-6 mb-4">
                        <label for="title" class="h5 text-white">Title:</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>

                    <div class="form-group col-6 mb-4">
                        <label for="author" class="h5 text-white">Author:</label>
                        <input type="text" class="form-control" name="author" id="author">
                    </div>

                    <div class="form-group col-6 mb-4">
                        <label for="genre" class="h5 text-white">Genre:</label>
                        <input type="text" class="form-control" name="genre" id="genre">
                    </div>

                    <div class="form-group col-6 mb-4">
                        <label for="year" class="h5 text-white">Year Published:</label>
                        <input type="number" class="form-control" name="year" id="year">
                    </div>
                    <div class="form-group col-6 mb-4">
                        <label for="isbn" class="h5 text-white">ISBN:</label>
                        <input type="number" inputmode="numeric" maxlength="13" min="0" pattern="[0-9]{4}" class="form-control" name="isbn" id="isbn" />
                    </div>
                </div>
            <?php } ?>

            <div class="d-flex justify-content-center">
                <input type="submit" class="btn btn-primary w-50 py-3 fw-bold my-4">
            </div>
        </form>
    </div>
    <footer class="px-5 py-3 glassmorphism fixed-bottom border-top text-center text-white">
        &copy; Made with ❤️ by Lester Fong
    </footer>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>