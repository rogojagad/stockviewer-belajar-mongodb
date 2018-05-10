<?php
    if (isset($_POST['type']))
    {
        include 'required.php';
//        echo $_POST['type'];
        if ($_POST['type'] == 'search-data')
        {
            $needle = $_POST['ticker-target'];

            $filter = ['Ticker' => $needle];

            $matchedCount = $collection->count($filter);

            if ($matchedCount > 0)
            {
                $results = $collection->find($filter);

                foreach ($results as $result)
                {
                    $ticker = $result['Ticker'];
                    $sector = $result['Sector'];
                    $country = $result['Country'];
                    $price = $result['Price'];
                    $industry = $result['Industry'];
                    $company = $result['Company'];
                }
                ?>
                <br>
                <h4>Data to be Updated</h4>
                <form method="post" action="update.php">
                    <div class="form-group">
                        <label for="ticker-target">Ticker Name:</label>
                        <input type="text" class="form-control" id="ticker" name="ticker" value=<?php echo $ticker; ?> required disabled>
                        <input name="type" value="delete-data" hidden>
                        <input name="ticker-target" value=<?php echo $ticker; ?> hidden>
                    </div>

                    <div class="form-group">
                        <label for="ticker-target">Sector Name:</label>
                        <input type="text" class="form-control" id="sector" name="sector" value=<?php echo $sector; ?> required disabled>
                    </div>

                    <div class="form-group">
                        <label for="ticker-target">Country Name:</label>
                        <input type="text" class="form-control" id="country" name="country" value=<?php echo $country; ?> required disabled>
                    </div>

                    <div class="form-group">
                        <label for="ticker-target">Price:</label>
                        <input type="text" class="form-control" id="price" name="price" value=<?php echo $price; ?> required disabled>
                    </div>

                    <div class="form-group">
                        <label for="ticker-target">Industry Name:</label>
                        <input type="text" class="form-control" id="industry" name="industry" value=<?php echo $industry; ?> required disabled>
                    </div>

                    <div class="form-group">
                        <label for="ticker-target">Company Name:</label>
                        <input type="text" class="form-control" id="company" name="company" value=<?php echo $company; ?> required disabled>
                    </div>

                    <button type="submit" class="btn btn-default">Delete</button><br>
                </form>
                <?php
            }
            else{
                echo '<h3>No matching record found</h3>';
            }
        }
        elseif ($_POST['type'] == 'delete-data')
        {
            $filter = ['Ticker' => $_POST['ticker-target']];

            $deleteResult = $collection->deleteOne($filter);

            if ($deleteResult->getDeletedCount() > 0)
            {
                ?>
                <div id="succesModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Delete Success</h4>
                            </div>
                            <div class="modal-body">
                                <p><?php echo $deleteResult->getDeletedCount(); ?> data(s) deleted succesfully</p>
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