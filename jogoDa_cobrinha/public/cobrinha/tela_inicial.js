
import { iniciarPlacar, verificarNome } from "./atualizar_pontos.js";
import { inicio } from "./controle.js";
import { canvas } from "./menu.js";
const tela = document.querySelector('.jogar-tela');
let nomeJogador = document.getElementById("nomeInput");
const btnIniciarJogo = document.querySelector('.btn-iniciarJogo');
const btnAlmentar = document.querySelector('.btn-almentar');
const scoreResultado = document.querySelector('.melhor-score');

function telaInicial() {
   tela.style.display = "none";
   canvas.style.filter = "none";
   btnAlmentar.classList.add('alterar');
   scoreResultado.style.display = "flex";
}

btnIniciarJogo.addEventListener('click', () => {
   
   if (!nomeJogador.value) {
      nomeJogador.placeholder = "Por favor, preencha este campo.";
   }
   else {
      inicio();
      localStorage.setItem("nomeJogador", nomeJogador.value);
      verificarNome();
      telaInicial();
      iniciarPlacar();
   }
})

