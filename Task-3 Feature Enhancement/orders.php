<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

include 'header.php';
require_once 'backend/db.php';

// Fetch user's orders
$user_id = $_SESSION['user_id'];
$stmt = $mysqli->prepare("SELECT order_id, product_name, status, order_date FROM orders WHERE user_id=? ORDER BY order_date DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<main>
<h1>My Orders</h1>

<?php if ($result->num_rows > 0): ?>
<table border="1" cellpadding="10" cellspacing="0" style="width:100%; border-collapse:collapse;">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Product Name</th>
            <th>Status</th>
            <th>Order Date</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['order_id']); ?></td>
            <td><?php echo htmlspecialchars($row['product_name']); ?></td>
            <td><?php echo htmlspecialchars($row['status']); ?></td>
            <td><?php echo htmlspecialchars($row['order_date']); ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php else: ?>
<p>You have no orders yet.</p>
<?php endif; ?>

</main>

<?php include 'footer.php'; ?>
