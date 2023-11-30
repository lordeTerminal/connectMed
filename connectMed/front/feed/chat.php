<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = 'golimar10*';
$database = 'saudeosasco';

// Attempt to connect to the database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Get the user information
$user_id = $_SESSION['user_id'];

// Check if a chat partner is selected
if (isset($_GET['partner_id'])) {
    $partner_id = $_GET['partner_id'];

    // Fetch the partner's information
    $query = "SELECT username FROM users WHERE user_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$partner_id]);
    $partner = $stmt->fetch(PDO::FETCH_ASSOC);

    // Fetch initial chat history
    $chatHistory = fetchChatHistory($pdo, $user_id, $partner_id);
} else {
    // If no partner is selected, display a message
    $partner = null;
    $chatHistory = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with <?php echo $partner ? $partner['username'] : 'Select a Chat Partner'; ?></title>
    <!-- Add your CSS styling here -->
    <style>
/* Add your CSS styles for chat messages */
#chat-box {
    max-height: calc(100vh - 80px); /* Adjust based on your header/footer heights */
    overflow-y: auto;
    margin-bottom: 20px;
    display: flex;
    flex-direction: column-reverse; /* Reverse the order of messages */
    align-items: flex-start; /* Align items to the left by default */
}

.chat-message {
    background-color: #f1f1f1;
    border-radius: 10px;
    padding: 10px;
    margin: 5px;
    max-width: 70%; /* Adjust based on your design preference */
    text-align: left; /* Align text to the left by default */
}

/* Reverse the order of the messages to display them in descending order */
.chat-message.sender {
    align-self: flex-start; /* Align sender messages to the left */
}

.chat-message.receiver {
    align-self: flex-end; /* Align receiver messages to the right */
}
      #chat-form {
    position: fixed;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 80%; /* Adjust the width based on your design */
    max-width: 400px; /* Set a maximum width if needed */
    background-color: #f1f1f1;
    padding: 15px;
    box-sizing: border-box;
    border-top: 1px solid #ccc;
    display: flex;
    align-items: center;
}
 
	/* Add your CSS styles for chat messages */
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            function updateChat() {
                $.ajax({
                    url: 'fetch_messages.php',
                    method: 'POST',
                    data: { partner_id: <?php echo $partner_id; ?> },
                    success: function(response) {
                        $('#chat-box').html(response);
                    },
                    complete: function() {
                        setTimeout(updateChat, 5000); // Schedule the next update after a delay (e.g., every 5 seconds)
                    }
                });
            }

            // Initial update
            updateChat();

            // Add your additional JavaScript for sending messages if needed
        });
    </script>
</head>
<body>
    <header>
	<h1>Chat with <?php echo $partner ? $partner['username'] : 'Select a Chat Partner'; ?></h1><br>
<a href="profile.php">Voltar para perfil</a><br>
<a href="user_list.php">Falar com Amigos</a><br>

    </header>
    <main>
        <div id="chat-box">
            <?php foreach ($chatHistory as $chat): ?>
                <div class="chat-message">
                    <p><?php echo $chat['sender_username']; ?> to <?php echo $chat['receiver_username']; ?> at <?php echo $chat['timestamp']; ?></p>
                    <p><?php echo $chat['message']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <?php if ($partner): ?>
            <!-- Chat form -->
            <form id="chat-form">
                <input type="hidden" name="receiver" value="<?php echo $partner_id; ?>">
                <label for="message">Message:</label>
                <textarea name="message" id="message" rows="4" cols="50" required></textarea>
                <br>
                <button type="submit">Send Message</button>
            </form>
        <?php else: ?>
            <p>Select a user to start a chat.</p>
        <?php endif; ?>
    </main>



<script>
    $(document).ready(function() {
        function updateChat() {
            $.ajax({
                url: 'fetch_messages.php',
                method: 'POST',
                data: { partner_id: <?php echo $partner_id; ?> },
                success: function(response) {
                    $('#chat-box').html(response);
                },
                complete: function() {
                    setTimeout(updateChat, 5000); // Schedule the next update after a delay (e.g., every 5 seconds)
                }
            });
        }

        // Initial update
        updateChat();

        // Add your additional JavaScript for sending messages if needed
        $('#chat-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: 'send_message.php',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    // Optionally handle success response
                    updateChat(); // Update chat after sending a message
                }
            });
            // Clear the message input after sending
            $('#message').val('');
        });
    });
</script>

</body>
</html>

<?php
function fetchChatHistory($pdo, $user_id, $partner_id) {
    $query = "
        SELECT c.message, c.timestamp, u.username AS sender_username, ur.username AS receiver_username
        FROM chats c
        INNER JOIN users u ON c.sender_id = u.user_id
        INNER JOIN users ur ON c.receiver_id = ur.user_id
        WHERE (c.sender_id = ? AND c.receiver_id = ?) OR (c.sender_id = ? AND c.receiver_id = ?)
        ORDER BY c.timestamp ASC";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$user_id, $partner_id, $partner_id, $user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

