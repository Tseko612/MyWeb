<?php 
include 'common.php'; 
include 'header.php'; 

// Process POST actions (add / remove / update)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $id = (int)$_POST['id'];
    
    if ($_POST['action'] === 'add' && isset($products[$id])) {
        $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
    }
    elseif ($_POST['action'] === 'remove') {
        unset($_SESSION['cart'][$id]);
    }
    elseif ($_POST['action'] === 'update' && isset($_POST['qty'])) {
        $qty = max(0, (int)$_POST['qty']);
        if ($qty > 0) $_SESSION['cart'][$id] = $qty;
        else unset($_SESSION['cart'][$id]);
    }
    
    header("Location: cart.php"); // prevent form resubmit
    exit;
}

// Calculate totals
$cart_items = [];
$total = 0;
foreach ($_SESSION['cart'] as $id => $qty) {
    if (isset($products[$id])) {
        $p = $products[$id];
        $subtotal = $p['price'] * $qty;
        $total += $subtotal;
        $cart_items[] = ['product' => $p, 'qty' => $qty, 'subtotal' => $subtotal];
    }
}
?>
<div class="container my-5">
    <h1 class="mb-4">Your Shopping Cart</h1>
    
    <?php if (empty($cart_items)): ?>
        <p>Your cart is empty. <a href="shop.php">Continue shopping</a></p>
    <?php else: ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart_items as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['product']['name']) ?></td>
                    <td>LSL <?= number_format($item['product']['price'], 2) ?></td>
                    <td>
                        <form method="POST" class="d-flex align-items-center" style="max-width:120px;">
                            <input type="hidden" name="id" value="<?= $item['product']['id'] ?>">
                            <input type="hidden" name="action" value="update">
                            <input type="number" name="qty" value="<?= $item['qty'] ?>" min="1" class="form-control form-control-sm me-1">
                            <button type="submit" class="btn btn-sm btn-outline-primary">Update</button>
                        </form>
                    </td>
                    <td>LSL <?= number_format($item['subtotal'], 2) ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?= $item['product']['id'] ?>">
                            <input type="hidden" name="action" value="remove">
                            <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-end">Grand Total</th>
                    <th>LSL <?= number_format($total, 2) ?></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
        <a href="shop.php" class="btn btn-secondary">Continue Shopping</a>
    <?php endif; ?>
</div>
<?php include 'footer.php'; ?>