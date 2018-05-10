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
    <h2>Delete One Data</h2><br>
    <form action="delete.php" method="post">
        <div class="form-group">
            <label for="ticker">Ticker name to delete:</label>
            <input type="text" class="form-control" id="ticker-target" name="ticker-target" required>
            <input name="type" value="search-data" hidden>
        </div>

        <button type="submit" class="btn btn-default">Search</button>
    </form>

    <?php include "delete_method.php"; ?>
</div>
</body>
</html>