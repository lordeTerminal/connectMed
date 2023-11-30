  const imageInput = document.getElementById('imageInput');
  const selectedImage = document.getElementById('selectedImage');
  
  imageInput.addEventListener('change', function (event) {
    const file = event.target.files[0];
  
    if (file) {
      const reader = new FileReader();
  
      reader.onload = function (e) {
        selectedImage.src = e.target.result;
      };
  
      reader.readAsDataURL(file);
    } else {
      selectedImage.src = '';
    }
  });

// adicionar especialidades especialidades
  function addSpecialty() {
    const specialtyInput = document.getElementById('specialityInput');
    const specialtyList = document.getElementById('specialityList');
  
    const specialtyText = specialtyInput.value.trim();
  
    if (specialtyText !== '') {
      const specialtyItem = document.createElement('div');
      specialtyItem.className = 'specialityItem';
  
      const specialtyTextElement = document.createElement('span');
      specialtyTextElement.className = 'specialityText';
      specialtyTextElement.textContent = specialtyText;
  
      const removeSpecialtyIcon = document.createElement('span');
      removeSpecialtyIcon.className = 'removeSpeciality';
      removeSpecialtyIcon.textContent = 'x';
      removeSpecialtyIcon.addEventListener('click', function () {
        specialtyItem.remove();
      });
  
      specialtyItem.appendChild(specialtyTextElement);
      specialtyItem.appendChild(removeSpecialtyIcon);
  
      specialtyList.appendChild(specialtyItem);
      specialtyInput.value = '';
    }
  }
  
  function removeSpecialty(element) {
    element.parentNode.remove();
  }

  document.getElementById('registrar').addEventListener('submit', function (event) {
    event.preventDefault(); // Previne o comportamento padrão de recarregar a página
  
    // Adiciona a especialidade
    addSpecialty();
  });

  // adicionar unidades
  function addUnidade() {
    const unidadeInput = document.getElementById('unidadeInput');
    const unidadeList = document.getElementById('unidadeList');
  
    const unidadeText = unidadeInput.value.trim();
  
    if (unidadeText !== '') {
      const unidadeItem = document.createElement('div');
      unidadeItem.className = 'unidadeItem';
  
      const unidadeTextElement = document.createElement('span');
      unidadeTextElement.className = 'unidadeText';
      unidadeTextElement.textContent = unidadeText;
  
      const removeUnidadeIcon = document.createElement('span');
      removeUnidadeIcon.className = 'removeUnidade';
      removeUnidadeIcon.textContent = 'x';
      removeUnidadeIcon.addEventListener('click', function () {
        unidadeItem.remove();
      });
  
      unidadeItem.appendChild(unidadeTextElement);
      unidadeItem.appendChild(removeUnidadeIcon);
  
      unidadeList.appendChild(unidadeItem);
      unidadeInput.value = '';
    }
  }
  
  function removeUnidade(element) {
    element.parentNode.remove();
  }

  document.getElementById('registrar').addEventListener('submit', function (event) {
    event.preventDefault(); // Previne o comportamento padrão de recarregar a página
  
    // Adiciona a especialidade
    addUnidade();
  });

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

/*
//verificar validade das senhas
function verificarSenhas() {
  var senhaCriada = document.getElementById("password").value;
  var senhaConfirmada = document.getElementById("confirm-password").value;

  var registroEfetuadoDiv = document.querySelector(".senha-errada");

  if (senhaCriada === senhaConfirmada) {
    // Senhas conferem, então remova a mensagem
    registroEfetuadoDiv.innerHTML = "";
    nextStep(1);
  } else {
    // Senhas não conferem, exiba a mensagem
    registroEfetuadoDiv.innerHTML = "<br>As senhas não conferem!<br>";
  }
}

//seguir para o próximo formulário
function nextStep(step) {
  document.getElementById(`step-${step}`).classList.remove('visible');
  currentStep = step + 1;
  const nextStepElement = document.getElementById(`step-${currentStep}`);
  if (nextStepElement) {
    nextStepElement.classList.add('visible');
  }
}

function prevStep(step) {
  document.getElementById(`step-${step}`).classList.remove('visible');
  currentStep = step - 1;
  const prevStepElement = document.getElementById(`step-${currentStep}`);
  if (prevStepElement) {
    prevStepElement.classList.add('visible');
  }
}*/

let currentStep = 1;

function checkRequiredFields(step) {
  const requiredFields = document.querySelectorAll(`#step-${step} [required]`);
  for (const field of requiredFields) {
    if (!field.value.trim()) {
      return false;
    }
  }
  return true;
}

function showErrorMessage(message) {
  const errorDiv = document.querySelector(".error-message");
  errorDiv.textContent = message;
  errorDiv.style.display = "block";

  // Ocultar a mensagem de erro após alguns segundos (opcional)
  setTimeout(() => {
    errorDiv.style.display = "none";
  }, 3000); // 3000 milissegundos (3 segundos)
}

function verificarSenhas() {
  var senhaCriada = document.getElementById("password").value;
  var senhaConfirmada = document.getElementById("confirm-password").value;
  var registroEfetuadoDiv = document.querySelector(".senha-errada");

  if (senhaCriada === senhaConfirmada) {
    // Senhas conferem, então remova a mensagem
    registroEfetuadoDiv.innerHTML = "";

    // Verificar campos obrigatórios antes de avançar
    if (checkRequiredFields(currentStep)) {
      nextStep(currentStep);
    } else {
      showErrorMessage("Preencha todos os campos obrigatórios.");
    }
  } else {
    // Senhas não conferem, exiba a mensagem
    registroEfetuadoDiv.innerHTML = "<br>As senhas não conferem!<br>";
  }
}

function nextStep(step) {
  // Verificar campos obrigatórios antes de avançar
  if (checkRequiredFields(step)) {
    document.getElementById(`step-${step}`).classList.remove('visible');
    currentStep = step + 1;
    const nextStepElement = document.getElementById(`step-${currentStep}`);
    if (nextStepElement) {
      nextStepElement.classList.add('visible');
    }
  } else {
    showErrorMessage("Preencha todos os campos obrigatórios.");
  }
}

function prevStep(step) {
  document.getElementById(`step-${step}`).classList.remove('visible');
  currentStep = step - 1;
  const prevStepElement = document.getElementById(`step-${currentStep}`);
  if (prevStepElement) {
    prevStepElement.classList.add('visible');
  }
}

function formatarTEL() { //função para formatar o campo telefone
  var input = document.getElementById("telefone"); // Seleciona o elemento com id "tel"
  var telefone = input.value.replace(/\D/g, ""); // Remove os caracteres não numéricos

  if (telefone.length === 11) { //se a quantidade de dígitos for === 11
    telefone = telefone.replace(/(\d{2})(\d{5})(\d{4})/, "($1) $2-$3"); //formata com o retorno da expressão regular acima
  } else if (telefone.length === 10) { //senão, se a quantidade de digitos for === 10
    telefone = telefone.replace(/(\d{2})(\d{4})(\d{4})/, "($1) $2-$3");//formata com o retorno da expressão regular acima
  }

  input.value = telefone; // formata o valor do campo de telefone
}







