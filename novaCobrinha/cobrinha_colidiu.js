import { Canvas } from './menu.js';
import { cobrinha } from './desenha_cobrinha.js';
import { gameOver } from './game_over.js';

let {canvas,size} = Canvas();

export const cobrinhaColidiu = () => {
   const head = cobrinha[cobrinha.length - 1];
   const canvasLimit = { width: canvas.width - size, height: canvas.height - size };
   const indiceCorpo = cobrinha.length - 2;

   const colidiuNaParede = head.x < 0 || head.x > canvasLimit.width || head.y < 0 || head.y > canvasLimit.height;

   const colidiuNoCorpo = cobrinha.find((position, index) => {
      return index < indiceCorpo && position.x == head.x && position.y == head.y;
   });

   colidiuAgora(colidiuNaParede,colidiuNoCorpo);

}

function colidiuAgora(colidiuNaParede, colidiuNoCorpo){
   if (colidiuNaParede || colidiuNoCorpo) {
      gameOver();
   }
}