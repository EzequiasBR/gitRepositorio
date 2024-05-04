import { iniciaJogo } from "./03_criar_desenho.js";
import { iniciarPlacar } from "./atualizar_pontos.js";
import { btnJogar } from "./menu.js";
import {reiniciar} from './controle.js'


btnJogar.addEventListener('click', () => {
      reiniciar();
      iniciaJogo();
      iniciarPlacar();
});