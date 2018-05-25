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
    <?php include "read_method.php" ?>

    <h2>Stock Data</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Ticker</th>
                <th>Sector</th>
                <th>Country</th>
                <th>Price</th>
                <th>Industry</th>
                <th>Company</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try{
                $results = selectWithPagination($collection);
                
                foreach($results as $result)
                {
                    echo '<tr>';
                    echo '<td>', $result['Ticker'], '</td>';
                    echo '<td>', $result['Sector'], '</td>';
                    echo '<td>', $result['Country'], '</td>';
                    echo '<td>', $result['Price'], '</td>';
                    echo '<td>', $result['Industry'], '</td>';
                    echo '<td>', $result['Company'], '</td>';
                    echo '</tr>';
                }
            } catch(Exception $error){
                echo $error->message;
            }
            ?>
        </tbody>
    </table>

    <?php include "pagination.php"?>
</div>
</body>
</html>