//exibir e ocultar senha

function senhaVisivel(inputId, mostrarImgClass, esconderImgClass) { //função para alterar a visibilidade da senha com os parâmetros do id do campo da senha, classe da imagem que mostra a senha e classe da imagem que oculta a senha
    var passwordInput = document.getElementById(inputId); // variável para acessar e manipular o elemento input da senha pelo id
    var mostrarPasswordImg = document.querySelector("." + mostrarImgClass); // variável para acessar e manipular a imagem do botão de mostrar senha pela classe
    var esconderPasswordImg = document.querySelector("." + esconderImgClass); // variável para acessar e manipular a imagem do botão de ocultar pela classe
  
    if (passwordInput.type === "password") { // verifica se o input da senha é === password, se for verdade, a senha está oculta
      passwordInput.type = "text"; // Altera o tipo do input da senha para "text", para que o texto digitado seja exibido na forma de texto legível
      mostrarPasswordImg.style.display = "none"; //Define a imagem do botão de mostrar senha como "display: none", para que fique invisível
      esconderPasswordImg.style.display = "inline"; //Define a imagem do botão de ocultar senha como "display: inline", para que fique visível.
    } else { // se o if for falso a senha está sendo exibida
      passwordInput.type = "password"; //volta a ser lido de forma oculta como password
      mostrarPasswordImg.style.display = "inline"; //Define a imagem do botão de mostrar senha como "display: inline", para que fique visível.
      esconderPasswordImg.style.display = "none"; //Define a imagem do botão de mostrar senha como "display: inline", para que fique visível.
    }
  
  }

  function verificarSenhas() {
    var senhaCriada = document.getElementById("password").value;
    var senhaConfirmada = document.getElementById("confirm-password").value;
  
    var registroEfetuadoDiv = document.querySelector(".senha-errada");
  
    if (senhaCriada === senhaConfirmada) {
      // Senhas conferem, então remova a mensagem
      registroEfetuadoDiv.innerHTML = "";
  
      // Redireciona o usuário para a página feed.html
      window.location.href = "https://connectosasco.com.br/feed.html";
    } else {
      // Senhas não conferem, exiba a mensagem
      registroEfetuadoDiv.innerHTML = "<br>As senhas não conferem!<br>";
    }
  }
  