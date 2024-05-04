let canvas = document.getElementById('tela');
let btnAumentar = document.querySelector('.btn-almentar');
let btnDiminuir = document.querySelector('.btn-diminuir');
let divMelhoresJogadores = document.querySelector('.melhor-score');
let canvasH1 = document.querySelector('.canvas > h1');

btnAumentar.addEventListener('click', function() {
    canvasH1.style.display = "none";
    btnAumentar.style.display = "none";
    btnDiminuir.style.display = "flex";
    canvas.style.width = '400px';
    canvas.style.height = '540px';
    divMelhoresJogadores.style.display = 'none'; // Esconde a div dos melhores jogadores
});

btnDiminuir.addEventListener('click', function() {
    btnAumentar.style.display = "flex";
    btnDiminuir.style.display = "none";
    canvas.style.width = '300px';
    canvas.style.height = '400px';
    divMelhoresJogadores.style.display = 'block'; // Mostra a div dos melhores jogadores
});
