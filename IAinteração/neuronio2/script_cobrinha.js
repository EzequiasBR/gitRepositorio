// const canvas = document.getElementById("canvas");
// const ctx = canvas.getContext("2d");

// // Variáveis do jogo
// let cobrinha = [{ x: canvas.width / 2, y: canvas.height / 2 }]; // Posição inicial da cobrinha
// let comida = { x: 0, y: 0 }; // Posição da comida
// let direcao = "direita"; // Direção da cobrinha
// let tamanho = 10; // Tamanho da cobrinha (em pixels)
// let velocidade = 5; // Velocidade da cobrinha (em pixels por segundo)
// let tempo = 0; // Tempo decorrido desde o último movimento (em segundos)

// // Função para desenhar a cobrinha
// function desenharCobrinha() {
//     ctx.clearRect(0, 0, canvas.width, canvas.height);
//     for (let i = 0; i < cobrinha.length; i++) {
//         ctx.fillStyle = "green";
//         ctx.fillRect(cobrinha[i].x, cobrinha[i].y, tamanho, tamanho);
//     }
// }

// // Array para armazenar os pontos vermelhos
// let pontosVermelhos = [];

// // Função para gerar um novo ponto vermelho
// function gerarPontoVermelho() {
//     let ponto = {
//         x: Math.floor(Math.random() * canvas.width),
//         y: Math.floor(Math.random() * canvas.height),
//     };
//     pontosVermelhos.push(ponto);
// } 

// // Função para mover a cobrinha
// function moverCobrinha() {
//     // Calcular a próxima posição da cabeça da cobrinha
//     let novaCabeca = {
//         x: cobrinha[0].x + (direcao === "direita" ? tamanho : 0) + (direcao === "esquerda" ? -tamanho : 0),
//         y: cobrinha[0].y + (direcao === "baixo" ? tamanho : 0) + (direcao === "cima" ? -tamanho : 0),

//     };
    
//     if (novaCabeca.x < 0 || novaCabeca.x >= canvas.width || novaCabeca.y < 0 || novaCabeca.y >= canvas.height) {
//       // Fim do jogo
//       alert("Fim de jogo!");
//       location.reload();
//   }  
//     // Adicionar a nova cabeça à frente da cobrinha
//     cobrinha.unshift(novaCabeca);

//     // Remover a última parte da cobrinha
//     if (cobrinha.length > tamanho) {
//        cobrinha.pop();
//       }
      
//       for (let i = 0; i < pontosVermelhos.length; i++) {
//         if (cobrinha[0].x === pontosVermelhos[i].x && cobrinha[0].y === pontosVermelhos[i].y) {
//             // Remover o ponto vermelho
//             pontosVermelhos.splice(i, 1);
  
//             // Aumentar o tamanho da cobrinha
//             tamanho += 1;
  
//             // ... (código para aumentar o tamanho da cobrinha)
  
//             break;
//         }
//     }
//       // Verificar se a cobrinha colidiu com a comida
//       if (cobrinha[0].x === comida.x && cobrinha[0].y === comida.y) {
//          // Aumentar o tamanho da cobrinha
//         tamanho += 1;
//         // Gerar uma nova comida
//         gerarComida();
//     }

//     // Verificar se a cobrinha colidiu consigo mesma
//     for (let i = 1; i < cobrinha.length; i++) {
//         if (cobrinha[0].x === cobrinha[i].x && cobrinha[0].y === cobrinha[i].y) {
//             // Fim do jogo
//             alert("Fim de jogo!");
//             location.reload();
//         }
//     }

// }

// // Função para gerar a comida
// function gerarComida() {
//     comida.x = Math.floor(Math.random() * (canvas.width / tamanho)) * tamanho;
//     comida.y = Math.floor(Math.random() * (canvas.height / tamanho)) * tamanho;
// }

// // Função para controlar o jogo
// function loop() {
//     tempo += 1 / velocidade;

//     if (tempo >= 1) {
//         tempo = 0;
//         moverCobrinha();
//     }

//     desenharCobrinha();

//     requestAnimationFrame(loop);
// }

// // Iniciar o jogo
// gerarComida();
// loop();

// // Adicionar eventos de teclado para controlar a direção da cobrinha
// document.addEventListener("keydown", (event) => {
//     switch (event.keyCode) {
//         case 37: // Seta para esquerda
//             direcao = "esquerda";
//             break;
//         case 38: // Seta para cima
//             direcao = "cima";
//             break;
//         case 39: // Seta para direita
//             direcao = "direita";
//             break;
//         case 40: // Seta para baixo
//             direcao = "baixo";
//             break;
//     }
// });

const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");
const TAMANHO = 10;
const VELOCIDADE = 5;
const DIRECOES = {
  37: "esquerda",
  38: "cima",
  39: "direita",
  40: "baixo"
};

