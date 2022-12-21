<nav>
    <h1>Product Add</h1>
    <div>
        <button type="submit" form="product_form" id='save-product-btn'>Save</button>
        <a href='/'><button id="cencel-btn">Cancel</button></a>
    </div>
</nav>
<hr />
<?php if (!empty($warnings)) : ?>
    <div class="warnings">
        <?php foreach ($warnings as $warning) : ?>
            <p><?= $warning ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<form id='product_form' method="POST">
    <div class="main">
        <label for="sku">SKU</label>
        <input type="text" placeholder='Enter product SKU' name="sku" id="sku" value="<?php echo $_POST['sku'] ?? '' ?>" />
    </div>
    <div class="main">
        <label for="name">Name</label>
        <input type="text" placeholder='Enter product Name' name="name" id="name" value="<?php echo $_POST['name'] ?? '' ?>" />
    </div>
    <div class="main">
        <label for="price">Price ($)</label>
        <input type="number" placeholder='Enter product Price' name="price" id="price" step=".01" value="<?php echo $_POST['price'] ?? '' ?>" />
    </div>
    <div class="choice">
        <label for="type">Type Switcher:</label>
        <select name="type" id="productType">
            <option value="typeswitcher" id='typeswitcher'>Type Switcher</option>
            <option value="Book" id='Book'>Book</option>
            <option value="Disc" id='DVD'>DVD-disc</option>
            <option value="Furniture" id='Furniture'>Furniture</option>
        </select>
    </div>
    <div class="Book-container">
        <div class='book'>
            <label for="weight">Weight (KG)</label>
            <input type="number" placeholder='Enter product Weight' name="weight" id="weight" value="<?php echo $_POST['weight'] ?? '' ?>" />
        </div>
        <br />
        <p class='hint'>Please, provide weight</p>
    </div>
    <div class="Disc-container">
        <div class='disc'>
            <label for="size">Size (MB)</label>
            <input type="number" placeholder='Enter product Size' name="size" id="size" value="<?php echo $_POST['size'] ?? '' ?>" />
        </div>
        <br />
        <p class='hint'>Please, provide size</p>
    </div>
    <div class="Furniture-container">
        <div class="height">
            <label for="height">Height (CM)</label>
            <input type="number" placeholder='Enter product Height' name="height" id="height" value="<?php echo $_POST['height'] ?? '' ?>" />
        </div>
        <div class="width">
            <label for="width">Width (CM)</label>
            <input type="number" placeholder='Enter product Width' name="width" id="width" value="<?php echo $_POST['width'] ?? '' ?>" />
        </div>
        <div class="length">
            <label for="length">Lenght (CM)</label>
            <input type="number" placeholder='Enter product Length' name="length" id="length" value="<?php echo $_POST['length'] ?? '' ?>" />
        </div>
        <br />
        <p class='hint'>Please, provide dimensions</p>
    </div>
</form>