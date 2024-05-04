import {randomPosition} from './randomPosition.js';
import {randomColor}  from './color.js';
import {canvas,size} from './menu.js';

export const comida = {
   x: randomPosition(canvas.width - size),
   y: randomPosition(canvas.height - size),
   color: randomColor()   
}