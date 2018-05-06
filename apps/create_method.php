<?php
    if (isset($_POST['ticker'])
        && isset($_POST['sector'])
        && isset($_POST['country'])
        && isset($_POST['price'])
        && isset($_POST['industry'])
        && isset($_POST['company'])
    )
    {
        include "required.php";

        $ticker = $_POST['ticker'];
        $sector = $_POST['sector'];
        $country = $_POST['country'];
        $price = $_POST['price'];
        $industry = $_POST['industry'];
        $company = $_POST['company'];

        $insertResult = $collection->insertOne([
            'Ticker' => $ticker,
            'Sector' => $sector,
            'Country' => $country,
            'Price' => $price,
            'Industry' => $industry,
            'Company' => $company,
        ]);

        if ($insertResult->getInsertedCount() > 0)
        {
            ?>
            <div id="succesModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Insert Success</h4>
                        </div>
                        <div class="modal-body">
                            <p>Object ID: </p><?php echo $insertResult->getInsertedId();?>
                            <p>Ticker: </p><?php echo $ticker;?>
                            <p>Sector: </p><?php echo $sector;?>
                            <p>Country: </p><?php echo $country;?>
                            <p>Price: </p><?php echo $price;?>
                            <p>Industry: </p><?php echo $industry;?>
                            <p>Company: </p><?php echo $company;?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>

            <script>
                $('#succesModal').modal('show');
            </script>
            <?php
        }
    }
//    else
//    {
//        echo "waka error";
//    }
?>