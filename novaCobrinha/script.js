import { desenhaLinha } from "./desenha_linhas.js";
import { desenharCobra } from "./desenha_cobrinha.js";
import { comeuComida, drawComida } from "./desenha_comida.js";
import { moveCobrinha } from "./move_cobrinha.js";
import { Canvas } from "./menu.js";
import { cobrinhaColidiu } from "./cobrinha_colidiu.js";

let { ctx,canvas } = Canvas();

let idLoop;
const gameLoop = () => {
   clearInterval(idLoop);

   ctx.clearRect(0, 0, canvas.width, canvas.height);
   desenhaLinha();
   drawComida();
   desenharCobra();
   moveCobrinha();
   comeuComida();
   cobrinhaColidiu();

   idLoop = setTimeout(() => {
      gameLoop();
   }, 300)

}
gameLoop();
