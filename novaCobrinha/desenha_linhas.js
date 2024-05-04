import { Canvas } from "./menu.js";

let {canvas, ctx} = Canvas();

export function desenhaLinha(){
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

