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
        <?php $id = $_GET['borrowers_id'] ?? '' ?>
        <form action="book_transaction_process.php" method="POST">
            <?php
            include 'db_connection.php';
            $borrowers_sql = "SELECT * FROM borrowers";
            $borrowers_result = $sql_connection->query($borrowers_sql);

            $books_sql = "SELECT * FROM books WHERE is_available=" . 1;
            $books_result = $sql_connection->query($books_sql);
            ?>

            <div class="row">
                <div class="form-group col-12 mb-4">
                    <label for="title" class="h5 text-white">Book:</label>
                    <select name="book_id" id="title" class="form-control">
                        <?php if ($books_result->num_rows > 0) {
                            while ($row = $books_result->fetch_assoc()) {
                        ?>
                                <option value="" selected hidden default>Choose a book</option>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['title'] . ' - ' . $row['author']; ?></option>
                        <?php }
                        }; ?>
                    </select>
                </div>
                <div class="form-group col-12 mb-4">
                    <label for="borrower" class="h5 text-white">Borrower:</label>
                    <select name="borrower_id" id="borrower" class="form-control">
                        <?php if ($borrowers_result->num_rows > 0) {
                            while ($row = $borrowers_result->fetch_assoc()) {
                        ?>
                                <option value="" selected hidden default>Choose a user</option>
                                <option value="<?php echo $row['borrowers_id']; ?>"><?php echo $row['name']; ?></option>
                        <?php }
                        }; ?>
                    </select>
                </div>
            </div>


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