<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <?php foreach ($products as $product) { ?>
                    <div class="col-md-3 mb-2">
                        <div class="card text-start">
                            <img class="card-img-top" src="public/images/<?php echo $product['product_photo'] ?>"
                                alt="Title" />
                            <div class="card-body">
                                <a class="card-title" href="detail.php?id=<?php echo $product['id'] ?>">
                                    <?php echo $product['product_name'] ?>
                                </a>
                                <p class="card-text">
                                    <?php echo $product['product_price'] ?>$
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            $pages = ceil($total / $perPage); 
            $href ="";   
            if (isset($_GET['category_id'])) {
                $href = "&category_id=".$_GET['category_id'];
            }elseif (isset($_GET['search'])) {
                $href = "&search=".$_GET['search'];
            }     
            for ($i = 1; $i <= $pages; $i++):                                                             
                ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $i . $href?>">
                        <?php echo $i ?>
                    </a></li>
                <?php
            endfor;
            ?>
        </ul>
    </nav>

</div>