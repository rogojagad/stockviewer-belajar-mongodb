<?php
    use MongoDB\BSON\Regex;
    if (isset($_POST['ticker']))
    {
        include "required.php";

        $needle = $_POST['ticker'];

        $regex = new Regex($needle, 'm');

        $filter = ['Ticker' => $regex];

        $results = $collection->find($filter);

        $matchedCount = $collection->count($filter);

        $resultStr = "Found ".$matchedCount." data(s)";

        echo '<br>';
        echo $resultStr;
        echo '<br>';
        ?>
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

            foreach ($results as $result)
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
            ?>
            </tbody>
        </table><?php
    }
?>
