import { cobrinha } from "./desenha_cobrinha.js";
import { Canvas } from "./menu.js";
import { randomPosition } from "./randomPosition.js";


let {ctx, canvas,size,score} = Canvas();

export const comida = {
   x: randomPosition(canvas.width - size),
   y: randomPosition(canvas.height - size),
   color: "red"
}

export function drawComida(){
   const { x, y, color } = comida;

   ctx.shadowColor = color;
   ctx.shadowBlur = 3;
   ctx.fillStyle = color;
   ctx.fillRect(x, y, size, size); 
   ctx.shadowBlur = 0;
}

const inclementoScore = () => {
   score.innerText = +score.innerText + 10;
}

export const comeuComida = () => {
   const head = cobrinha[cobrinha.length - 1];

   if (head.x == comida.x && head.y == comida.y) {
      inclementoScore();
      cobrinha.push(head);
      // audioComida.play();
      let x = randomPosition(canvas.width - size);
      let y = randomPosition(canvas.height - size);

      while (cobrinha.find((position) => position.x == x && position.y == y)) {
         x = randomPosition(canvas.width - size);
         y = randomPosition(canvas.height - size);
      }

      comida.x = x;
      comida.y = y;
      comida.color = "red";
      // audioComida.addEventListener('ended', () => {
      //    audioComida.pause();
      // });
   }
}