<form method="post" enctype="multipart/form-data">

    <?php if (isset($flower['img'])): ?>
        <img src="<?php echo $flower['img'] ?>" class="product-img-view">
    <?php endif; ?>

    <div class="form-group">
        <label>Flower Image</label><br>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control"
               value="<?php echo isset($flower['name']) ? $flower['name'] : "" ?>">
    </div>
    <div class="form-group">
        <label>Description</label>
        <input class="form-control" type="text" name="description"
               value="<?php echo isset($flower['description']) ? $flower['description'] : "" ?>">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
