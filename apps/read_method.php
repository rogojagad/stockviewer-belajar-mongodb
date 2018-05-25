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

        try{
            $results = $collection->find(
                [],
                [
                    'limit' => $dataPerPage,
                    'skip' => $skipVal,
                ]
            );
        } catch(Exception $error) {
            echo $error->message;
            die(1);
        }
        
        return $results;
    }
?>