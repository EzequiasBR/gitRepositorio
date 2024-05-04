import { comida } from './02_criar_comida.js';
import { randomColor } from './color.js';
import { size, ctx, canvas, score, menu } from './menu.js';
import { randomPosition } from './randomPosition.js';

const positionInicial = { x: 140, y: 200 };
const positionSegundaria = { x: 160, y: 200 };
export let cobrinha = [positionInicial, positionSegundaria];

export function desenharCobra(){
   ctx.fillStyle = 'rgb(90, 236, 70)';

   cobrinha.forEach((positon, index) => {
      if (index == cobrinha.length - 1) {
         ctx.fillStyle = 'rgb(0,120, 250)';
      }
      ctx.fillRect(positon.x, positon.y, size, size);
   })
}

export function drawGrid(){
   ctx.lineWidth = 1;
   ctx.strokeStyle = '#10990f50';

   for (let i = 20; i < canvas.height; i += 20) {
      ctx.beginPath();
      ctx.lineTo(i, 0);
      ctx.lineTo(i, canvas.height);
      ctx.stroke();

      ctx.beginPath();
      ctx.lineTo(0, i);
      ctx.lineTo(canvas.height, i);
      ctx.stroke();
   }

}

export function drawComida(){
   const { x, y, color } = comida;

   ctx.shadowColor = color;
   ctx.shadowBlur = 3;
   ctx.fillStyle = color;
   ctx.fillRect(x, y, size, size);
   ctx.shadowBlur = 0;
}

export function iniciaJogo() {
   score.innerText = "00";
   menu.style.display = "none";
   canvas.style.filter ="none";
   comida.x = randomPosition(canvas.width - size);
   comida.y = randomPosition(canvas.height - size);
   comida.color = randomColor();
   cobrinha = [{ x: 140, y: 200 },{ x: 160, y: 200 }];
}

