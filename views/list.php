<nav>
    <h1>Product List</h1>
    <div>
        <a href='/add-product'><button id="add-product-btn">ADD</button></a>
        <button type="submit" form="delete_form" id='delete-product-btn'>MASS DELETE</button>
    </div>
</nav>
<hr />
<form action="/delete" method="POST" id="delete_form">
    <div class='products-container'>
        <?php foreach ($products as $product) : ?>
            <div class='product'>
                <div class='product-info'>
                    <div class='select-product'>
                        <input type="checkbox" class='delete-checkbox' name="products[]" value="<?= $product['id'] ?>" />
                    </div>
                    <div class='product-description'>
                        <span><?php echo $product['sku'] ?></span>
                        <span><?php echo $product['name'] ?></span>
                        <span><?php echo $product['price'] . " $" ?></span>
                        <span><?php echo $product['value'] ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</form>