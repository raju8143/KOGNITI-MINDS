<?php
session_start();
$user = null;
if (!empty($_SESSION['user_id'])) {
    require_once __DIR__.'/backend/db.php';
    $stmt = $mysqli->prepare('SELECT id,name,email FROM users WHERE id=? LIMIT 1');
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

    <!-- SEO Meta Tags -->
    <title>Kogniti Minds | Internships, Orders & Contact</title>
    <meta name="description" content="Kogniti Minds platform to apply for internships, track orders, read reviews, and contact us.">
    <meta name="keywords" content="Kogniti Minds, internships, order tracking, reviews, contact">
    <meta name="author" content="Kogniti Minds">

    <!-- Google Search Console Verification -->
    <meta name="google-site-verification" content="6pjwvsBLQlU8Lw7w259mIo93kyUyBN_2j7PPBq" />

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KMKGENZ4T5"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-KMKGENZ4T5');  // Replace with your real GA code
    </script>

    <!-- Styles -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
  <nav>
    <a href="index.php">Home</a>
    <a href="reviews.php">Reviews</a>
    <a href="contact.php">Contact</a>
    <a href="internship.php">Apply for Internship</a>
    <a href="track.php">Track Order</a>

    <?php if($user): ?>
      <a href="orders.php">My Orders</a>
      <span>Hello, <?php echo htmlspecialchars($user['name']); ?></span>
      <a href="backend/logout.php">Logout</a>
    <?php else: ?>
      <a href="signup.php">Sign Up</a>
      <a href="login.php">Login</a>
    <?php endif; ?>
</nav>

</header>
