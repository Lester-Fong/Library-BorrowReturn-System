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
        <form action="borrower_process.php?borrowers_id=<?php echo $id ?>" method="POST">
            <?php
            if (isset($_GET['borrowers_id']) && $_GET['borrowers_id'] !== '') {
                include 'db_connection.php';
                $sql = "SELECT * FROM borrowers WHERE borrowers_id=" . $_GET['borrowers_id'];
                $result = $sql_connection->query($sql);
                $row = $result->fetch_assoc(); // Fetch the row from the result set
            ?>
                <div class="row">
                    <div class="form-group col-12 mb-4">
                        <label for="name" class="h5 text-white">Name:</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>">
                    </div>

                    <div class="form-group col-12 mb-4">
                        <label for="email" class="h5 text-white">Email:</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $row['email']; ?>">
                    </div>

                    <div class="form-group col-12 mb-4">
                        <label for="mobile" class="h5 text-white">Mobile:</label>
                        <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $row['mobile']; ?>">
                    </div>
                </div>

            <?php } else { ?>
                <div class="row">
                    <div class="form-group col-12 mb-4">
                        <label for="name" class="h5 text-white">Name:</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>

                    <div class="form-group col-12 mb-4">
                        <label for="email" class="h5 text-white">Email:</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>

                    <div class="form-group col-12 mb-4">
                        <label for="mobile" class="h5 text-white">Mobile:</label>
                        <input type="text" class="form-control" name="mobile" id="mobile">
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