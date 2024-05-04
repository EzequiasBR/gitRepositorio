import { canvas, finalScore, menu, score } from "./menu.js";
import { ativar } from "./controle.js";
export let directionInicial;
export let velocidade = 300; 

const DIRECOES = {
    37: "esquerda",
    38: "cima",
    39: "direita",
    40: "baixo"
};
const OPPOSTAS = {
    'esquerda': 'direita',
    'cima': 'baixo',
    'direita': 'esquerda',
    'baixo': 'cima'
};


document.addEventListener("keydown", (key) => {
    if (ativar) {
        const novaDirecao = DIRECOES[key.keyCode];
        if (novaDirecao && OPPOSTAS[novaDirecao] !== directionInicial) {
            directionInicial = novaDirecao;
        }
        if (novaDirecao) {
            velocidade -= 5;
            if (velocidade < 100) {
                velocidade = 100;
            }
        }
    }
});

document.addEventListener('keyup', (key) => {
    let novaDirecao = DIRECOES[key.keyCode];
    if (novaDirecao) {
        velocidade = 300;
    }
});


// telas menores  movimento  
let initialPoint;
let finalPoint;

document.addEventListener('touchstart', function (event) {
    initialPoint = event.changedTouches[0];
}, false);

document.addEventListener('touchend', function (event) {
    if (ativar) {
        finalPoint = event.changedTouches[0];
        let xAbs = Math.abs(initialPoint.pageX - finalPoint.pageX);
        let yAbs = Math.abs(initialPoint.pageY - finalPoint.pageY);
        if (xAbs > 20 || yAbs > 20) {
            if (xAbs > yAbs) {
                if (finalPoint.pageX < initialPoint.pageX) {
                    /* Swipe para a esquerda */
                    directionInicial = DIRECOES['37']; // Código da tecla esquerda
                } else {
                    /* Swipe para a direita */
                    directionInicial = DIRECOES['39']; // Código da tecla direita
                }
            } else {
                if (finalPoint.pageY < initialPoint.pageY) {
                    /* Swipe para cima */
                    directionInicial = DIRECOES['38']; // Código da tecla para cima
                } else {
                    /* Swipe para baixo */
                    directionInicial = DIRECOES['40']; // Código da tecla para baixo
                }
            }
        }
    }

}, false);

export const gameOver = () => {
    directionInicial = undefined;
    menu.style.display = "flex";
    finalScore.innerText = score.innerText;
    localStorage.setItem('finalScore', finalScore.innerText);
    canvas.style.filter = "blur(3px)";

}