<?php
session_start();

// Check if the user is logged in; if not, redirect to the login page
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Database connection code (similar to login.php)
$host = 'localhost';
$username = 'root';
$password = 'golimar10*';
$database = 'saudeosasco';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Fetch user data from the database
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE user_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$query = "SELECT p.content, p.post_date, u.username FROM posts p INNER JOIN users u ON p.user_id = u.user_id WHERE p.user_id = ? ORDER BY p.post_date DESC";

try {
    $stmt = $pdo->prepare($query);
    $stmt->execute([$user_id]);
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching posts: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <style>
        /* Add CSS styling if needed */
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Your Profile, <?php echo htmlspecialchars($user['username']); ?></h1>
        <p>Your Role: <?php echo htmlspecialchars($user['role']); ?></p>
    </header>
    <aside>
        <h2>Sidebar</h2>
        <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
        <p>Join Date: <?php echo date('F j, Y', strtotime($user['registration_date'])); ?></p>
    </aside>
    <main>
        <a href="criar_post.html">Postar</a>

        <!-- Display user's posts -->
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <p><?php echo $post['content']; ?></p>
                <p>Posted by <?php echo $post['username']; ?> on <?php echo date('F j, Y, g:i a', strtotime($post['created_at'])); ?></p>
            </div>
        <?php endforeach; ?>
    </main>
</body>
</html>

