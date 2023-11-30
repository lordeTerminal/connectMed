

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Feed</title>
  <link rel="stylesheet" href="feed.css" />
</head>

<body>
  <header>
    <div class="logo-box">
      <img class="logo" src="../images/iconelogoverde.svg" alt="" />
    </div>
    <div class="img-menu-box" onclick="openSlideInContent()">
      <img class="imagem-perfil" src="../images/iconelogoverde.svg" alt="" />
    </div>
    <nav class="nav-desktop">
      <a href="#" onclick="loadContent('../feed/profile.php', 'content')"> <img src="../images/home.svg" alt="Ícone feed"> feed</a>
      <a href="#" onclick="loadContent('../buscar/buscar.html', 'content')"> <img src="../images/lupa.svg" alt="Ícone pesquisar"> Pesquisar</a>
      <a href="#" onclick="loadContent('../mensagens/user_list.php', 'content')"> <img src="../images/mensagens.svg" alt="Ícone mensagens"> Mensagens</a>
    </nav>
    <nav class="nav-mobile">
      <a href="#" onclick="loadContent('../feed/profile.php', 'content')"> <img src="../images/home.svg" alt="Ícone feed"></a>
      <a href="#" onclick="loadContent('../buscar/buscar.html', 'content')"> <img src="../images/lupa.svg" alt="Ícone pesquisar"></a>
      <a href="#" onclick="loadContent('../mensagens/user_list.php', 'content')"> <img src="../images/mensagens.svg" alt="Ícone mensagens"></a>
    </nav>
  </header>
  <section id="content"></section>
  <div id="slideInContent">
    <div id="closeButton" onclick="closeSlideInContent()">X</div>
    <div id="slideInInnerContent"></div>
  </div>

  <script>
    async function loadContent(filename, targetElementId) {
      var targetElement = document.getElementById(targetElementId);
      try {
        const response = await fetch(filename);
        if (response.ok) {
          const text = await response.text();
          targetElement.innerHTML = text;
        } else {
          console.error('Falha ao carregar o conteúdo.');
        }
      } catch (error) {
        console.error('Erro ao carregar o conteúdo:', error);
      }
    }

    function openSlideInContent() {
      console.log('Clique na div img-menu-box');
      var slideInContent = document.getElementById('slideInContent');
      slideInContent.style.left = '0';
      loadContent('../feed/profilemobile.html', 'slideInInnerContent');
    }

    function closeSlideInContent() {
      var slideInContent = document.getElementById('slideInContent');
      slideInContent.style.left = '-80%';
    }
  </script>
</body>

</html>
