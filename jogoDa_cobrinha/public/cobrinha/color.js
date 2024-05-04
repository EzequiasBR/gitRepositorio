import {randomNumber} from './randomNumber.js';

export const randomColor = () => {
   const red = randomNumber(50, 255);
   const green = randomNumber(50, 255);
   const blue = randomNumber(50, 255);

   return ` rgb(${red},${green},${blue})`
}