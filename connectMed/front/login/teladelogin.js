const switchers = [...document.querySelectorAll('.switcher')]

switchers.forEach(item => {
	item.addEventListener('click', function() {
		switchers.forEach(item => item.parentElement.classList.remove('is-active'))
		this.parentElement.classList.add('is-active')
	})
})

//código senha visível

function senhaVisivel(inputId, mostrarImgClass, esconderImgClass) {
    var passwordInput = document.getElementById(inputId);
    var mostrarPasswordImg = document.querySelector("." + mostrarImgClass);
    var esconderPasswordImg = document.querySelector("." + esconderImgClass);

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        mostrarPasswordImg.style.display = "none";
        esconderPasswordImg.style.display = "inline";
    } else {
        passwordInput.type = "password";
        mostrarPasswordImg.style.display = "inline";
        esconderPasswordImg.style.display = "none";
    }
}

// Adicione um evento de clique para cada imagem
document.querySelector(".mostrar-password").addEventListener("click", function () {
    senhaVisivel('login-senha', 'mostrar-password', 'esconder-password');
});

document.querySelector(".esconder-password").addEventListener("click", function () {
    senhaVisivel('login-senha', 'mostrar-password', 'esconder-password');
});




  
  
  