<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
</head>

<body>
    <h1>Contact Us</h1>
    <form action="contact_process.php" method="POST">
        <label for="name">Your Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Your Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="message">Your Message:</label><br>
        <textarea id="message" name="message" rows="4" required></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>