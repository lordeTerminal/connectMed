const canvas = document.getElementById("gcanvas");
const canvas2d = canvas.getContext("2d");

const worm = {
  tr: ("audio/worm long.ogg"),
  in: ("audio/worm intro.ogg"),
  gs: 400,
  il: 8
}
const cobra = {
  tr: ("audio/cobra long.ogg"),
  in: ("audio/cobra intro.ogg"),
  gs: 333,
  il: 16
}
const python = {
  tr: ("audio/cobra long.ogg"),
  in: ("audio/cobra intro.ogg"),
  gs: 333,
  il: 16
}
//let getEnergy = new Audio("audio/beamen.ogg");
let powerDown = new Audio("audio/collision.ogg");

const upBeatColour = "rgb(104, 117, 159)";
const downBeatColour = "rgb(164, 177, 219)";
const background = "rgb(64, 77, 119)";

let fimdeJogo = false;
canvas.width = 200;
canvas.height = 200;
let moveDirection = 0;
//0 dir 1 bai 2 esq 3 cim

let gameSpeed;
var multiplier = 0;
var beatCount = 1;
let introLenght;
let trackintro;
let tracklong;
let pulseLoop;
let updateLoop;

function setSpeed (level) {
  introLenght = level.il;
  trackintro = new Audio(level.in);
  tracklong = new Audio(level.tr);
  gameSpeed = level.gs;
  document.getElementById("dificuldade").style.visibility = "hidden";
  setTimeout(startGame, 4000);
}

function startGame () {
  readHighScore ();
  trackintro.play();
  pulse ();
  setTimeout(startMusic, (gameSpeed * introLenght));
}

function readHighScore () {
  let highsc = localStorage.getItem(("diff" + gameSpeed + "high"));
  if (highsc != null) {
  document.getElementById("highscore").innerText = ("High Score: " + highsc);}
}

function pulse () {
//  console.log(gameSpeed);
//  console.time("beat");
  pulseLoop = setInterval(beatHighlight, gameSpeed)
}

function beatHighlight () {
//  console.timeEnd("beat");
//  console.time("beat");
 // console.log(beatCount);
  if (beatCount == 4) {
    canvas.style.transition = "0s"
    canvas.style.backgroundColor = downBeatColour
    beatCount = 1
  }
  else {
  canvas.style.transition = "0s"
  canvas.style.backgroundColor = upBeatColour
  beatCount++;
  }
  setTimeout(beatDim, 10);
}
function beatDim () {
  canvas.style.transition = "0.2s"
  canvas.style.backgroundColor = background
}

function startMusic (){
  tracklong.play();
  tracklong.loop = true;
// console.time("loop"); 
  updateLoop = setInterval(gameLoop, gameSpeed)}

let corpo = [];
let comprimento = 2;

let posX = 0;
let posY = 0;

let direcaoX = 10;
let direcaoY = 0;

let maca = [];
let score = 0;
// Loop de atualização do jogo
function gameLoop() {
//   console.timeEnd("loop");
//   console.time("loop"); 
  moverCobra();
  desenharCobra();
  criarMaca();
  colisao();
}
//sprites
const foodimage = new Image();
const headup = new Image();
const headright = new Image();
const headdown = new Image();
const headleft = new Image();
const bodyy = new Image();
const bodyx = new Image();
const tailup = new Image();
const tailright = new Image();
const taildown = new Image();
const tailleft = new Image();
const bendur = new Image();
const bendrd = new Image();
const benddl = new Image();
const bendlu = new Image();
foodimage.src='img/energy.png';
headup.src='img/headu.png';
headright.src='img/headr.png';
headdown.src='img/headd.png';
headleft.src='img/headl.png';
bodyy.src='img/bodyy.png';
bodyx.src='img/bodyx.png';
tailup.src='img/tailu.png';
tailright.src='img/tailr.png';
taildown.src='img/taild.png';
tailleft.src='img/taill.png';
bendur.src='img/bendur.png';
bendrd.src='img/bendrd.png';
benddl.src='img/benddl.png';
bendlu.src='img/bendlu.png';

