<h1>Add Product</h1>
<form action="store.php" method="post" enctype="multipart/form-data">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" required />

    <label for="description" class="form-label">Description</label>
    <input type="text" class="form-control" id="description" name="description" required />

    <label for="price" class="form-label">Price</label>
    <input type="number" class="form-control" id="price" name="price" required />

    <label for="photo" class="form-label">Photo</label>
    <input type="file" class="form-control" id="photo" name="photo" />

    <div class="form-check">
        <input class="form-check-input" type="radio" id="tay_rua" name="category" value="1" checked>
        <label class="form-check-label" for="tay_rua">
            Tay Rua
        </label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" id="may_moc" name="category" value = "2">
        <label class="form-check-label" for="may_moc">
            May Moc
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="../index.php" type="button" class="btn btn-primary">Back</a>
</form>