class Jogo {
  constructor() {
    this.cobrinha = [{ x: canvas.width / 2, y: canvas.height / 2 }];
    this.comida = { x: 0, y: 0 };
    this.direcao = "direita";
    this.tamanho = TAMANHO;
    this.velocidade = VELOCIDADE;
    this.tempo = 0;
    this.pontosVermelhos = [];
    this.gerarPontoVermelho();
  }

  desenharCobrinha() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    for (let i = 0; i < this.cobrinha.length; i++) {
      ctx.fillStyle = "green";
      ctx.fillRect(this.cobrinha[i].x, this.cobrinha[i].y, this.tamanho, this.tamanho);
    }
  }

  gerarPontoVermelho() {
    let ponto = {
      x: Math.floor(Math.random() * canvas.width),
      y: Math.floor(Math.random() * canvas.height),
    };
    this.pontosVermelhos.push(ponto);
  }

  desenharPontosVermelhos() {
    ctx.fillStyle = "red";
    for (let i = 0; i < this.pontosVermelhos.length; i++) {
        let ponto = this.pontosVermelhos[i];
        ctx.fillRect(ponto.x, ponto.y, this.tamanho, this.tamanho);
    }
  }

  moverCobrinha() {
   let novaCabeca = {
       x: this.cobrinha[0].x + (this.direcao === "direita" ? this.tamanho : 0) + (this.direcao === "esquerda" ? -this.tamanho : 0),
       y: this.cobrinha[0].y + (this.direcao === "baixo" ? this.tamanho : 0) + (this.direcao === "cima" ? -this.tamanho : 0),
   };
   
   if (novaCabeca.x < 0 || novaCabeca.x >= canvas.width || novaCabeca.y < 0 || novaCabeca.y >= canvas.height) {
     alert("Fim de jogo!");
     location.reload();
   }  

   // Adicionar a nova cabeça à frente da cobrinha
   this.cobrinha.unshift(novaCabeca);

   // Verificar se a cobrinha colidiu com a comida
   if (this.cobrinha[0].x === this.comida.x && this.cobrinha[0].y === this.comida.y) {
       // Aumentar o tamanho da cobrinha
       this.tamanho += 1;
       // Gerar uma nova comida
       this.gerarComida();
   } else {
       // Remover a última parte da cobrinha se ela não comeu a comida
       this.cobrinha.pop();
   }

   // Verificar se a cobrinha colidiu com um ponto vermelho
   for (let i = 0; i < this.pontosVermelhos.length; i++) {
       if (this.cobrinha[0].x === this.pontosVermelhos[i].x && this.cobrinha[0].y === this.pontosVermelhos[i].y) {
           // Remover o ponto vermelho
           this.pontosVermelhos.splice(i, 1);
           // Aumentar o tamanho da cobrinha
           this.tamanho += 1;
           // Gerar um novo ponto vermelho
           this.gerarPontoVermelho();
           break;
       }
   }

   // Verificar se a cobrinha colidiu consigo mesma
   for (let i = 1; i < this.cobrinha.length; i++) {
       if (this.cobrinha[0].x === this.cobrinha[i].x && this.cobrinha[0].y === this.cobrinha[i].y) {
           alert("Fim de jogo!");
           location.reload();
       }
   }
}



//  loop() {
//    this.tempo += 1 / this.velocidade;

//    if (this.tempo >= 1) {
//      this.tempo = 0;
//      this.moverCobrinha();
//    }

//    this.desenharCobrinha();

//    requestAnimationFrame(this.loop.bind(this));
//  }

//  iniciar() {
//    this.loop();
//  }


  gerarComida() {
    this.comida.x = Math.floor(Math.random() * (canvas.width / this.tamanho)) * this.tamanho;
    this.comida.y = Math.floor(Math.random() * (canvas.height / this.tamanho)) * this.tamanho;
  }

  desenharComida() {
    ctx.fillStyle = "blue";
    ctx.fillRect(this.comida.x, this.comida.y, this.tamanho, this.tamanho);
  }

  loop() {
    this.tempo += 1 / this.velocidade;

    if (this.tempo >= 1) {
      this.tempo = 0;
      this.moverCobrinha();
    }

    this.desenharCobrinha();
    this.desenharPontosVermelhos(); // Desenhar os pontos vermelhos
    this.desenharComida(); // Desenhar a comida

    requestAnimationFrame(this.loop.bind(this));
  }

  iniciar() {
    this.gerarComida();
    this.loop();
  }
}

let jogo = new Jogo();

document.addEventListener("keydown", (event) => {
  if (DIRECOES[event.keyCode]) {
    jogo.direcao = DIRECOES[event.keyCode];
  }
});

jogo.iniciar();
