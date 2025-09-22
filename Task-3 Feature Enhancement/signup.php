<?php
session_start();
require_once 'backend/db.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare("INSERT INTO users (name,email,password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hash);
    if ($stmt->execute()) {
        $_SESSION['user_id'] = $stmt->insert_id;
        header('Location: index.php');
        exit;
    } else {
        $error = "Error creating account. Email may already exist.";
    }
}

include 'header.php';
?>
<main>
<h1>Sign Up</h1>
<?php if ($error): ?>
<p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>
<form method="POST">
<label for="name">Name:</label>
<input type="text" name="name" id="name" required>
<label for="email">Email:</label>
<input type="email" name="email" id="email" required>
<label for="password">Password:</label>
<input type="password" name="password" id="password" required>
<button type="submit">Sign Up</button>
</form>
</main>
<?php include 'footer.php'; ?>
