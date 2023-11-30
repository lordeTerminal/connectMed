<?php
session_start();

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

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

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE user_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$query = "SELECT p.post_id, p.content, p.post_date, u.username FROM posts p INNER JOIN users u ON p.user_id = u.user_id WHERE p.user_id = ? ORDER BY p.post_date DESC";
try {
    $stmt = $pdo->prepare($query);
    $stmt->execute([$user_id]);
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching posts: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile</title>
  <link rel="stylesheet" href="feed.css" />
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <div class="conteudo-principal">
      <aside>
        <div class="profile-wrapper">
          <div class="profile-container">
            <div class="img-box">
              <img src="../images/Fundo Mobile Tela Login.svg" alt="imagem de perfil" />
            </div>
            <h1>
              nome
              <?php echo htmlspecialchars($user['username']); ?>
            </h1>
            <p>
              Ocupação:
              <?php echo htmlspecialchars($user['role']); ?>
            </p>
            <p>
              Email:
              <?php echo htmlspecialchars($user['email']); ?>
            </p>
            <p>
              Especialidades:
              <?php echo htmlspecialchars($user['especialidades']); ?>
            </p>
            <p>
              Unidades de Saúde:
              <?php echo htmlspecialchars($user['unidades']); ?>
            </p>
            <p>
              Desde de:
              <?php echo date('F j, Y', strtotime($user['registration_date'])); ?>
            </p>
            <a class="editar-cadastro" href="editarcadastro.html">Editar informações</a>
            <a class="link" href="../recuperar/formrecadastrasenha.html">Trocar Senha</a>
          </div>
        </div>
      </aside>
  
      <main>
        <div class="post-container">
          <div class="post-wrapper">
            <img src="../images/botao-visivel.svg" alt="" />
            <form id="criar-post" method="POST" action="create_post.php">
              <textarea name="post_content" rows="4" cols="50"
                placeholder="O que estou pensando no momento..."></textarea>
              <button class="postar" type="submit">Postar</button>
            </form>
          </div>
        </div>
  
        <div class="posts">
	  <div id="exibir-post">
<?php foreach ($posts as $post): ?>
            <div class="post">
                <p><?php echo $post['content']; ?></p>
                <p>Posted by <?php echo $post['username']; ?> on <?php echo date('F j, Y, g:i a', strtotime($post['post_date'])); ?></p>

                <!-- Display Likes count -->
                <?php
                $query = "SELECT COUNT(like_id) as like_count FROM post_likes WHERE post_id = ?";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$post['post_id']]);
                $likes = $stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                <p>Likes: <?php echo $likes['like_count']; ?></p>

                <!-- Add the Like button with post_id -->
                <form action="like_post.php" method="post">
                    <input type="hidden" name="post_id" value="<?php echo $post['post_id']; ?>">
                    <button type="submit">Like</button>
                </form>
            </div>
        <?php endforeach; ?>

</div>
        </div>

      </main>

    </div>
</body>

</html>
