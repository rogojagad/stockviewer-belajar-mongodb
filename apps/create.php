<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include "header.php"; ?>
    <title>StockViewer</title>
</head>
<body>
<?php include "navbar.php" ?>

    <div class="container">
        <h2>Insert New Stock</h2>
        <?php include "create_method.php"?>
        <br>
        <form action="create.php" method="post">
            <div class="form-group">
                <label for="ticker">Ticker name:</label>
                <input type="text" class="form-control" id="ticker" name="ticker" required>
            </div>
            <div class="form-group">
                <label for="sector">Sector:</label>
                <input type="text" class="form-control" id="sector" name="sector" required>
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control" id="country" name="country" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="industry">Industry:</label>
                <input type="text" class="form-control" id="industry" name="industry" required>
            </div>
            <div class="form-group">
                <label for="company">Company:</label>
                <input type="text" class="form-control" id="company" name="company" required>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</body>
</html>