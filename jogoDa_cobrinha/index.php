<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://code.jquery.com/jquery-3.5.1.min.js" defer></script>
   <script type="module" src="public/cobrinha/tela_inicial.js" defer></script>
   <script type="module" src="public/cobrinha/btn_reniciar.js" defer></script>
   <script type="module" src="public/cobrinha/ciclo_de_jogo.js" defer></script>
   <script type="module" src="public/logicaIA/ia_jogar.js" defer></script>
   <script src="public/cobrinha/tela_alterar.js" defer></script>
   <link rel="icon" href="data:,">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
   <link rel="stylesheet" href="public/css/style.css">
   <title>Jogo da cobrinha</title>
</head>

<body>

   <div id="caixa">
      <div class="caixa-canvas">
         <div class="canvas">
            <div class="dialogo">bem-vindo ao</div>
            <div id="menu-tela">
               <span class="game-over">Game Over</span>
               <span class="final-score">score: <span>00</span></span>
               <button class="btn-jogar">
                  <span class="material-symbols-outlined">
                     play_circle
                  </span>
                  Jogar Novamente
               </button>
            </div>
            <div class="jogar-tela">
               <h2>Para iniciar o jogo</h2>
               <label for="nomeInput"> Digite seu nome:</label>
               <input type="text" id="nomeInput" required placeholder="digite seu nome">
               <button class="btn-iniciarJogo">
                  <span class="material-symbols-outlined">
                     play_circle
                  </span>
                  Jogar
               </button>
            </div>
            <h1>Jogo Da Cobrinha</h1>
            <canvas id="tela" height="400" width="300"></canvas>
            <div class="score">score:
               <span class="score--value">00</span>
               <button class="btn-almentar" >
                  <span class="material-symbols-outlined">
                     fullscreen
                  </span>
               </button>
               <button class="btn-diminuir">
                  <span class="material-symbols-outlined">
                     fullscreen_exit
                  </span>
               </button>
            </div>
         </div>
         <div class="melhor-score">
            <h3>As 10 Melhores Pontuações:</h3>
            <div id="score-resultado">
            </div>
         </div>
      </div>
   </div>
</body>

</html>