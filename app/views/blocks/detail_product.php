<div class="row">
    <div class="col-md-3 mb-2">
        <div class="card text-start">
            <img class="card-img-top" src="public/images/<?php echo $product['product_photo'] ?>" alt="Title" />
            <div class="card-body">

            </div>
        </div>
    </div>
    <div class="col-md-9">
        <h1>
            <?php echo $product['product_name'] ?>
        </h1>

        <p>
            <?php echo $product['product_description'] ?>
        </p>
        <h2>
            <?php echo $product['product_price'] ?>$
        </h2>
    </div>
</div>