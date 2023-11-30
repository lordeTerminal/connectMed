<?php
session_start();

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit();
    }

    $user_id = $_SESSION['user_id'];

    // Ensure post_id is set and not empty
    $post_id = isset($_POST['post_id']) ? $_POST['post_id'] : null;
    $post_id = filter_var($post_id, FILTER_VALIDATE_INT);

    if ($post_id !== false && $post_id !== null) {
        try {
            // Simplified query for testing
            $query = "INSERT INTO post_likes (user_id, post_id) VALUES (?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$user_id, $post_id]);
        } catch (PDOException $ex) {
            die("Error: " . $ex->getMessage());
        }
    }

    // Redirect back to the profile page
    header('Location: profile.php');
    exit();
} else {
    header('Location: index.php');
    exit();
}
?>

