<?php 
include 'common.php'; 
include 'header.php'; 

if (!isset($_GET['id']) || !isset($products[$_GET['id']])) {
    echo '<div class="container my-5"><h2>Product not found</h2></div>';
    include 'footer.php'; exit;
}
$p = $products[$_GET['id']];
?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= $p['image'] ?>" class="img-fluid rounded shadow" alt="<?= $p['name'] ?>">
        </div>
        <div class="col-md-6">
            <h1><?= htmlspecialchars($p['name']) ?></h1>
            <span class="badge bg-primary fs-5"><?= $p['category'] ?></span>
            <h3 class="text-success mt-3">LSL <?= number_format($p['price'], 2) ?></h3>
            <p class="lead"><?= htmlspecialchars($p['description']) ?></p>
            
            <form method="POST" action="cart.php">
                <input type="hidden" name="id" value="<?= $p['id'] ?>">
                <input type="hidden" name="action" value="add">
                <button type="submit" class="btn btn-lg btn-success">Add to Cart</button>
            </form>
            <a href="shop.php" class="btn btn-outline-secondary mt-3">← Back to Shop</a>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>