<?php
session_start();
$user = null;
$base_url = 'http://localhost/task3kognitiminds';


if (!empty($_SESSION['user_id'])) {
    require_once __DIR__ . '/backend/db.php';
    $stmt = $mysqli->prepare('SELECT id, name, email FROM users WHERE id=? LIMIT 1');
    $stmt->bind_param('i', $_SESSION['user_id']);
    $stmt->execute();
    $res = $stmt->get_result();
    $user = $res->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kogniti Minds</title>
<link rel="stylesheet" href="<?php echo $base_url; ?>/css/style.css">
<script src="<?php echo $base_url; ?>/js/main.js" defer></script>
</head>
<body>
<header>
<nav>
<a href="<?php echo $base_url; ?>/index.php">Home</a> |
<a href="<?php echo $base_url; ?>/reviews.php">Reviews</a> |
<a href="<?php echo $base_url; ?>/contact.php">Contact</a> |
<a href="<?php echo $base_url; ?>/internship.php">Apply for Internships</a> |
<a href="<?php echo $base_url; ?>/track.php">Track Order</a> |

<?php if ($user): ?>
<a href="<?php echo $base_url; ?>/orders.php">My Orders</a> |
<span>Hello, <?php echo htmlspecialchars($user['name']); ?></span> |
<a href="<?php echo $base_url; ?>/backend/logout.php">Logout</a>
<?php else: ?>
<a href="<?php echo $base_url; ?>/signup.php">Sign Up</a> |
<a href="<?php echo $base_url; ?>/login.php">Login</a>
<?php endif; ?>
</nav>
</header>
