import { cobrinha } from "./03_criar_desenho.js";
import {size } from "./menu.js";
import { directionInicial } from "./teclado.js";


export const moveCobrinha = () => {
   if (!directionInicial) return;
   
   const head = cobrinha[cobrinha.length - 1];
   
   if (directionInicial == 'direita') {
      cobrinha.push({ x: head.x + size, y: head.y });
   }
   if (directionInicial == 'esquerda') {
      cobrinha.push({ x: head.x - size, y: head.y });
   }
   if (directionInicial == 'baixo') {
      cobrinha.push({ x: head.x, y: head.y + size });
   }
   if (directionInicial == 'cima') {
      cobrinha.push({ x: head.x, y: head.y - size });
   }
   cobrinha.shift()
}

