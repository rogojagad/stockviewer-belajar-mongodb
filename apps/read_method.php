<?php
    include 'required.php';

    function selectWithPagination($collection, $skip = 1)
    {
        $dataPerPage = 20;

        if(isset($_GET['page']))
        {
            $skip = $_GET['page'];
        }

        $skip_val = ($skip - 1) * $dataPerPage;

        $results = $collection->find(
            [],
            [
                'limit' => $dataPerPage,
                'skip' => $skip_val,

            ]
        );

        return $results;
    }
?>