<?php
    $currentPage = 1;

    if (isset($_GET['page']))
    {
        $currentPage = $_GET['page'];
    }

    echo '<ul class="pagination">';
    foreach (range(1,10) as $page)
    {
        if ($page == $currentPage)
        {
            echo '<li class="active"><a href="">',$page,'</a></li>';
        }
        else
        {
            $targetPage = "index.php?page=".$page;
            ?>
                <li><a href=<?php echo $targetPage;?>><?php echo $page;?></a></li>
            <?php
        }
    }
    echo '</ul>';
?>