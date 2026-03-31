<?php include 'common.php'; include 'header.php'; ?>
<div class="hero-bg py-5 text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Welcome to Lesotho Craft Hub</h1>
        <p class="lead">Discover and buy authentic handmade Basotho crafts online</p>
        <a href="shop.php" class="btn btn-lg btn-warning">Shop Now</a>
    </div>
</div>

<div class="container my-5">
    <h2 class="mb-4">Featured Products</h2>
    <div class="row g-4">
        <?php 
        $featured = array_slice($products, 0, 4); // first 4 products
        foreach ($featured as $p): ?>
            <div class="col-md-3">
                <div class="card product-card h-100">
                    <img src="<?= $p['image'] ?>" class="card-img-top" alt="<?= $p['name'] ?>">
                    <div class="card-body">
                        <h5><?= htmlspecialchars($p['name']) ?></h5>
                        <p class="text-success">LSL <?= number_format($p['price'], 2) ?></p>
                        <a href="product.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include 'footer.php'; ?>