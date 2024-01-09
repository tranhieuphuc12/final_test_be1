<h1>Manage Products</h1>
<div><a type="button" href="products/create.php" class="btn btn-primary">ADD</a></div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Photo</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) :?>
            <tr class="">
                <td scope="row"><?php echo $product['id']?></td>
                <td><?php echo $product['product_name']?></td>
                <td><?php echo $product['product_description']?></td>
                <td><?php echo $product['product_price']?></td>
                <td><img src="../public/images/<?php echo $product['product_photo']?>" class="img-fluid"></td>
                <td><a onclick="return confirm('You wanna delete this product ??')" type="button" href="products/destroy.php?id=<?php echo $product['id']?>" class="btn btn-danger">Delete</a>
                <a type="button" href="products/edit.php?id=<?php echo $product['id']?>" class="btn btn-warning">Edit</a>
                    </td>
            </tr>
                <?php endforeach;?>
        </tbody>
    </table>
</div>