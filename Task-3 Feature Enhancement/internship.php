<?php
session_start();
include 'header.php';

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $qualification = $_POST['qualification'] ?? '';
    $resume = $_POST['resume'] ?? '';

    // Simple validation
    if (empty($name) || empty($email) || empty($phone) || empty($qualification) || empty($resume)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email address.";
    } else {
        // Here you can add code to save to database or send email
        $success = "Thank you, $name! Your internship application has been submitted.";
    }
}
?>

<main>
<h1>Apply for Internship</h1>

<?php if ($error): ?>
<p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>

<?php if ($success): ?>
<p style="color:green;"><?php echo $success; ?></p>
<?php endif; ?>

<form method="POST" action="internship.php">
<label for="name">Name:</label>
<input type="text" name="name" id="name" required>

<label for="email">Email:</label>
<input type="email" name="email" id="email" required>

<label for="phone">Phone Number:</label>
<input type="text" name="phone" id="phone" required>

<label for="qualification">Qualification:</label>
<input type="text" name="qualification" id="qualification" required>

<label for="resume">Resume (URL or text):</label>
<textarea name="resume" id="resume" rows="5" required></textarea>

<button type="submit">Submit Application</button>
</form>
</main>

<?php include 'footer.php'; ?>
