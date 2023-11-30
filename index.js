let cep = document.querySelector('#CEP');
let endereco = document.querySelector('#endereco');
let bairro = document.querySelector('#bairro');
let cidade = document.querySelector('#cidade');
let estado = document.querySelector('#estado');

//Reconhecer a tecla pressionada
cep.addEventListener('keypress', (e)=>{
// validar o CEP input somente para números via 'Regex'.
const somenteNumeros = /[0-9]/;
let key = String.fromCharCode(e.keyCode);

if(!somenteNumeros.test(key)){
    e.preventDefault();
    return;
}
  
})

//Reconhecer quando a tecla é liberada e capturar o 8º valor digitado.
cep.addEventListener('keyup', (e)=>{    
    let valorCep = e.target.value;

    //Checar o length do iput na variável cep; contruir a função 'verificarCEP' pra viabilizar API
    if(valorCep.length === 8){
        verificarCEP(valorCep);
    }
})

const verificarCEP = async (cep)=>{

    const apiURL = `https://viacep.com.br/ws/${cep}/json/`;

    const response = await fetch(apiURL);
    const data = await response.json();

    if(data.erro == true){
        alert('Cep inválido!')
    }
    endereco.value = data.logradouro;
    bairro.value = data.bairro;
    cidade.value = data.localidade;
    estado.value = data.uf;
}
