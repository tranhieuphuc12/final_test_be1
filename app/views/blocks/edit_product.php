<?php $checked_may_moc="";$checked_tay_rua="";
 if($category['id'] == 1)$checked_may_moc = "checked";else$checked_tay_rua = "checked"?>
<h1>Edit Product</h1>
<form action="update.php" method="post" enctype="multipart/form-data">

    <input type="text" hidden class="form-control" id="id" name="id" required value="<?php echo $product['id']?>"/>

    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" required value="<?php echo $product['product_name']?>"/>

    <label for="description" class="form-label">Description</label>
    <input type="text" class="form-control" id="description" name="description" required value="<?php echo $product['product_description']?>"/>

    <label for="price" class="form-label">Price</label>
    <input type="number" class="form-control" id="price" name="price" required value="<?php echo $product['product_price']?>"/>

    <label for="photo" class="form-label">Photo</label>
    <img src="../../public/images/<?php echo $product['product_photo']?>" alt="" style="width: 100px;">
    <input type="file" class="form-control" id="photo" name="photo" />
    
    <div class="form-check">
        <input class="form-check-input" type="radio" id="tay_rua" name="category" value="1" <?php echo $checked_tay_rua?>>
        <label class="form-check-label" for="tay_rua">
            Tay Rua
        </label>
    </div>
        
    <div class="form-check">
        <input class="form-check-input" type="radio" id="may_moc" name="category" value = "2" <?php echo $checked_may_moc?>>
        <label class="form-check-label" for="may_moc">
            May Moc
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="../index.php" type="button" class="btn btn-primary">Back</a>
</form>