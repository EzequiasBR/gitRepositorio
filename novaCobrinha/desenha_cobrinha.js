import { Canvas } from "./menu.js";

const positionInicial = { x: 140, y: 200 };
const positionSegundaria = { x: 160, y: 200 };
export let cobrinha = [positionInicial, positionSegundaria];

let {ctx,size} = Canvas();

export function desenharCobra(){
   ctx.fillStyle = 'rgb(90, 236, 70)';

   cobrinha.forEach((positon, index) => {
      if (index == cobrinha.length - 1) {
         ctx.fillStyle = 'rgb(0,120, 250)';
      }
      ctx.fillRect(positon.x, positon.y, size, size);
   })
}