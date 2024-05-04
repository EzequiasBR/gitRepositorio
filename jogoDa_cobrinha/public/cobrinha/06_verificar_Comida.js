import { canvas, size, score } from './menu.js';
import { randomPosition } from './randomPosition.js';
import { randomColor } from './color.js';
import { comida } from './02_criar_comida.js';
import { cobrinha } from './03_criar_desenho.js';
const audioComida = new Audio('http://localhost/jogoDa_cobrinha/public/audio/audio-comeu.mp3');


const inclementoScore = () => {
   score.innerText = +score.innerText + 10;
}

export const comeuComida = () => {
   const head = cobrinha[cobrinha.length - 1];

   if (head.x == comida.x && head.y == comida.y) {
      inclementoScore();
      cobrinha.push(head);
      audioComida.play();
      let x = randomPosition(canvas.width - size);
      let y = randomPosition(canvas.height - size);

      while (cobrinha.find((position) => position.x == x && position.y == y)) {
         x = randomPosition(canvas.width - size);
         y = randomPosition(canvas.height - size);
      }

      comida.x = x;
      comida.y = y;
      comida.color = randomColor();
      audioComida.addEventListener('ended', () => {
         audioComida.pause();
      });
   }
}