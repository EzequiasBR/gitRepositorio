import { cobrinha } from "./desenha_cobrinha.js"
import { achaCaminho } from './caminho.js'; // Importe a função achaCaminho
import { comida } from "./desenha_comida.js";



export const moveCobrinha = () => {
   const head = cobrinha[cobrinha.length - 1];
   let { x, y } = comida
   let comidaIA = { x, y };

   let caminho = achaCaminho(head, comidaIA); // Use a função para achar o caminho até a comida
   let proximoMovimento = caminho[0];
   if (caminho.length > 0) {
     
      if (proximoMovimento == 'direita') {
         cobrinha.push({ x: head.x + size, y: head.y });
      }
      if (proximoMovimento == 'esquerda') {
         cobrinha.push({ x: head.x - size, y: head.y });
      }
      if (proximoMovimento == 'baixo') {
         cobrinha.push({ x: head.x, y: head.y + size });
      }
      if (proximoMovimento == 'cima') {
         cobrinha.push({ x: head.x, y: head.y - size });
      }
      cobrinha.shift()
   }

}
