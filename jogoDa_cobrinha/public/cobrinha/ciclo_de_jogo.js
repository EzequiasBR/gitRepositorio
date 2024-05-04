import { comeuComida } from './06_verificar_Comida.js';
import { desenharCobra, drawGrid, drawComida } from './03_criar_desenho.js';
import { cobrinhaColidiu } from './04_cobrinha_colidiu.js';
import { moveCobrinha } from './05_move_cobrinha.js';
import { ctx} from './menu.js';
import { velocidade } from './teclado.js';

let idLoop;
const gameLoop = () => {
   clearInterval(idLoop);

   ctx.clearRect(0, 0, 300, 400);
   drawGrid();
   drawComida();
   desenharCobra();
   moveCobrinha();
   comeuComida();
   cobrinhaColidiu();

   idLoop = setTimeout(() => {
      gameLoop();
   }, velocidade)

}
gameLoop();