//direção do sprite
function headDir () {
    switch (moveDirection) {
        case 0: 
            return headright;
        case 1: 
            return headdown;
        case 2: 
            return headleft;
        case 3: 
            return headup;
    }
}
function tailDir (md) {
    switch (md) {
        case 0: 
            return tailright;
        case 1: 
            return taildown;
        case 2: 
            return tailleft;
        case 3: 
            return tailup;
    }
}
function bodyDir (md) {

    switch (md) {
        case 0: 
        case 2: 
            return bodyx;
        case 1: 
        case 3: 
            return bodyy;
          }
    }
function bodyBend (fromb, tob) {
    switch (tob) {
          case 0:
            switch (fromb) {
              case 1:           //da direita para cima
                return benddl; 
              case 3:           //da direita para baixo
                return bendlu;
            }
          case 1:
            switch (fromb) {
              case 0:           //de baixo para a direita
              return bendur;
              case 2:           //de baixo para a esquerda
              return bendlu;
            }
          case 2:
            switch (fromb) {
              case 1:           //da esquerda para cima
              return bendrd;
              case 3:           //da esquerda para baixo
              return bendur;
              }
          case 3:
              switch (fromb) {
              case 0:           //de cima para a direita
              return bendrd;
              case 2:           //de cima para a esquerda
              return benddl;
              }
    }
}

// Mover automaticamente
function moverCobra() {
  // Adicinar ao vetor corpo
  
  corpo.unshift({ x: posX, y: posY, md: moveDirection});
  
  // Mudar posiçao
  posX += direcaoX;
  posY += direcaoY;
  
  // Apagar o corpo ao mover
  while (corpo.length > comprimento) {
    corpo.pop();
  }
}

// Desenhar a cobra
function desenharCobra() {
  const headDirection = headDir ();
  const tail = corpo.length;
  canvas2d.clearRect(0, 0, canvas.width, canvas.height);
  canvas2d.drawImage(headDirection, corpo[0].x, corpo[0].y, 10, 10);
  for (let i = 1; i < tail; i++) {
    canvas2d.drawImage(headDirection, corpo[0].x, corpo[0].y, 10, 10);
    canvas2d.clearRect(corpo[i].x, corpo[i].y, 10, 10); 
    canvas2d.drawImage(bodyDir(corpo[i].md), corpo[i].x, corpo[i].y, 10, 10); 
        if ((i>1) && (corpo[i - 1].md != corpo[i].md)) {
            canvas2d.clearRect(corpo[i-1].x, corpo[i-1].y, 10, 10);
            canvas2d.drawImage(bodyBend(corpo[i - 1].md, corpo[i].md), corpo[i-1].x, corpo[i-1].y, 10, 10);
        }
    canvas2d.clearRect(corpo[tail - 1].x, corpo[tail - 1].y, 10, 10);
    canvas2d.drawImage(tailDir(corpo[tail - 1].md), corpo[tail - 1].x, corpo[tail - 1].y, 10, 10);
  }
}


// Mudar a direçao quando apertar as teclas
window.addEventListener(
  "keydown", 
  (event) => {
switch (event.code) {
  case "ArrowLeft": 
    if ((moveDirection != 0) && (corpo[0].md != 0)) {
      turnLeft ();}
    break;
  case "ArrowUp": 
    if ((moveDirection != 1) && (corpo[0].md != 1)) {
      turnUp ();}
    break;
  case "ArrowRight": 
    if ((moveDirection != 2) && (corpo[0].md != 2)) {
      turnRight ();}
    break;
  case "ArrowDown": 
    if ((moveDirection != 3) && (corpo[0].md != 3)) {
      turnDown ();}
    break;
  }
  
})
function turnLeft () {
  direcaoX = -10;
  direcaoY = 0;
  moveDirection = 2;
}
function turnUp () {
  direcaoX = 0;
  direcaoY = -10;
  moveDirection = 3;
}
function turnRight () {
  direcaoX = 10;
  direcaoY = 0;
  moveDirection = 0;
}
function turnDown () {
  direcaoX = 0;
  direcaoY = 10;
  moveDirection = 1;
}

