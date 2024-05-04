import {randomNumber} from './randomNumber.js';

export const randomPosition = (posit) => {
   const number = randomNumber(0, posit);
   return Math.round(number / 20) * 20;
}