<?php 
include 'common.php'; 
include 'header.php'; 

// Exceptional feature: Search + Category filter
$filtered = $products;
if (isset($_GET['search']) && $_GET['search'] !== '') {
    $term = strtolower($_GET['search']);
    $filtered = array_filter($filtered, fn($p) => 
        str_contains(strtolower($p['name']), $term) || 
        str_contains(strtolower($p['description']), $term)
    );
}
if (isset($_GET['category']) && $_GET['category'] !== '') {
    $cat = $_GET['category'];
    $filtered = array_filter($filtered, fn($p) => $p['category'] === $cat);
}
?>
<div class="container my-5">
    <h1 class="mb-4">Our Craft Collection</h1>
    
    <!-- Filter form -->
    <form method="GET" class="row g-3 mb-4">
        <div class="col-md-6">
            <input type="text" name="search" class="form-control" placeholder="Search products..." 
                   value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
        </div>
        <div class="col-md-4">
            <select name="category" class="form-select">
                <option value="">All Categories</option>
                <option value="Textiles" <?= (($_GET['category']??'')=='Textiles')?'selected':'' ?>>Textiles</option>
                <option value="Accessories" <?= (($_GET['category']??'')=='Accessories')?'selected':'' ?>>Accessories</option>
                <option value="Pottery" <?= (($_GET['category']??'')=='Pottery')?'selected':'' ?>>Pottery</option>
                <option value="Jewelry" <?= (($_GET['category']??'')=='Jewelry')?'selected':'' ?>>Jewelry</option>
                <option value="Home Decor" <?= (($_GET['category']??'')=='Home Decor')?'selected':'' ?>>Home Decor</option>
                <option value="Art" <?= (($_GET['category']??'')=='Art')?'selected':'' ?>>Art</option>
            </select>
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100">Filter</button>
        </div>
    </form>

    <div class="row g-4">
        <?php if (empty($filtered)): ?>
            <p class="text-muted">No products found.</p>
        <?php else: ?>
            <?php foreach ($filtered as $p): ?>
                <div class="col-md-4 col-lg-3">
                    <div class="card product-card h-100">
                        <img src="<?= $p['image'] ?>" class="card-img-top" alt="<?= $p['name'] ?>">
                        <div class="card-body">
                            <span class="badge bg-secondary"><?= $p['category'] ?></span>
                            <h5 class="card-title"><?= htmlspecialchars($p['name']) ?></h5>
                            <p class="text-success fw-bold">LSL <?= number_format($p['price'], 2) ?></p>
                            
                            <!-- Add to cart directly from shop -->
                            <form method="POST" action="cart.php" class="d-inline">
                                <input type="hidden" name="id" value="<?= $p['id'] ?>">
                                <input type="hidden" name="action" value="add">
                                <button type="submit" class="btn btn-sm btn-success">Add to Cart</button>
                            </form>
                            <a href="product.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-outline-primary">Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<?php include 'footer.php'; ?>