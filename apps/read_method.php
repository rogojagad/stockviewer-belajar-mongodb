<?php
    include 'required.php';

    function selectWithPagination($collection, $skip = 1)
    {
        $dataPerPage = 20;

        if(isset($_GET['page']))
        {
            $skip = $_GET['page'];
        }

        $skipVal = ($skip - 1) * $dataPerPage;

        $results = $collection->find(
            [],
            [
                'limit' => $dataPerPage,
                'skip' => $skipVal,
            ]
        );

//        var_dump($results);
        return $results;
    }
?>