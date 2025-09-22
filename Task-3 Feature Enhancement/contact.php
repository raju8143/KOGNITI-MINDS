<?php
session_start();
include 'header.php';

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    // Simple validation
    if (empty($name) || empty($email) || empty($message)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email address.";
    } else {
        // Here you can add code to save to database or send email
        $success = "Thank you, $name! Your message has been sent.";
    }
}
?>

<main>
<h1>Contact Us</h1>

<?php if ($error): ?>
<p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>

<?php if ($success): ?>
<p style="color:green;"><?php echo $success; ?></p>
<?php endif; ?>

<form method="POST" action="contact.php">
<label for="name">Name:</label>
<input type="text" name="name" id="name" required>

<label for="email">Email:</label>
<input type="email" name="email" id="email" required>

<label for="message">Message:</label>
<textarea name="message" id="message" rows="5" required></textarea>

<button type="submit">Send Message</button>
</form>
</main>

<?php include 'footer.php'; ?>