// Criar maça e contar o ponto
function criarMaca() {
  // Gerar posição X e Y aleatórias para a maça
  if(maca.length < 1) {
    let macaX = Math.floor(Math.random() * (canvas.width/10));
    let macaY = Math.floor(Math.random() * (canvas.height/10));

      //conferir se a posição está vazia
      for (let i = 1; i < corpo.length; i++) {
//        console.log(corpo[i].x);
//        console.log(corpo[i].y);
        if (((macaX * 10) == corpo[i].x) && ((macaY * 10) == corpo[i].y)) {
          macaX = Math.floor(Math.random() * (canvas.width/10));
          macaY = Math.floor(Math.random() * (canvas.height/10));
          i = 0;
          console.log("recalcular maça");
        }
        }
      
    maca.push({ x: (macaX * 10), y: (macaY * 10) 
    });
    contarponto();
  }
  // Desenhar maça em vermelho
  for (let i = 0; i < maca.length; i++) {
    canvas2d.drawImage(foodimage, maca[i].x, maca[i].y, 10, 10);

  }
}
// Mostrar a pontuaçao
function contarponto(text) {
//  console.log(beatCount)
        switch (beatCount) {
          case 1: 
//          console.log("4", beatCount);
          score = (score+(4*multiplier));
          multiplier++;
          break;
          case 4: 
//          console.log("1", beatCount);
          score = (score+(1*multiplier));
          multiplier = 1;
          break;
          case 3: 
//          console.log("2", beatCount);
          score = (score+(2*multiplier));
          break;
          case 2: 
//          console.log("1", beatCount);
          score = (score+(1*multiplier));
          multiplier = 1;
          break;
          default: 
          console.log("why")
          score++;
        }
        document.getElementById("score").innerHTML = score;
        if (multiplier > 1) {
        document.getElementById("multiplier").innerHTML = (multiplier + "x");
      }
        else {document.getElementById("multiplier").innerHTML = " ";
      }
    }

// Checar colisão da cabeça com maça, cauda ou parede
function colisao() {
  // maça
  for (let i = 0; i < maca.length; i++) {
    if (posX < maca[i].x + 1 && 
      posX + 1 > maca[i].x && 
      posY < maca[i].y + 1 && 
      posY + 1 > maca[i].y) {
        comprimento++;
//        getEnergy.play();
        maca.splice(i, 1);
    }
  }
  // parede
  if (posX < 0 || 
    posY < 0 || 
    posX > canvas.width-10 ||
    posY > canvas.height-10) {
      gameOver();
  }
  // cauda
  for (let i = 1; i < corpo.length; i++) {
    if (posX === corpo[i].x && posY === corpo[i].y) {
      gameOver();
    }
  }
}

// Mostrar o Game Over
function gameOver() {
  powerDown.play();
  setTimeout(function() {
    document.getElementById("recomecar").style.visibility = "visible";
  }, 500); 
  let highsc = localStorage.getItem(("diff" + gameSpeed + "high"));
  if (score > highsc) {
  localStorage.setItem(("diff" + gameSpeed + "high"), score)
  }
  tracklong.pause();
  clearInterval(updateLoop);
  clearInterval(pulseLoop);
  fimdeJogo = true;
}

// Recomeçar o jogo
function tentar() {window.location.reload();}


document.addEventListener('touchstart', handleTouchStart, false);        
document.addEventListener('touchmove', handleTouchMove, false);

var xDown = null;                                                        
var yDown = null;

function getTouches(evt) {
  return evt.touches ||             // browser API
         evt.originalEvent.touches; // jQuery
}                                                     

function handleTouchStart(evt) {
    const firstTouch = getTouches(evt)[0];                                      
    xDown = firstTouch.clientX;                                      
    yDown = firstTouch.clientY;                                      
};                                                

function handleTouchMove(evt) {
    evt.preventDefault();
    if ( ! xDown || ! yDown ) {
        return;
    }

    var xUp = evt.touches[0].clientX;                                    
    var yUp = evt.touches[0].clientY;

    var xDiff = xDown - xUp;
    var yDiff = yDown - yUp;

    if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) {/*most significant*/
        if ( xDiff > 0 ) {
          if ((moveDirection != 0) && (corpo[0].md != 0)) {
            turnLeft();}
        } else {
          if ((moveDirection != 2) && (corpo[0].md != 2)) {
            turnRight();}
        }                       
    } else {
        if ( yDiff > 0 ) {
          if ((moveDirection != 1) && (corpo[0].md != 1)) {
            turnUp();}
        } else { 
          if ((moveDirection != 3) && (corpo[0].md != 3)) {
            turnDown()}
        }                                                                 
    }
    /* reset values */
    xDown = null;
    yDown = null;                                             
};
