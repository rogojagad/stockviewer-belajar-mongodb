<?php
    if (isset($_POST['type']))
    {
        include "required.php";
        if ($_POST['type'] == 'search-data')
        {
            $needle = $_POST['ticker-target'];
//            echo $needle;
            $filter = ['Ticker' => $needle];

            $matchedCount = $collection->count($filter);

            if ($matchedCount > 0)
            {
                $results = $collection->find($filter);

                $ticker;
                $sector;
                $country;
                $price;
                $industry;
                $company;

                foreach ($results as $result)
                    $ticker = $result['Ticker'];
                    $sector = $result['Sector'];
                    $country = $result['Country'];
                    $price = $result['Price'];
                    $industry = $result['Industry'];
                    $company = $result['Company'];
                ?>

                <br>
                <h4>Data to be Updated</h4>
                <form method="post" action="update.php">
                    <div class="form-group">
                        <label for="ticker-target">Ticker Name:</label>
                        <input type="text" class="form-control" id="ticker" name="ticker" value=<?php echo $ticker; ?> required>
                        <input name="type" value="update-data" hidden>
                        <input name="ticker-target" value=<?php echo $ticker; ?> hidden>
                    </div>

                    <div class="form-group">
                        <label for="ticker-target">Sector Name:</label>
                        <input type="text" class="form-control" id="sector" name="sector" value=<?php echo $sector; ?> required>
                    </div>

                    <div class="form-group">
                        <label for="ticker-target">Country Name:</label>
                        <input type="text" class="form-control" id="country" name="country" value=<?php echo $country; ?> required>
                    </div>

                    <div class="form-group">
                        <label for="ticker-target">Price:</label>
                        <input type="text" class="form-control" id="price" name="price" value=<?php echo $price; ?> required>
                    </div>

                    <div class="form-group">
                        <label for="ticker-target">Industry Name:</label>
                        <input type="text" class="form-control" id="industry" name="industry" value=<?php echo $industry; ?> required>
                    </div>

                    <div class="form-group">
                        <label for="ticker-target">Company Name:</label>
                        <input type="text" class="form-control" id="company" name="company" value=<?php echo $company; ?> required>
                    </div>

                    <button type="submit" class="btn btn-default">Update</button>
                </form>
                <?php
            }
        }
        elseif ($_POST['type'] == 'update-data')
        {
            $newData = [
                'Ticker' => $_POST['ticker'],
                'Sector' => $_POST['sector'],
                'Country' => $_POST['country'],
                'Price' => $_POST['price'],
                'Industry' => $_POST['industry'],
                'Company' => $_POST['company'],
            ];

            $updateResult = $collection->updateOne(
                ['Ticker' => $_POST['ticker-target']],
                ['$set' => $newData]
            );

            if ($updateResult->getModifiedCount())
            {
                ?>
                <div id="succesModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Update Success</h4>
                            </div>
                            <div class="modal-body">
                                <p>Object ID: </p><?php echo $updateResult->getUpsertedId()?>
                                <p>Ticker: </p><?php echo $_POST['ticker'];?>
                                <p>Sector: </p><?php echo $_POST['sector'];?>
                                <p>Country: </p><?php echo $_POST['country'];?>
                                <p>Price: </p><?php echo $_POST['price'];?>
                                <p>Industry: </p><?php echo $_POST['industry'];?>
                                <p>Company: </p><?php echo $_POST['company'];?>
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
    }
?>