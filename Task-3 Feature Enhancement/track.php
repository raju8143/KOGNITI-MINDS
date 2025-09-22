<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
include 'header.php';
?>
<main>
<h1>Track Your Order</h1>
<form action="<?php echo $base_url; ?>/track.php" method="GET">
<label for="order_id">Enter Order ID:</label>
<input type="text" id="order_id" name="order_id" required>
<button type="submit">Track</button>
</form>

<?php if (isset($_GET['order_id'])): ?>
<div class="order-status">
<p><strong>Order ID:</strong> <?php echo htmlspecialchars($_GET['order_id']); ?></p>
<p><strong>Status:</strong> In Transit</p>
<p><strong>Estimated Delivery:</strong> 3-5 Business Days</p>
</div>
<?php endif; ?>
</main>
<?php include 'footer.php'; ?>
