<?php
session_start();
require_once 'backend/db.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $mysqli->prepare("SELECT id, name, password FROM users WHERE email=? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();
    $user = $res->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: index.php');
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}

include 'header.php';
?>
<main>
<h1>Login</h1>
<?php if ($error): ?>
<p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>
<form method="POST">
<label for="email">Email:</label>
<input type="email" name="email" id="email" required>
<label for="password">Password:</label>
<input type="password" name="password" id="password" required>
<button type="submit">Login</button>
</form>
</main>
<?php include 'footer.php'; ?>
