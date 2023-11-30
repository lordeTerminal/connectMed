<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two-Step Verification</title>
</head>
<body>
    <h2>Two-Step Verification</h2>

    <!-- Form for key generation -->
    <form action="generate_key.php" method="post">
        <button type="submit">Generate Key</button>
    </form>

    <!-- Form for code verification -->
    <form action="verify_code.php" method="post">
        <label for="key">Key:</label>
        <input type="text" id="key" name="key" required>
        <label for="inputCode">Enter Code:</label>
        <input type="text" id="inputCode" name="inputCode" required>
        <button type="submit">Verify Code</button>
    </form>
</body>
</html>

